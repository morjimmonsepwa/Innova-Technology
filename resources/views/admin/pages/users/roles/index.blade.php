@extends('admin.layouts.admin')

@section('cabecera')

    <!-- Page Cabecera -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Roles & Permisos</h1>
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
                    @if ( isset(json_decode(Auth::user()->rol->permisos,true)['role.store']))
                        <button for="#agregar" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregar">Agregar</button>
                    @endif
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
                                @if ( isset(json_decode(Auth::user()->rol->permisos,true)['role.update']))
                                    <a for="#editar-{{$role->id}}" type="button" class="btn btn-circle btn-primary" data-bs-toggle="modal" data-bs-target="#editar-{{$role->id}}">
                                        <i class="fas fa-highlighter"></i>
                                    </a>
                                @endif
                                @if ( isset(json_decode(Auth::user()->rol->permisos,true)['role.destroy']))
                                    <a for="#eliminar-{{$role->id}}" type="button" class="btn btn-circle btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar-{{$role->id}}">
                                        <i class="fas fa-duotone fa-trash"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        <!-- Modales -->
                            <!-- Modal Editar -->
                                <div class="modal fade" id="editar-{{$role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Usuario</h5>
                                            </div>
                                            <form action="{{ route('update.role',$role->id) }}" method="POST">
                                                @csrf
                                                {{ method_field('PATCH') }}
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="name" name="name" id="name"  class="form-label">Nombre</label>
                                                        <input type="text" value="{{$role->name}}" name="name" id="name" class="form-control" aria-describedby="nombre">
                                                    </div>
                                                    <label for="permisos" class="form-label">Permisos:</label>
                                                    <div class="mb-3">
                                                    <div class="container overflow-hidden">
                                                        <div class="container">
                                                            <div class="row row-cols-3">
                                                                @foreach ($permisos as $key=>$value ) 
                                                                    <div class="col">
                                                                        <input class="form-check-input" name="permisos[]" value="{{$key}}" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                                                                        @if( $role->permisos == null)
                                                                        @else
                                                                            @foreach( json_decode($role->permisos,true) as $key1 => $boolean)
                                                                                @if($key1==$key)
                                                                                    checked
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                        > 
                                                                        <label class="form-check-label" for="flexSwitchCheckDefault">
                                                                            {{  
                                                                                str_replace('create','crear',
                                                                                str_replace('create','crear',
                                                                                str_replace('edit','editar',
                                                                                str_replace('index','inicio',
                                                                                str_replace('role','roles',
                                                                                str_replace('destroy','eliminar',
                                                                                str_replace('.',' ',
                                                                                $key )))))))
                                                                            }}
                                                                        </label>
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
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <!-- Modal Editar -->           
                            <!-- Modal Eliminar -->
                                <div class="modal fade" tabindex="-2" id="eliminar-{{$role->id}}">
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
                                            <form action="{{ route('destroy.role',$role->id) }}" method="post">
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
                                    <label for="name" name="name" id="name"  class="form-label">Nombre</label>
                                    <input type="text" name="name" id="name" class="form-control" aria-describedby="nombre">
                                </div>
                                <label for="permisos" class="form-label">Permisos:</label>
                                <div class="mb-3">
                                <div class="container overflow-hidden">
                                    <div class="container">
                                        <input type="checkbox" class="form-check-input" id="checkboxAll">Seleccionar Todos
                                        <div class="row row-cols-3">
                                            @foreach ($permisos as $key=>$value ) 
                                                <div class="col">
                                                    <input class="form-check-input chkboxname" name="permisos[]" value="{{$key}}" type="checkbox" role="switch" id="{{$key}}">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">
                                                        {{  
                                                            str_replace('create','crear',
                                                            str_replace('create','crear',
                                                            str_replace('edit','editar',
                                                            str_replace('index','inicio',
                                                            str_replace('role','roles',
                                                            str_replace('destroy','eliminar',
                                                            str_replace('.',' ',
                                                            $key )))))))
                                                        }}
                                                    </label>
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Modal Agregar -->
    <!-- Modales -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#checkboxAll').click(function(){
            $(".chkboxname").prop('checked',$(this).prod('checked'));
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>

@endsection
