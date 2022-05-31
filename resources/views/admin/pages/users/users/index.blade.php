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
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>
                                <a for="#editar" data-bs-toggle="modal" data-bs-target="#editar" class="btn btn-warning btn-circle p-2">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle p-2">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>
                                <a href="" class="btn btn-warning btn-circle p-2">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle p-2">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>
                                <a href="" class="btn btn-warning btn-circle p-2">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle p-2">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>
                                <a href="" class="btn btn-warning btn-circle p-2">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle p-2">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>
                                <a href="" class="btn btn-warning btn-circle p-2">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle p-2">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>
                                <a href="" class="btn btn-warning btn-circle p-2">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle p-2">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>
                                <a href="" class="btn btn-warning btn-circle p-2">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle p-2">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>
                                <a href="" class="btn btn-warning btn-circle p-2">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle p-2">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                            </td>
                        </tr>
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
                        <form>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Correo</label>
                                    <input type="text" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Rol</label>
                                    <select name="encargado" class="form-control" required>
                                        <option>Seleccione una opción:</option>
                                        <option value="">Monserrat Morales</option>
                                        <option value="">Luis Montes</option>
                                        <option value="">Andrea Sánchez</option>
                                        <option value="">Jazmin Meza</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Modal Agregar -->

    <!-- Modales -->


@endsection
