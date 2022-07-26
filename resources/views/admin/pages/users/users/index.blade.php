@extends('admin.layouts.admin')

@section('cabecera')

    <!-- Page Cabecera -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
        </div>
    <!-- Page Cabecera -->

@endsection

@section('contenido')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div>
                    @if ( isset(json_decode(Auth::user()->rol->permisos,true)['usuarios.store']))
                        <button for="#agregar" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregar">Agregar</button>
                    @endif
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
                                <img class="avatar" src="@if( $user->profile_photo_path == null ) {{  $user->profile_photo_url }} @else {{ asset('storage/'. $user->profile_photo_path) }}  @endif" />
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                {{$user->rol->name ?? 'Sin Rol'}}
                            </td>
                            <td >
                                @if ( isset(json_decode(Auth::user()->rol->permisos,true)['usuarios.update']))
                                    <a for="#editar-{{$user->id}}" type="button" class="btn btn-circle btn-primary" data-bs-toggle="modal" data-bs-target="#editar-{{$user->id}}">
                                        <i class="fas fa-highlighter"></i>
                                    </a>
                                @endif
                                @if ( isset(json_decode(Auth::user()->rol->permisos,true)['usuarios.destroy']))
                                    <a for="#eliminar-{{$user->id}}" type="button" class="btn btn-circle btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar-{{$user->id}}">
                                        <i class="fas fa-duotone fa-trash"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>

                        <!-- Modales -->
                            <!-- Modal Editar -->
                                <div class="modal fade" id="editar-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        @livewire('user-edit',['user_id'=>$user->id])
                                    </div>
                                </div>
                            <!-- Modal Editar -->           
                            <!-- Modal Eliminar -->
                                <div class="modal fade" tabindex="-2" id="eliminar-{{$user->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">¡Atención!</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estas Seguro de Eliminar?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <form action="{{ route('destroy.users',$user->id) }}" method="post">
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
                            <!-- Modal Editar -->
                        <!-- Modales -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <!-- Modales -->
        <!-- Modal Agregar -->
            @livewire('users')
        <!-- Modal Agregar -->
    <!-- Modales -->
    
@endsection


