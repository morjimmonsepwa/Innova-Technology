@extends('admin.layouts.admin')

@section('cabecera')

        <!-- Page Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
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
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center">
                                <div class="avatar flex justify-center">
                                    <div class="w-24 rounded-full">
                                        <img src="@if( $user->profile_photo_path == null ) {{  $user->profile_photo_url }} @else {{ asset('storage/'. $user->profile_photo_path) }}  @endif" />
                                    </div>
                                </div>
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->rol->name ?? 'Sin Rol'}}</td>
                            <td>
                                <a href="{{ route('edit.users',$user->id) }}" class="btn btn-primary btn-circle p-2">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <form action="{{ route('destroy.users',$user->id) }}" method="post">
                                    @csrf
                                    {{ method_field('PUT')}}
                                    <button  type="submit" class="btn btn-danger btn-circle p-2">
                                        <i class="fas fa-duotone fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <!-- Modales -->

        <!-- Modal Agregar -->
            <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Usuario</h5>
                        </div>
                        <form action="{{ route('store.users')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" id="name" name="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp"  id="name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" id="email" name="email" class="form-label">Correo</label>
                                    <input type="text" class="form-control"  id="email" name="email" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" id="passsword" name="passsword"  class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="passsword" name="passsword">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Rol</label>
                                    <select name="encargado" class="form-control" id="rol" name="rol" required>
                                        <option>Seleccione una opción:</option>
                                        @foreach ($roles as  $role)
                                            <option value="{{ $role->id}}">{{ $role->name}}</option>
                                        @endforeach
                                    </select>
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
