<?php

namespace App\Http\Controllers\Seccion_clientes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seccion_clientes\Direccion;
use Response;

class DireccionController extends Controller
{
    public function index()
    {
    }

    public function show(Direccion $direccion)
    {
    }
    public function save(Request $request)
    {
    }
    
    public function delete($direccionId)
    {
        $direccion = Direccion::find($direccionId);
        $direccion->delete();
    }

}
