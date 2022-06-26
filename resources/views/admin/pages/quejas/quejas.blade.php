@extends('admin.layouts.admin')

@section('cabecera')

        <!-- Page Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quejas y Devoluciones</h1>
    </div>

@endsection

@section('contenido')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div>
                    <button for="#agregar" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregar">Agregar</button>
                    <a href="{{route('index.empresas')}}"><button type="button" class="btn btn-primary">Empresas</button></a>
                   
                </div>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Asunto</th>
                            <th>Motivo</th>
                            <th>Cliente</th>
                            <th>Empresa</th>
                            <th>Vía Queja</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                        <tr>
                            <td>    
                                {{$ticket->id}}
                            </td>
                            <td>
                                @switch($ticket->affair)
                                    @case(1)
                                        Queja
                                        @break
                                    @case(2)
                                        Devolución
                                        @break
                                @endswitch
                            </td>
                            <td>
                                {{$ticket->reason}}
                            </td>
                            <td>
                                {{$ticket->client}}
                            </td>
                            <td>
                                {{$ticket->empresa->name}}
                            </td>
                            <td>
                                @switch($ticket->via)
                                    @case(1)
                                        Email
                                        @break
                                    @case(2)
                                        Llamada
                                        @break
                                @endswitch
                            </td>
                            <td >
                                <a for="#editar-{{$ticket->id}}" type="button" class="btn btn-circle btn-primary" data-bs-toggle="modal" data-bs-target="#editar-{{$ticket->id}}">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a for="#eliminar-{{$ticket->id}}" type="button" class="btn btn-circle btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar-{{$ticket->id}}">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                                <a for="#ver-{{$ticket->id}}" type="button" class="btn btn-circle btn-warning" data-bs-toggle="modal" data-bs-target="#ver-{{$ticket->id}}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                            <!-- Modal Editar--->
                                <div class="modal fade" id="editar-{{$ticket->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar</h5>
                                            </div>
                                            <form action="{{route('update.quejas',$ticket->id)}}" method="POST">
                                                @csrf
                                                {{ method_field('PATCH')}}
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Asunto</label>
                                                        <select class="form-control" id="asunto" name="asunto" required>
                                                            <option>Seleccione una opción: </option>
                                                            @switch($ticket->affair)
                                                                @case(1)
                                                                    <option selected value="1">Queja</option>
                                                                    <option value="2">Devolución</option>
                                                                    @break
                                                                @case(2)
                                                                    <option value="1">Queja</option>
                                                                    <option selected value="2">Devolución</option>
                                                                    @break
                                                            @endswitch
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Motivo</label>
                                                        <input type="text" class="form-control" aria-describedby="emailHelp" value ="{{$ticket->reason}}" id="motivo" name="motivo" placeholder="Ingrese el motivo de la queja o devolución">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Cliente</label>
                                                        <input type="text" class="form-control" value ="{{$ticket->client}}" id="cliente" name="cliente" placeholder="Ingrese el nombre del cliente">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Vía Queja</label>
                                                        <select class="form-control" id="via" name="via" required>
                                                            @switch($ticket->via)
                                                                @case(1)
                                                                    <option selected value="1">Email</option>
                                                                    <option value="2">Llamada</option>
                                                                    @break
                                                                @case(2)
                                                                    <option value="1">Email</option>
                                                                    <option selected value="2">Llamada</option>
                                                                    @break
                                                            @endswitch
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Empresa</label>
                                                        <select class="form-control" id="empresa" name="empresa" required>
                                                            <option>Seleccione una opción: </option>
                                                            @foreach ($empresas as $empresa)
                                                                @if ($empresa->id == $ticket->id_business)
                                                                    <option selected value="{{$empresa->id}}">{{$empresa->name}}</option>
                                                                @else
                                                                    <option value="{{$empresa->id}}">{{$empresa->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Producto</label>
                                                        <input type="text" class="form-control"  value="{{$ticket->product}}" id="producto" name="producto" placeholder="Ingrese el nombre del producto">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Encargado</label>
                                                        <select class="form-control" id="encargado" name="encargado" required>
                                                            <option>Seleccione una opción: </option>
                                                            @foreach ($usuarios as $usuario)
                                                                @if ($usuario->id == $ticket->id_manager)
                                                                    <option selected value="{{$usuario->id}}">{{$usuario->name}}</option>
                                                                @else
                                                                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <!-- Modal Editar --> 
                            <!-- Modal Ver-->
                                <div class="modal fade" id="ver-{{$ticket->id}}" tabindex="-3" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ver detalle</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Asunto</label>
                                                    <select class="form-control" id="asunto" name="asunto" required disabled>
                                                        <option>Seleccione una opción: </option>
                                                        @switch($ticket->affair)
                                                            @case(1)
                                                                <option selected value="1">Queja</option>
                                                                <option value="2">Devolución</option>
                                                                @break
                                                            @case(2)
                                                                <option value="1">Queja</option>
                                                                <option selected value="2">Devolución</option>
                                                                @break
                                                        @endswitch
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Motivo</label>
                                                    <input type="text" class="form-control" aria-describedby="emailHelp" value ="{{$ticket->reason}}" id="motivo" name="motivo" placeholder="Ingrese el motivo de la queja o devolución" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Cliente</label>
                                                    <input type="text" class="form-control" value ="{{$ticket->client}}" id="cliente" name="cliente" placeholder="Ingrese el nombre del cliente" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Vía Queja</label>
                                                    <select class="form-control" id="via" name="via" disabled>
                                                        @switch($ticket->via)
                                                            @case(1)
                                                                <option selected value="1">Email</option>
                                                                <option value="2">Llamada</option>
                                                                @break
                                                            @case(2)
                                                                <option value="1">Email</option>
                                                                <option selected value="2">Llamada</option>
                                                                @break
                                                        @endswitch
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Empresa</label>
                                                    <select class="form-control" id="empresa" name="empresa" disabled>
                                                        <option>Seleccione una opción: </option>
                                                        @foreach ($empresas as $empresa)
                                                            @if ($empresa->id == $ticket->id_business)
                                                                <option selected value="{{$empresa->id}}">{{$empresa->name}}</option>
                                                            @else
                                                                <option value="{{$empresa->id}}">{{$empresa->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Producto</label>
                                                    <input type="text" class="form-control"  value="{{$ticket->product}}" id="producto" name="producto" placeholder="Ingrese el nombre del producto" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Encargado</label>
                                                    <select class="form-control" id="encargado" name="encargado" disabled>
                                                        <option>Seleccione una opción: </option>
                                                        @foreach ($usuarios as $usuario)
                                                            @if ($usuario->id == $ticket->id_manager)
                                                                <option selected value="{{$usuario->id}}">{{$usuario->name}}</option>
                                                            @else
                                                                <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- Modal Ver --> 
                            <!-- Modal Eliminar-->
                                <div class="modal fade" tabindex="-2" id="eliminar-{{$ticket->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">¡Atención!</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estas Seguro de Eliminar?</p>
                                            <small>{{$ticket->reason}}</small>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <form action="{{route('destroy.quejas',$ticket->id)}}" method="POST">
                                                @csrf
                                                {{ method_field('PUT')}}
                                                <button  type="submit" class="btn btn-primary">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- Modal Eliminar -->   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <!-- Modales -->
        <!-- Modal Agregar -->
            <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar una Queja o Devolución</h5>
                        </div>
                        <form action="{{route('store.quejas')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Asunto</label>
                                <select class="form-control" id="asunto" name="asunto" required>
                                    <option>Seleccione una opción: </option>
                                    <option value="1">Queja</option>
                                    <option value="2">Devolución</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Motivo</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" id="motivo" name="motivo" placeholder="Ingrese el motivo de la queja o devolución">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cliente</label>
                                <input type="text" class="form-control"  id="cliente" name="cliente" placeholder="Ingrese el nombre del cliente">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vía Queja</label>
                                <select class="form-control" id="via" name="via" required>
                                    <option>Seleccione una opción: </option>
                                    <option value="1">Email</option>
                                    <option value="2">Llamada</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Empresa</label>
                                <select class="form-control" id="empresa" name="empresa" required>
                                    <option>Seleccione una opción: </option>
                                    @foreach ($empresas as $empresa)
                                        <option value="{{$empresa->id}}">{{$empresa->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Producto</label>
                                <input type="text" class="form-control"  id="producto" name="producto" placeholder="Ingrese el nombre del producto">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Encargado</label>
                                <select class="form-control" id="encargado" name="encargado" required>
                                    <option>Seleccione una opción: </option>
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        <!-- Modal Agregar -->
    <!-- Modales -->


@endsection


