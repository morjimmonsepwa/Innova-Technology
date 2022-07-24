<div>
        <!-- Modales -->
        <!-- Modal Agregar -->
            <div  wire:ignore.self class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Usuario</h5>
                        </div>
                        <form  wire:submit.prevent="store" method="POST">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp"  id="name" wire:model="name">
                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Correo</label>
                                    <input type="text" class="form-control"  id="email" wire:model="email">
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
                                    <label for="exampleInputPassword1" class="form-label">Rol</label>
                                    <select class="form-control" id="rol" wire:model="rol" >
                                        <option value="null">Seleccione una opción:</option>
                                        @foreach ($roles as  $role)
                                            <option value="{{ $role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('rol') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
    <!-- Modal Agregar -->
<!-- Modales -->
</div>
