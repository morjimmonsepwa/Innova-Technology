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
                    @if ( isset(json_decode(Auth::user()->rol->permisos,true)['grupos.store']))
                        <button for="#agregar" type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#agregar">Agregar</button>
                    @endif
                </div>
            </div>
            @livewire('grupos')
    </div>
    <!-- /.container-fluid -->
    

    <!-- Modales -->
       @livewire('groups')
    <!-- Modales -->

@endsection