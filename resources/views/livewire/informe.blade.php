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
                                        <option>Sin Asignación</option>
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
                                    @if ($ticket->status == 1)
                                        <p class="text-success">Abierto</p>
                                    @endif
                                    @if ($ticket->status == 2)
                                        <p class="text-warning">Proceso</p>
                                    @endif
                                    @if ($ticket->status == 3)
                                        <p class="text-danger">Cerrado</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
