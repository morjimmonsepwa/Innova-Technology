@extends('admin.layouts.admin')

@section('cabecera')

        <!-- Page Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quejas y Devoluciones</h1>
    </div>

@endsection

@section('contenido')

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quejas y Devoluciones</h6>
    </div>
<div class="card-body">
<div class="col-lg-12">
            <form method="post" action="">
            @csrf
            @method('GET')
        </div>
        <div class="col-lg-4">
            <label>Folio</label>
            <input type="text" name="folio" class="form-control" value="" >
        </div>
        <div class="col-lg-12"></div>
        <div class="col-lg-4">
            <label>Asunto</label>
            <input type="text" name="asunto" class="form-control" value="">
        </div>
        <div class="col-lg-4">
            <label>Motivo</label>
            <input type="text" name="motivo" class="form-control" value="">
        </div>
        <div class="col-lg-4">
            <label>Datos del Cliente</label>
            <input type="text" name="datosCliente" class="form-control" value="">
        </div>
        <div class="col-lg-4">
            <label>Vía Queja</label>
            <input type="text" name="medioTicket" class="form-control" value="">
        </div>
        <div class="col-lg-4">
            <label>Empresa</label>
            <input type="text" name="empresa" class="form-control" value="">
        </div>
        <hr>
        <div class="col-lg-12"><button type="submit" class="btn btn-success"><i class="far fa-save"></i> Enviar </button> </div>
        </form>
    </div>
</div>

    </div>
    <!-- /.container-fluid -->

    
@endsection