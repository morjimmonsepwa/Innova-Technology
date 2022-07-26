<div>
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">                      
            <input id="something" class="form-control py-2  mr-1 pr-5" list="somethingelse" wire:model="searchnum" placeholder="Buscar...">
            <datalist id="somethingelse">
                @foreach ($ticket as $item)
                    <option value="{{$item->reason}}">{{$item->id}}</option>
                @endforeach
            </datalist>
        </label>
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
            {{$searchnum}}
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
                    @foreach ($ticket as $item)
                        <div class="mb-3">
                            <label class="form-label">Asunto</label>
                            <select class="form-control" id="asunto">
                                <option value=""null"">Seleccione una opción: </option>
                                @switch($item->affair)
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
                            <input type="text" class="form-control" aria-describedby="emailHelp" value="{{$item->reason}}" id="motivo"  placeholder="Ingrese el motivo de la queja o devolución">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cliente</label>
                            <input type="text" class="form-control" id="cliente" value="{{$item->client}}" placeholder="Ingrese el nombre del cliente">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Vía Queja</label>
                            <select class="form-control" id="via">
                                @switch($item->via)
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
                            <select class="form-control" id="empresa">
                                <option value=""null"">Seleccione una opción: </option>
                                {{-- @foreach ($empresas as $empresa)
                                    @if ($empresa->id == $item->id_business)
                                        <option selected value="{{$empresa->id}}">{{$empresa->name}}</option>
                                    @else
                                        <option value="{{$empresa->id}}">{{$empresa->name}}</option>
                                    @endif
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Producto</label>
                            <input type="text" class="form-control" id="producto" value="{{$item->product}}" placeholder="Ingrese el nombre del producto">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Encargado</label>
                            <select class="form-control" id="encargado">
                                <option value=""null"">Seleccione una opción: </option>
                                {{-- @foreach ($usuarios as $usuario)
                                    @if ($usuario->id == $item->id_manager)
                                        <option selected value="{{$usuario->id}}">{{$usuario->name}}</option>
                                    @else
                                        <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                    @endif
                                @endforeach --}}
                            </select>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
</div>
