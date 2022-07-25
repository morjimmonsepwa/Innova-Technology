<div>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Editar Usuario</h5>
        </div>
            <form wire:submit.prevent="update">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" wire:model="name" aria-describedby="emailHelp" id="name">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="text" class="form-control" wire:model="email"  id="email">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="passsword" wire:model="passsword">
                        @error('passsword') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="confirmed" wire:model="confirmed">
                        @error('confirmed') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rol</label>
                        <select class="form-control" id="id_rol" wire:model="id_rol" >
                            <option value="null">Seleccione una opción: </option>
                            @foreach ($roles as  $role)
                                @if ($role->id == $id_rol)
                                    <option selected value="{{ $role->id}}">{{$role->name}}</option>
                                @else
                                    <option  value="{{ $role->id}}">{{$role->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('id_rol') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>
