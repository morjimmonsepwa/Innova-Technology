@extends('admin.layouts.admin')

@section('cabecera')

        <!-- Page Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reportes</h1>
    </div>

@endsection

@section('contenido')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-2 font-weight-bold text-primary">Módulo de Reportes</h6>
                <div>
                    <button type="button" class="btn btn-danger">Generar Reporte Nuevo</button>
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
                            <th>Solicitudes</th>
                            <th>Generado por</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Queja</td>
                            <td>Producto roto</td>
                            <td>Tyler Joseph</td>
                            <td>3</td>
                            <td>Jazmin Meza</td>
                            <td>
                            <p class="text-danger">Cerrado</p>
                    </td>
                            <td>
                            <a href="" class="btn btn-primary btn-circle p-2">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a href="" class="btn btn-dark btn-circle p-2">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                            </td>
            
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Devolución</td>
                            <td>Producto en mal estado</td>
                            <td>Josh Dun</td>
                            <td>5</td>
                            <td>Andrea Sánchez</td>
                            <td>
                            <p class="text-success">Abierto</p>
                    </td>
                            <td>
                                <a href="" class="btn btn-primary btn-circle p-2">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a href="" class="btn btn-dark btn-circle p-2">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                            </td>
            
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Queja</td>
                            <td>Producto roto</td>
                            <td>Justin Bieber</td>
                            <td>4</td>
                            <td>Luis Montes</td>
                            <td>
                            <p class="text-warning">En proceso</p>
                    </td>
                            <td>
                            <a href="" class="btn btn-primary btn-circle p-2">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a href="" class="btn btn-dark btn-circle p-2">
                                    <i class="fas fa-duotone fa-trash"></i>
                                </a>
                            </td>
            
                        </tr>
                        <tr>
                            <td>004</td>
                            <td>Devolución</td>
                            <td>Producto defectuoso</td>
                            <td>Maatt Hunter</td>
                            <td>6</td>
                            <td>Monserrat Morales</td>
                            <td>
                            <p class="text-danger">Cerrado</p>
                        </a>
                    </td>
                            <td>
                            <a href="" class="btn btn-primary btn-circle p-2">
                                    <i class="fas fa-highlighter"></i>
                                </a>
                                <a href="" class="btn btn-dark btn-circle p-2">
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
    <!-- /.container-fluid -->

    
@endsection