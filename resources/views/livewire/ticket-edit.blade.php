<div>
    <div class="modal-content" wire:ignore.self>
        <div class="modal-header">
            <h5 class="modal-title">Editar</h5>
        </div>
        <form wire:submit.prevent="update" method="POST">
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Asunto</label>
                    <select class="form-control" id="asunto" wire:model="asunto">
                        <option value=""null"">Seleccione una opción: </option>
                        @switch($asunto)
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
                    @error('asunto') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Motivo</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" wire:model="motivo" id="motivo"  placeholder="Ingrese el motivo de la queja o devolución">
                    @error('motivo') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <input type="text" class="form-control" wire:model="cliente" id="cliente"  placeholder="Ingrese el nombre del cliente">
                    @error('cliente') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Vía Queja</label>
                    <select class="form-control" id="via" wire:model="via">
                        @switch($via)
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
                    @error('via') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Empresa</label>
                    <select class="form-control" id="empresa" wire:model="company">
                        <option value=""null"">Seleccione una opción: </option>
                        @foreach ($empresas as $empresa)
                            @if ($empresa->id == $company)
                                <option selected value="{{$empresa->id}}">{{$empresa->name}}</option>
                            @else
                                <option value="{{$empresa->id}}">{{$empresa->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('company') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Producto</label>
                    <input type="text" class="form-control"  wire:model="producto" id="producto" placeholder="Ingrese el nombre del producto">
                    @error('producto') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Encargado</label>
                    <select class="form-control" id="encargado" wire:model="encargado">
                        <option value=""null"">Seleccione una opción: </option>
                        @foreach ($usuarios as $usuario)
                            @if ($usuario->id == $encargado)
                                <option selected value="{{$usuario->id}}">{{$usuario->name}}</option>
                            @else
                                <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('encargado') <span class="text-danger">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>    
</div>
