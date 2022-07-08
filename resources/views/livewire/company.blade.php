<div>
    <!-- Modales -->
        <!-- Modal Agregar -->
        <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-m">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Empresa</h5>
                    </div>
                    <form wire:submit.prevent="store" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" wire:model="name" placeholder="Ingrese el nombre de empresa">
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
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
    <!-- Modal Agregar -->
<!-- Modales -->
</div>
