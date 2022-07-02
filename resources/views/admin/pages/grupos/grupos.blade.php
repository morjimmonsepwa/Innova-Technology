@extends('admin.layouts.admin')

@section('cabecera')

        <!-- Page Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Grupos de Trabajo</h1>
    </div>

@endsection

@section('contenido')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div>
                    @if ( isset(json_decode(Auth::user()->rol->permisos,true)['grupos.store']))
                        <button for="#agregar" type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#agregar">Agregar</button>
                    @endif
                </div>
            </div>
        <div class="card-body row row-cols-3">
            <!-- Dropdown Card Example -->
                @foreach ($groups as $group)
                    <div class="col">
                        <div class="card shadow mb-4 border-left-info">
                            <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between col">
                                    <h6 class="m-0 font-weight-bold text-primary">Grupo de Trabajo:  {{$group->name}}</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Opciones:</div>
                                            @if ( isset(json_decode(Auth::user()->rol->permisos,true)['grupos.update']))
                                                <a class="dropdown-item" for="#editar-{{$group->id}}" type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#editar-{{$group->id}}">Editar</a>
                                            @endif
                                            @if ( isset(json_decode(Auth::user()->rol->permisos,true)['grupos.destroy']))
                                                <a class="dropdown-item" for="#eliminar-{{$group->id}}" type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#eliminar-{{$group->id}}">Eliminar</a>
                                            @endif
                                            @if ( isset(json_decode(Auth::user()->rol->permisos,true)['grupos.asignar']))
                                                <a class="dropdown-item" for="#usuarios-{{$group->id}}" type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#usuarios-{{$group->id}}">Asignar Usuarios</a>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            <!-- Card Body -->
                            <div class="card-body">
                            @foreach ($details as $detail)
                                @if ($detail->id_group == $group->id)
                                    <img class="avatar" alt="Avatar" src="@if( $detail->user->profile_photo_path == null ) {{  $detail->user->profile_photo_url}} @else {{ asset('storage/'. $detail->user->profile_photo_path) }}  @endif" />
                                @endif   
                            @endforeach
                            </div>
                        </div>
                    </div>
            
            <!-- Modal Editar -->
            <div class= "center">
            <div class="modal fade" id="editar-{{$group->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Grupo</h5>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form action="{{route('update.grupos',$group->id)}}" method="POST">
                                @csrf
                                {{ method_field('PATCH')}}
                                    <div class="mb-3">
                                        <label for="name" name="name" id="name"  class="form-label">Nombre del Equipo</label>
                                        <input type="text" name="name" id="name" class="form-control" aria-describedby="nombre" value="{{$group->name}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
            </div>
            <!-- Modal Editar -->
            <!-- Modal Usuarios -->
            <div class= "center">
                <div class="modal fade" id="usuarios-{{$group->id}}" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    @livewire('asigneusers',['id_group'=>$group->id])

                </div>
            </div>
                
            <!-- Modal Usuarios -->
            <!-- Modal Eliminar -->
            <div class="Center">
                <div class="modal fade" tabindex="-3" id="eliminar-{{$group->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">¡Atención!</h5>
                            </div>
                            <div class="modal-body">
                                <p>¿Estas Seguro de Eliminar?</p><small>{{$group->name}}</small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <form action="{{route('destroy.grupos',$group->id)}}" method="post">
                                    @csrf
                                    {{ method_field('PUT')}}
                                    @csrf
                                    <button  type="submit" class="btn btn-primary">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Editar -->
                @endforeach
             <!-- Dropdown Card Example -->
        </div>
    </div>
    <!-- /.container-fluid -->
    

    <!-- Modales -->
        <!-- Modal Agregar -->
            <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Grupo</h5>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form action="{{route('store.grupos')}}" method="POST">
                                @csrf
                                    <div class="mb-3">
                                        <label for="name" name="name" id="name"  class="form-label">Nombre del Equipo</label>
                                        <input type="text" name="name" id="name" class="form-control" aria-describedby="nombre">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        <!-- Modal Agregar -->
    <!-- Modales -->

@endsection