<div>
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">                      
            <input id="something" class="form-control py-2  mr-1 pr-5" wire:model="searchnum" type="text" id="menu1" data-toggle="dropdown" wire:model="searchnum" placeholder="Buscar...">
        </label>
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Busqueda Ticket</h5>
                </div>
                <div class="modal-body">
                    @if (count($ticket) == 0)
                        <h5>No se encontró el Ticket</h5>
                    @else
                        @foreach ($ticket as $item)
                            <div class="mb-3">
                                <label class="form-label">Asunto:</label>
                                    @switch($item->affair)
                                        @case(1)
                                            <label class="form-label">
                                                <b>Queja</b>
                                            </label>
                                            @break
                                        @case(2)
                                            <label class="form-label">
                                                <b>Devolución</b>
                                            </label>
                                            @break
                                    @endswitch
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Motivo:</label>
                                <label class="form-label">
                                    <b>{{$item->reason}}</b>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cliente:</label>
                                <label class="form-label">
                                    <b>{{$item->client}}</b>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Vía Queja:</label>
                                    @switch($item->via)
                                        @case(1)
                                            <label class="form-label">
                                                <b>Email</b>
                                            </label>
                                            @break
                                        @case(2)
                                            <label class="form-label">
                                                <b>Llamada</b>
                                            </label>
                                            @break
                                    @endswitch
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Empresa:</label>
                                @foreach ($empresas as $empresa)
                                    @if ($empresa->id == $item->id_business)
                                        <b>{{$empresa->name}}</b>
                                    @endif
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Producto:</label>
                                <label class="form-label">
                                    <b>{{$item->product}}</b>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Generado por:</label>
                                @foreach ($usuarios as $usuario)
                                    @if ($usuario->id == $item->id_generate)
                                        <b>{{$usuario->name}}</b>
                                    @endif
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Encargado:</label>
                                @foreach ($usuarios as $usuario)
                                    @if ($usuario->id == $item->id_manager)
                                        <b>{{$usuario->name}}</b>
                                    @endif
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Asignado a:</label>
                                @foreach ($usuarios as $usuario)
                                    @if ($usuario->id == $item->id_assigned)
                                        <b>{{$usuario->name}}</b>
                                    @endif
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Estatus:</label>
                                @switch($item->status)
                                    @case(1)
                                        <label class="form-label">
                                            <b>Abierto</b>
                                        </label>
                                        @break
                                    @case(2)
                                        <label class="form-label">
                                            <b>Proceso</b>
                                        </label>
                                        @break
                                    @case(3)
                                        <label class="form-label">
                                            <b>Cerrado</b>
                                        </label>
                                        @break
                                @endswitch
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha Registro:</label>
                                    <label class="form-label">
                                        <b>{{$item->created_at->format('d-m-Y')}}</b>
                                    </label>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
</div>
