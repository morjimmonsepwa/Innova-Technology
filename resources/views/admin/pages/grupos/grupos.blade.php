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
                                        <a class="dropdown-item" for="#editar" type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#editar">Editar</a>
                                        <a class="dropdown-item" for="#eliminar" type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar</a>
                                        <a class="dropdown-item" for="#usuarios" type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#usuarios">Asinar Usuarios</a>
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
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Grupo</h5>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="name" name="name" id="name"  class="form-label">Nombre del Equipo</label>
                                    <input type="text" name="name" id="name" class="form-control" aria-describedby="nombre">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        <!-- Modal Agregar -->
        <!-- Modal Editar -->
            <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Grupo</h5>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="name" name="name" id="name"  class="form-label">Nombre del Equipo</label>
                                    <input type="text" name="name" id="name" class="form-control" aria-describedby="nombre">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        <!-- Modal Editar -->
        <!-- Modal Eliminar -->
            <div class="modal fade" tabindex="-2" id="eliminar">
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
                        <form action="#" method="post">
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
        <!-- Modal Usuarios -->
            <div class="modal fade" id="usuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Asignar Usuarios</h5>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <input class="form-control mb-4" id="tableSearch" type="text"
                                placeholder="Nombre Usuario">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Firstname</th>
                                            <th>Rol</th>
                                            <th>Estatus</th>
                                            <th>Opción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <tr>
                                            <td>
                                                <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="avatar">
                                                John
                                            </td>
                                            <td>Administrador</td>
                                            <td class="text text-success">Sin Asignar</td>
                                            <td>
                                                <button type="submit" class="btn btn-primary">
                                                    Agregar
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="avatar">
                                                Mary
                                            </td>
                                            <td>
                                                Usuario
                                            </td>
                                            <td class="text text-danger">Asignado</td>
                                            <td>
                                                <button type="submit" class="btn btn-danger">
                                                    Eliminar
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        <!-- Modal Usuarios -->
    <!-- Modales -->

@endsection