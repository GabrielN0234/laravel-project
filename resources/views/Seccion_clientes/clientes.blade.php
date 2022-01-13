@extends('layout')
@section('content')
<div class="row mb-md-3 mt-md-5" style="width:100%">
    <div class="col-8">
        <h1 class="text-light ">Lista de Clientes</h1>
    </div>
    <div class="col-4 text-right">
        <button type="button" onclick="limpiarFormulario()" class="btn btn-info form-check control shadow btn-lg" data-toggle="modal" data-target="#myModal">Crear nuevo cliente</button>
    </div>

</div>
<div class="p-4 rounded bg-dark shadow">
    <table id="tbData" class="table table-responsive-xl">
        <thead class="thead-dark">
            <tr class="table-info ">
                <th class="text-center text-light">Nombres</th>
                <th class="text-center text-light">Contacto</th>
                <th class="text-center text-light">Teléfono</th>
                <th class="text-center text-light">Dirección</th>
           <!-- <th>Fecha de registro</th>
                <th>Fecha de actualización</th> -->
                <th>Acciones</th>
            </tr>
        </thead>
            @foreach($clientes as $cliente)
            <tr class="table-muted text-white">
                <th  class="text-center text-light">{{ $cliente->nombre }}</th>
                <th  class="text-center text-light">{{ $cliente->contacto }}</th>
                <th  class="text-center text-light">{{ $cliente->telefono }}</th>
                <th  class="text-center text-light">
                <div class="bg-dark border-0">
                @foreach($cliente->direcciones as $direccion)
                    <div class="form-control text-light border-0 mb-md-1 dark" value="true">{{ $direccion->descripcion }}</div>  
                @endforeach
                </div>
                </th>
           <!-- <th>{{ $cliente->created_at }}</th>
                <th>{{ $cliente->updated_at }}</th> -->
                <th>
                    <div class="bg-dark border-0">
                        <button onclick="editar('{{ route("cliente.show",$cliente->id) }}')" class="btn btn-info text-light shadow btn-md" data-toggle="modal" data-target="#myModal" type="button">Editar
                    </button>
                        <button class="btn btn-danger text-light shadow btn-md" onclick="Delete('{{ route("cliente.delete",$cliente->id) }}');" type="button" class="btn btn-info mb-5">Eliminar</button>
                    </div>
                </th>
            </tr>
            @endforeach
    </table>
</div>
</main>
        </div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-dark shadow">
            <form method="post" action="{{ route('cliente.save') }}" enctype="multipart/form-data" onsubmit="return validacion()" id="submit">
            @csrf
                <div class="modal-header border-bottom border-secondary">
                    <h2 class="modal-title text-light ">Ingreso de clientes</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div style="padding-left:15%; padding-right:15%;padding-bottom:30px">
                        <input type="hidden" id="hiddenId" name="id" />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="text-light">Nombre</label>
                                <input  name="nombre" id="clienteNombre" class="dark border-0 form-control text-light" placeholder="Nombre" />
                                <span id="validacionNombre" class="text-danger mt-md-5">*Debe agregar un nombre</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="text-light">Teléfono</label>
                                <input name="telefono" id="clienteTelefono" type="number" class="dark border-0  form-control text-light" placeholder="Teléfono" />
                                <span id="validacionTelefono"  class="text-danger">*Debe agregar un teléfono</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                    <label class="text-light">Contacto</label>
                                    <input name="contacto" id="clienteContacto" class="dark border-0 form-control text-light" placeholder="Contacto" />
                                    <span id="validacionContacto" class="text-danger ">*Debe agregar un contacto</span>
                                </div>
                                <div class="row p-3 border-0">
                                <div class="text-danger"></div>
                            </div>
                        </div>
                        <div class="form-row" id="contenedor">
                            <div class="form-group col-md-12">
                                <label class="text-light" >Dirección</label>
                                <input name="0" id="direccionNodo0" class="dark border-0 form-control text-light col-md-12" placeholder="Dirección" />
                                <input type="hidden" id="hiddenIdDir" name="00" />
                        <span id="validacionDireccion" class="text-danger">*Debe agregar almenos una dirección</span> 
                            </div>                         
                        </div>
                        <div class="form-group col-md-12">
                            <button type="button" id="deleteButton" class="btn btn-danger form-check control shadow mt-md-4">Eliminar</button>
                            <button type="button" id="addButton" class="btn btn-info form-check control shadow mt-md-4">Agregar otra</button>
                        </div>
                </div>
                <div class="modal-footer border-top border-secondary">
                    <button type="button" class="btn btn-danger text-light shadow" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info text-light shadow">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
