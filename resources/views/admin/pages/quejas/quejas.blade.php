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
        <h6 class="m-0 font-weight-bold text-primary">Formulario de Quejas y Devoluciones</h6>
    </div>
<div class="card-body">
<div class="col-lg-12">
            <form method="post" action="">
            @csrf
            @method('GET')
        </div>
        <div class="col-lg-12">
        <div class="form-group row">
            <label for="inputfolio" class="col-sm-2 col-form-label">Folio</label>
            <div class="col-lg-6">
            <input type="text" class="form-control" id="folio" placeholder="Folio">
            </div>
        </div>
        </div>
        <div class="col-lg-12">
        <div class="form-group row">
            <label for="description_project" class="col-sm-2 col-form-label">Asunto</label>
            <div class="col-lg-6">
                <select name="asunto" class="form-control" required>
                    <option>Seleccione una opción:</option>
                    <option value="">queja</option>
                    <option value="">devolución</option>
                </select>
            </div>
        </div>
        </div>
        <div class="col-lg-12">
        <div class="form-group row">
            <label for="inputmotivo" class="col-sm-2 col-form-label">Motivo</label>
            <div class="col-lg-6">
            <input type="text" class="form-control" id="motivo" placeholder="Ingrese el motivo de la queja o devolución">
            </div>
        </div>
        </div>
        <div class="col-lg-12">
        <div class="form-group row">
            <label for="inputnombre" class="col-sm-2 col-form-label">Cliente</label>
            <div class="col-lg-6">
            <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre del cliente">
            </div>
        </div>
        </div>
        <div class="col-lg-12">
        <div class="form-group row">
            <label for="description_project" class="col-sm-2 col-form-label">Vía Queja</label>
            <div class="col-lg-6">
                <select name="asunto" class="form-control" required>
                    <option>Seleccione una opción:</option>
                    <option value="">email</option>
                    <option value="">llamada</option>
                </select>
            </div>
        </div>
        </div>
        <div class="col-lg-12">
        <div class="form-group row">
            <label for="inputempresa" class="col-sm-2 col-form-label">Empresa</label>
            <div class="col-lg-6">
            <input type="text" class="form-control" id="empresa" placeholder="Ingrese el nombre de la empresa">
            </div>
        </div>
        </div>
        <div class="col-lg-12">
        <div class="form-group row">
            <label for="inputproducto" class="col-sm-2 col-form-label">Producto</label>
            <div class="col-lg-6">
            <input type="text" class="form-control" id="producto" placeholder="Ingrese el nombre del producto">
            </div>
        </div>
        </div>
        <div class="col-lg-12">
        <div class="form-group row">
            <label for="inputfecha" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-lg-6">
            <input type="text" class="form-control" id="fecha" placeholder="Ingrese la fecha en que se realizo la solicitud">
            </div>
        </div>
        </div>
        <div class="col-lg-12">
        <div class="form-group row">
            <label for="inputhora" class="col-sm-2 col-form-label">Hora</label>
            <div class="col-lg-6">
            <input type="text" class="form-control" id="hora" placeholder="Ingrese la hora en que se realizo la solicitud">
            </div>
        </div>
        </div>
        <div class="col-lg-12">
        <div class="form-group row">
            <label for="description_project" class="col-sm-2 col-form-label">Encargado</label>
            <div class="col-lg-6">
                <select name="encargado" class="form-control" required>
                    <option>Seleccione una opción:</option>
                    <option value="">Monserrat Morales</option>
                    <option value="">Luis Montes</option>
                    <option value="">Andrea Sánchez</option>
                    <option value="">Jazmin Meza</option>
                </select>
            </div>
        </div>
        </div>
        <div class="col-lg-12">
        <div class="form-group row">
    <label for="inputencargado" class="col-sm-2 col-form-label">Status Ticket</label>
      <div class="col-sm-10">
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
        <hr>
        <div class="col-lg-12"><button type="submit" class="btn btn-success"><i class="far fa-save"></i> Enviar </button> </div>
        </form>
    </div>
</div>

    </div>
    <!-- /.container-fluid -->

    
@endsection