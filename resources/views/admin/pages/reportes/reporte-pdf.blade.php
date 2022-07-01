<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte del Ticket</title>
    <link href="
https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css

" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="modal-content">
            <div class="modal-header">
                <table border="0" class="table">
                <tr>
                <td>
                <?php
                $nombreImagen = "libs/index/img/logo/logo2.jpeg";
                $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
                ?>
                    <img src="<?php echo $imagenBase64 ?>" style="max-width: 125px;"/>
                </td>
                <td>
                <p><center>REPORTE DEL TICKET: {{ $ticket->id }}</p> 
                <p><center>Desarrollado por Innova Technology</p>    
                <p>Universidad Tecnológica de Nezahualcóyotl, Cto. Rey Nezahualcóyotl, Benito Juárez, C.P: 57000, Cd. Nezahualcóyotl, México. <br>
                        Tel: 55 5441 3182.
                </td>
                </tr>
        </table>
            </div>
            <br>
            <br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>


            <td>Folio: {{$ticket->id}} <br></td>
            <td>Asunto: 
                @switch($ticket->affair)
                    @case(1)
                            Queja
                        @break
                    @case(2)
                            Devolución
                        @break
                @endswitch
                
                <br></td>
            <tr><td>Motivo: {{$ticket->reason}}<br></td>
            <td>Cliente: {{$ticket->client}}<br></td>
            <tr><td>Vía Queja:
                @switch($ticket->via)
                    @case(1)
                            Email
                        @break
                    @case(2)
                            Llamada
                        @break
            @endswitch<br>
            </td>
            <td>Empresa: 
                @foreach ($empresas as $empresa)
                    @if ($empresa->id == $ticket->id_business)
                       {{$empresa->name}}
                   @endif
                @endforeach
                <br></td>
            <tr><td>Producto: {{$ticket->product}}<br></td>
            <td>Encargado:
                @foreach ($usuarios as $usuario)
                    @if ($usuario->id == $ticket->id_manager)
                        {{$usuario->name}}
                    @endif
                @endforeach
                <br></td>
            <tr><td>Asignado a: 
                @foreach ($usuarios as $usuario)
                    @if ($usuario->id == $ticket->id_assigned)
                            {{$usuario->name}}
                    @endif
                @endforeach
                <br></td>
            <td>Estatus: @switch($ticket->status)
                @case(1)
                    Abierto
                @break
                @case(2)
                    Proceso
                @break
                @case(3)
                    Cerrado
                @break
            @endswitch
            <br></td>
        </tr>
        </thead>
        </table>
    <script src="
https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js

" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html> 