@extends('admin.layouts.admin')

@section('cabecera')

        <!-- Page Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Roles & Permisos</h1>
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
                </div>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre Rol</th>
                            <th>Fecha Creación</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role )
                        <tr>
                            <td>{{ $role->name}}</td>
                            <td>{{ $role->created_at}}</td>
                            <td>
                                <a href="{{ route('edit.role',$role->id) }}" class="btn btn-warning btn-circle p-2">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle p-2">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
                            <h5 class="modal-title">Agregar Rol</h5>
                        </div>
                        <form action="{{ route('store.role')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" name="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" aria-describedby="nombre">
                                </div>
                                <label for="permisos" class="form-label">Permisos:</label>
                                <div class="mb-3">
                                <div class="container overflow-hidden">
                                    <div class="container">
                                        <div class="row row-cols-3">
                                            @foreach ($permisos as $key=>$value ) 
                                                <div class="col">
                                                    <input class="form-check-input" name="permisos[]" value="{{$key}}" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">{{ str_replace('.',' ',$key ) }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Modal Agregar -->
    
    <!-- Modales -->

@endsection
