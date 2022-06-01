@extends('admin.layouts.admin')

@section('cabecera')

        <!-- Page Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Informes</h1>
    </div>

@endsection

@section('contenido')

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado del Trabajo Diario del Equipo</h6>
    </div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Grupo</th>
                    <th>Nombre del Cliente</th>
                    <th>Empresa</th>
                    <th>Queja</th>
                    <th>Devolución</th>
                    <th>Registro de Llamadas</th>
                    <th>Registro de Correos</th>
                    <th>Estado de Ticket</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Daniel García</td>
                    <td>Amazon</td>
                    <td>001</td>
                    <td>Si</td>
                    <td>5</td>
                    <td>3</td>
                    <td>
                    <p class="text-danger">Cerrado</p>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ricardo Mendez</td>
                    <td>Esteren</td>
                    <td>002</td>
                    <td>No</td>
                    <td>1</td>
                    <td>1</td>
                    <td>
                    <p class="text-success">Abierto</p>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Alexander Martinez</td>
                    <td>Technical</td>
                    <td>003</td>
                    <td>Pendiente</td>
                    <td>10</td>
                    <td>4</td>
                    <td>
                    <p class="text-warning">Proceso</p>
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