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
                    <button for="#agregar" type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#agregar">Agregar</button>
                </div>
            </div>
        <div class="card-body row row-cols-3">
            <!-- Dropdown Card Example -->
                <div class="col">
                    <div class="card shadow mb-4 border-left-info">
                        <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between col">
                                <h6 class="m-0 font-weight-bold text-primary">Grupo de Trabajo:  INNOVA</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Opciones:</div>
                                        <a class="dropdown-item" href="#">Editar</a>
                                        <a class="dropdown-item" href="#">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="avatar">
                            <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="avatar">
                            <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="avatar">
                            <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="avatar">
                            <span class="avatar p-2 text-primary" title="3 más">
                                +3
                            </span>
                        </div>
                    </div>
                </div>
             <!-- Dropdown Card Example -->
        </div>
    </div>
    <!-- /.container-fluid -->
    

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
                                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp"  id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Correo</label>
                                <input type="text" class="form-control"  id="email" name="email" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="passsword" name="passsword">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Rol</label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option>Seleccione una opción:</option>
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