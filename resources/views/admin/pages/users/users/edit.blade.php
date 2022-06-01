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
        <div class="card-body">
            <div class="table-responsive">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Usuario</h5>
                </div>
                <form action="{{ route('update.users',$user->id) }}" method="POST">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" id="name" name="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp"  id="name" name="name" value="{{$user->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" id="email" name="email" class="form-label">Correo</label>
                            <input type="text" class="form-control"  id="email" name="email" value="{{$user->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Rol</label>
                            <select name="encargado" class="form-control" id="rol" name="rol" required>
                                <option>Seleccione una opción:</option>
                                @foreach ($roles as  $role)
                                    @if( $role->id == $user->id_rol)
                                        <option  selected value="{{$role->id }}">{{$role->name}}</option>
                                    @else
                                        <option value="{{ $role->id}}">{{ $role->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <a href="{{route('index.users')}}" type="button" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
