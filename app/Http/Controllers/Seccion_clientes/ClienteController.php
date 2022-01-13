<?php

namespace App\Http\Controllers\Seccion_clientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seccion_clientes\Cliente;
use App\Models\Seccion_clientes\Direccion;
use Illuminate\Support\Facades\DB;
use SimpleXMLElement;
use Response;

class ClienteController extends Controller
{
    /*
     * Get all clientes
     * @return view, clientes[]
    */
    public function index()
    {
        $clientes = Cliente::with('direcciones')->get();
        return view('Seccion_clientes\clientes', compact('clientes')); // ['clientes' => $clientes]
       // return Response::json($clientes);       
    }


    /*
     * Get a cliente
     * @param  cliente.id
     * @return \Illuminate\Http\Response
    */
    public function getOne($id)
    {
        $cliente = Cliente::with('direcciones')->find($id);
        return Response::json($cliente);
    }


     /*
     * Post or update a cliente.
     * @param  \Illuminate\Http\Request  $request
     * @return redirect
    */
    public function save(Request $request)
    { 
        if($request -> input('id') == 0){                                 // si va a insertar registro nuevo
            $cliente = new Cliente;
            $cliente -> id = $request -> input('id');
            $cliente -> nombre = $request -> input('nombre');
            $cliente -> contacto = $request -> input('contacto');
            $cliente -> telefono = $request -> input('telefono');
            $cliente ->save();
            $count = 0;
            while($request -> input($count)) { 
                $direccion = new Direccion();
                $direccion -> descripcion = $request -> input($count);
                $cliente->direcciones()->save($direccion);
                $count++;
            }
            return redirect()->back();
        }else{                                                       // si va a actualizar un registro existente                                 
            $cliente = Cliente::find($request -> input('id'));
            $cliente -> nombre = $request -> input('nombre');
            $cliente -> contacto = $request -> input('contacto');
            $cliente -> telefono = $request -> input('telefono');
            $cliente ->save();
            $count = 0;
            while($request -> input($count)) {
                if($request -> input($count.$count) == null){            // si hay una dirección nueva
                    $direccion = new Direccion();
                    $direccion -> descripcion = $request -> input($count);
                    $cliente->direcciones()->save($direccion);
                }else
                $direccion = Direccion::find($request -> input($count.$count));
                $direccion -> descripcion = $request -> input($count);
                $direccion ->save();
                $count++;
            }
            return redirect()->back();
        }
        
        
    }


     /*
     * Delete a cliente.
     * @param  cliente.id
     * @return redirect
    */
    public function delete($clienteId)
    {
        $cliente = Cliente::find($clienteId);
        if ($cliente) {
            $cliente->direcciones()->delete();
            $cliente->delete();
            return response()->json([
                'success' => true,
                'error' => false,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => true,
            ]);
        }

    }

    /*
     * Get all clientes
     * @return \Illuminate\Http\Response
    */
    public function getjson()
    {
        $clientes = Cliente::with('direcciones')->get(); //get
        return Response::json($clientes);    
    }

    /*
     * Get all clientes as XML
     * @return XML
    */
    public function getxml()
    {
        $json = json_decode(Cliente::with('direcciones')->get(), true);
        $xml = xml( $json, false );
        echo print_r( $xml );
    }
}

    /*
     * Convert array in to XML
     * @param  array, boolean
     * @return XML
    */
    
    function xml( $array, $xml = false) {
        if ( $xml === false ) {
        $xml = new SimpleXMLElement('<result/>');
        }
        foreach( $array as $key => $value ) {
            if ( is_array( $value ) ) {
                xml( $value, $xml->addChild( $key ) );
            } else {
            $xml->addChild( $key, $value );
            }
        }
        return $xml->asXML();
    }
