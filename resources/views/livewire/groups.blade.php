<div>
     <!-- Modal Agregar -->
     <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Grupo</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form wire:submit.prevent="store" method="POST">
                            <div class="mb-3">
                                <label for="name"  id="name"  class="form-label">Nombre del Equipo</label>
                                <input type="text" wire:model="name" name="name" id="name" class="form-control" aria-describedby="nombre">
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
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
    </div>
<!-- Modal Agregar -->
</div>
