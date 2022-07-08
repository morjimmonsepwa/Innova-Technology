@extends('admin.layouts.admin')

@section('cabecera')

    <!-- Page Cabecera -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
        </div>
    <!-- Page Cabecera -->

@endsection

@section('contenido')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div>
                    @if ( isset(json_decode(Auth::user()->rol->permisos,true)['usuarios.store']))
                        <button for="#agregar" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregar">Agregar</button>
                    @endif
                </div>
            </div>
        <div class="card-body">
           @livewire('users');
        </div>
    </div>
</div>


@endsection


