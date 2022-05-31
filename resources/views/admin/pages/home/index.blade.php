@extends('admin.layouts.admin')

@section('cabecera')

        <!-- Page Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Página Principal</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <iclass="fas fa-download fa-sm text-white-50"></i> 
                Generar Reporte
        </a>
    </div>

@endsection

@section('contenido')
    <!-- Earnings (Usuarios) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Usuarios Registrados</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">40,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-solid-sign fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Tickets Abiertos) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Tickets (Abiertos)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Tickets Proceos) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Tickets (En Proceso)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Tickets Abiertos) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Tickets (Cerrados)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tickets</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Listado de Tickets</h6>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Asunto</th>
                            <th>Cliente</th>
                            <th>Vía</th>
                            <th>Producto</th>
                            <th>Generado Por</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Folio</th>
                            <th>Asunto</th>
                            <th>Cliente</th>
                            <th>Vía Queja</th>
                            <th>Producto</th>
                            <th>Generado Por</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>Queja</td>
                            <td>Mayka</td>
                            <td>Email</td>
                            <td>Laptop</td>
                            <td>Luis Montes</td>
                            <td>
                            <p class="text-danger">Cerrado</p>
                            </td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>Devolución</td>
                            <td>Ned</td>
                            <td>Telefónica</td>
                            <td>TV</td>
                            <td>Jazmin Meza</td>
                            <td>
                            <p class="text-success">Abierto</p>
                            </td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>Queja</td>
                            <td>Trash</td>
                            <td>Email</td>
                            <td>PC</td>
                            <td>Monserrat Morales</td>
                            <td>
                            <p class="text-warning">Proceso</p>
                            </td>
                        </tr>
                        <tr>
                            <td>04</td>
                            <td>Devolución</td>
                            <td>Clancy</td>
                            <td>Telefónica</td>
                            <td>Laptop</td>
                            <td>Andrea Sánchez</td>
                            <td>
                            <p class="text-danger">Cerrado</p>
                            </td>
                        </tr>
                        <tr>
                            <td>05</td>
                            <td>Queja</td>
                            <td>Tyler</td>
                            <td>Email</td>
                            <td>TV</td>
                            <td>Luis Montes</td>
                            <td>
                            <p class="text-success">Abierto</p>
                            </td>
                        </tr>
                        <tr>
                            <td>06</td>
                            <td>Devolución</td>
                            <td>Josh</td>
                            <td>Telefónica</td>
                            <td>Laptop</td>
                            <td>Luis Montes</td>
                            <td>
                            <p class="text-warning">Proceso</p>
                            </td>
                        </tr>
                        <tr>
                            <td>07</td>
                            <td>Queja</td>
                            <td>Jenna</td>
                            <td>Email</td>
                            <td>TV</td>
                            <td>Jazmin Meza</td>
                            <td>
                            <p class="text-danger">Cerrado</p>
                            </td>
                        </tr>
                        <tr>
                            <td>08</td>
                            <td>Devolución</td>
                            <td>Debby</td>
                            <td>Telefónica</td>
                            <td>Laptop</td>
                            <td>Monserrat Morales</td>
                            <td>
                            <p class="text-success">Abierto</p>
                            </td>
                        </tr>
                        <tr>
                            <td>09</td>
                            <td>Queja</td>
                            <td>Gerardo</td>
                            <td>Email</td>
                            <td>TV</td>
                            <td>Andrea Sánchez</td>
                            <td>
                            <p class="text-warning">Proceso</p>
                            </td>
                        </tr>
                        <tr>
                            <td>010</td>
                            <td>Devolución</td>
                            <td>Miguel</td>
                            <td>Telefónica</td>
                            <td>Laptop</td>
                            <td>Luis Montes</td>
                            <td>
                            <p class="text-danger">Cerrado</p>
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
