@extends('admin.layouts.admin')

@section('cabecera')

        <!-- Page Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Página Principal</h1>
    </div>

@endsection


@if ( isset(json_decode(Auth::user()->rol->permisos,true)['dashboard.index']))

    @section('contenido')
        <!-- Earnings (Usuarios) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Usuarios Registrados</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{count($registrado)}}
                            </div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{count($abiertos)}}
                            </div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{count($proceso)}}
                            </div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{count($cerrado)}}
                            </div>
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
            @livewire('informe')
        </div>
        <!-- /.container-fluid -->

        
    @endsection

@endif
