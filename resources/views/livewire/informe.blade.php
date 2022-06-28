<div>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tickets</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado de Tickets</h6>
        </div>
        <div class="card-body" wire:ignore>
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
                            <th>Asignado a</th>
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
                            <th>Asignado a</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>
                                    {{$ticket->id}}
                                </td>
                                <td>
                                @if ($ticket->affair == 1)
                                    Queja
                                @endif
                                @if ($ticket->affair == 2)
                                    Devolución
                                @endif
                                </td>
                                <td>
                                    {{$ticket->client}}
                                </td>
                                <td> 
                                @if ($ticket->via == 1)
                                    Email
                                @endif
                                @if ($ticket->via == 2)
                                    Llamada
                                @endif
                                </td>
                                <td>
                                    {{$ticket->product}}
                                </td>
                                <td> 
                                    {{$ticket->generado->name}}
                                </td>
                                <td>
                                    <select wire:change="asignar($event.target.value,{{$ticket->id}})" class="form-control col-lg-8" id="asignado" name="asignado">
                                        <option value="0">Sin Asignación</option>
                                        @foreach ($users as $user)
                                            @if ($ticket->id_assigned == $user->id)
                                                <option selected value="{{$user->id}}">{{$user->name}}</option>
                                            @else
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                       
                                    </select>
                                </td>
                                <td>
                                    <select wire:change="status_ticket($event.target.value,{{$ticket->id}})" 
                                        class="form-control col-lg-8 border 
                                            @if ($ticket->status == 1)
                                                border-success
                                            @endif
                                            @if ($ticket->status == 2)
                                                border-warning
                                            @endif
                                            @if ($ticket->status == 3)
                                                border-danger
                                            @endif
                                        " id="asignado" name="asignado">
                                        <option value="0">Sin Asignación</option>
                                            @if ($ticket->status == 1)
                                                <option  value="1" selected class="text-success">Abierto</option>
                                                <option  value="2" class="text-warning">Proceso</option>
                                                <option  value="3" class="text-danger">Cerrado</option>
                                            @endif
                                            @if ($ticket->status == 2)
                                                <option  value="1" class="text-success">Abierto</option>
                                                <option  value="2" selected class="text-warning">Proceso</option>
                                                <option  value="3" class="text-danger">Cerrado</option>
                                            @endif
                                            @if ($ticket->status == 3)
                                                <option  value="1" class="text-success">Abierto</option>
                                                <option  value="2" class="text-warning">Proceso</option>
                                                <option  value="3" selected class="text-danger">Cerrado</option>
                                            @endif
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
