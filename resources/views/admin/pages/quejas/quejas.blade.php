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
                        <tr>
                            <td>001</td>
                            <td>Devolución</td>
                            <td>Producto en mal estado</td>
                            <td>Josh Dun</td>
                            <td>Nike</td>
                            <td>Llamada</td>
                            <td >
                                <a for="#editar" type="button" class="btn btn-circle btn-primary" data-bs-toggle="modal" data-bs-target="#editar">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a for="#eliminar" type="button" class="btn btn-circle btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                                <a for="#ver" type="button" class="btn btn-circle btn-danger" data-bs-toggle="modal" data-bs-target="#ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
<!-- Modales -->
    <!-- Modal Editar -->
    <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar</h5>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Asunto</label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option>Seleccione una opción: </option>
                                    <option value="">queja</option>
                                    <option value="">devolución</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Motivo</label>
                                <input type="text" class="form-control" value="" aria-describedby="emailHelp" id="name" name="name" placeholder="Ingrese el motivo de la queja o devolución">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cliente</label>
                                <input type="text" class="form-control" value=""  id="email" name="email" placeholder="Ingrese el nombre del cliente">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vía Queja</label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option>Seleccione una opción: </option>
                                    <option value="">email</option>
                                    <option value="">llamada</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Empresa</label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option>Seleccione una opción: </option>
                                    <option value="">Microsoft</option>
                                    <option value="">Android</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Producto</label>
                                <input type="text" class="form-control" value=""  id="email" name="email" placeholder="Ingrese el nombre del producto">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha</label>
                                <input type="text" class="form-control" value=""  id="email" name="email" placeholder="Ingrese la fecha">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hora</label>
                                <input type="text" class="form-control" value=""  id="email" name="email" placeholder="Ingrese la hora">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Encargado</label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option>Seleccione una opción: </option>
                                    <option value="">Andrea Sánchez</option>
                                    <option value="">Jazmin Meza</option>
                                    <option value="">Luis Montes</option>
                                    <option value="">Monserrat Morales</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Ticket</label>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">Abierto</label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">En Proceso</label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">Cerrado</label>
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
    <!-- Modal Editar -->
    <div class="modal fade" id="ver" tabindex="-3" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ver</h5>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Asunto</label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option>Seleccione una opción: </option>
                                    <option value="">queja</option>
                                    <option value="">devolución</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Motivo</label>
                                <input type="text" class="form-control" value="" aria-describedby="emailHelp" id="name" name="name" placeholder="Ingrese el motivo de la queja o devolución">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cliente</label>
                                <input type="text" class="form-control" value=""  id="email" name="email" placeholder="Ingrese el nombre del cliente">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vía Queja</label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option>Seleccione una opción: </option>
                                    <option value="">email</option>
                                    <option value="">llamada</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Empresa</label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option>Seleccione una opción: </option>
                                    <option value="">Microsoft</option>
                                    <option value="">Android</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Producto</label>
                                <input type="text" class="form-control" value=""  id="email" name="email" placeholder="Ingrese el nombre del producto">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha</label>
                                <input type="text" class="form-control" value=""  id="email" name="email" placeholder="Ingrese la fecha">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hora</label>
                                <input type="text" class="form-control" value=""  id="email" name="email" placeholder="Ingrese la hora">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Encargado</label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option>Seleccione una opción: </option>
                                    <option value="">Andrea Sánchez</option>
                                    <option value="">Jazmin Meza</option>
                                    <option value="">Luis Montes</option>
                                    <option value="">Monserrat Morales</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Ticket</label>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">Abierto</label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">En Proceso</label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">Cerrado</label>
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
                    <form action="" method="post">
                        @csrf
                        <button  type="submit" class="btn btn-primary">
                            Eliminar
                        </button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    <!-- Modal Editar -->
    <!-- Modal Agregar -->
    <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar una Queja o Devolución</h5>
                        </div>
                        <form action="" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Asunto</label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option>Seleccione una opción: </option>
                                    <option value="">queja</option>
                                    <option value="">devolución</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Motivo</label>
                                <input type="text" class="form-control" value="" aria-describedby="emailHelp" id="name" name="name" placeholder="Ingrese el motivo de la queja o devolución">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cliente</label>
                                <input type="text" class="form-control" value=""  id="email" name="email" placeholder="Ingrese el nombre del cliente">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vía Queja</label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option>Seleccione una opción: </option>
                                    <option value="">email</option>
                                    <option value="">llamada</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Empresa</label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option>Seleccione una opción: </option>
                                    <option value="">Microsoft</option>
                                    <option value="">Android</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Producto</label>
                                <input type="text" class="form-control" value=""  id="email" name="email" placeholder="Ingrese el nombre del producto">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha</label>
                                <input type="text" class="form-control" value=""  id="email" name="email" placeholder="Ingrese la fecha">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hora</label>
                                <input type="text" class="form-control" value=""  id="email" name="email" placeholder="Ingrese la hora">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Encargado</label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option>Seleccione una opción: </option>
                                    <option value="">Andrea Sánchez</option>
                                    <option value="">Jazmin Meza</option>
                                    <option value="">Luis Montes</option>
                                    <option value="">Monserrat Morales</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Ticket</label>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">Abierto</label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">En Proceso</label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">Cerrado</label>
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


@endsection


