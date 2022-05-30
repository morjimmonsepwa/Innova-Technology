@extends('admin.layouts.admin')

@section('cabecera')

        <!-- Page Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Grupos de Trabajo</h1>
    </div>

@endsection

@section('contenido')

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Grupos de Trabajo</h6>
    </div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Grupo</th>
                    <th>Líder</th>
                    <th>Informe</th>
                    <th>Cliente</th>
                    <th>No. Queja</th>
                    <th>Vía Queja</th>
                    <th>Estado de Ticket</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Luis</td>
                    <td>informe diario</td>
                    <td>Juanito</td>
                    <td>001</td>
                    <td>Email</td>
                    <td>
                        <a class="btn btn-danger">
                            Abierto
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jaz</td>
                    <td>informe diario</td>
                    <td>Clancy</td>
                    <td>002</td>
                    <td>Telefonica</td>
                    <td>
                        <a class="btn btn-success">
                            Proceso
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Monse</td>
                    <td>informe diario</td>
                    <td>Nedsito</td>
                    <td>002</td>
                    <td>Email</td>
                    <td>
                        <a class="btn btn-warning">
                            Cerrado
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