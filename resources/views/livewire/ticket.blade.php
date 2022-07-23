<div>
    <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Ticket </h5>
                </div>
                <form wire:submit.prevent="store" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Número de Ticket</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" value="{{old('motivo')}}" id="motivo" wire:model="motivo" placeholder="Ingrese el número de ticket">
                        @error('motivo') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Asunto</label>
                        <select class="form-control" value="{{old('asunto"')}}" id="asunto" wire:model="asunto">
                            <option value=""null"">Seleccione una opción: </option>
                            <option value="1">Queja</option>
                            <option value="2">Devolución</option>
                        </select>
                        @error('asunto') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Motivo</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" value="{{old('motivo')}}" id="motivo" wire:model="motivo" placeholder="Ingrese el motivo de la queja o devolución">
                        @error('motivo') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cliente</label>
                        <input type="text" class="form-control"  value="{{old('cliente')}}" id="cliente" wire:model="cliente" placeholder="Ingrese el nombre del cliente">
                        @error('cliente') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Vía Queja</label>
                        <select class="form-control" value="{{old('via')}}" id="via" wire:model="via">
                            <option  value=""null"">Seleccione una opción: </option>
                            <option value="1">Email</option>
                            <option value="2">Llamada</option>
                        </select>
                        @error('via') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Empresa</label>
                        <select class="form-control" value="{{old('empresa')}}" id="empresa" wire:model="empresa">
                            <option  value=""null"">Seleccione una opción: </option>
                            @foreach ($empresas as $empresa)
                                <option value="{{$empresa->id}}">{{$empresa->name}}</option>
                            @endforeach
                        </select>
                        @error('empresa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Producto</label>
                        <input type="text" class="form-control"  value="{{old('producto')}}" id="producto" wire:model="producto" placeholder="Ingrese el nombre del producto">
                        @error('producto') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Encargado</label>
                        <select class="form-control" value="{{old('encargado')}}" id="encargado" wire:model="encargado">
                            <option  value=""null"">Seleccione una opción: </option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{$usuario->id}}">{{$usuario->name}}</option>
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
    </div>
</div>
