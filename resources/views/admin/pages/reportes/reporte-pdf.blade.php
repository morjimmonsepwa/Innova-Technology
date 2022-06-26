<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reporte</h5>
            </div>
            <br>
            <br>
            <br>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Folio</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" value ="{{$ticket->id}}" id="motivo" name="motivo" placeholder="Ingrese el motivo de la queja o devolución" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Asunto</label>
                    <select class="form-control" id="asunto" name="asunto" required disabled>
                        <option>Seleccione una opción: </option>
                        @switch($ticket->affair)
                            @case(1)
                                <option selected value="1">Queja</option>
                                <option value="2">Devolución</option>
                                @break
                            @case(2)
                                <option value="1">Queja</option>
                                <option selected value="2">Devolución</option>
                                @break
                        @endswitch
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Motivo</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" value ="{{$ticket->reason}}" id="motivo" name="motivo" placeholder="Ingrese el motivo de la queja o devolución" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <input type="text" class="form-control" value ="{{$ticket->client}}" id="cliente" name="cliente" placeholder="Ingrese el nombre del cliente" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Vía Queja</label>
                    <select class="form-control" id="via" name="via" disabled>
                        @switch($ticket->via)
                            @case(1)
                                <option selected value="1">Email</option>
                                <option value="2">Llamada</option>
                                @break
                            @case(2)
                                <option value="1">Email</option>
                                <option selected value="2">Llamada</option>
                                @break
                        @endswitch
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Empresa</label>
                    <select class="form-control" id="empresa" name="empresa" disabled>
                        <option>Seleccione una opción: </option>
                        @foreach ($empresas as $empresa)
                            @if ($empresa->id == $ticket->id_business)
                                <option selected value="{{$empresa->id}}">{{$empresa->name}}</option>
                            @else
                                <option value="{{$empresa->id}}">{{$empresa->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Producto</label>
                    <input type="text" class="form-control"  value="{{$ticket->product}}" id="producto" name="producto" placeholder="Ingrese el nombre del producto" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Encargado</label>
                    <select class="form-control" id="encargado" name="encargado" disabled>
                        <option>Seleccione una opción: </option>
                        @foreach ($usuarios as $usuario)
                            @if ($usuario->id == $ticket->id_manager)
                                <option selected value="{{$usuario->id}}">{{$usuario->name}}</option>
                            @else
                                <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Asignado a</label>
                    <select class="form-control" id="encargado" name="encargado" disabled>
                        <option>Seleccione una opción: </option>
                        @foreach ($usuarios as $usuario)
                            @if ($usuario->id == $ticket->id_assigned)
                                <option selected value="{{$usuario->id}}">{{$usuario->name}}</option>
                            @else
                                <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    @switch($ticket->status)
                        @case(1)
                        <div class="mb-3">
                            <label class="form-label">Estatus</label>
                            <input type="text" class="form-control text-success"  value="Abierto"  disabled>
                        </div>
                        @break
                        @case(2)
                        <div class="mb-3">
                            <label class="form-label">Estatus</label>
                            <input type="text" class="form-control text-warning"  value="Proceso"  disabled>
                        </div>
                        @break
                        @case(3)
                        <div class="mb-3">
                            <label class="form-label">Estatus</label>
                            <input type="text" class="form-control text-danger"  value="Cerrado"  disabled>
                        </div>
                        @break
                    @endswitch
                </div>
            </div>
        </div>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>