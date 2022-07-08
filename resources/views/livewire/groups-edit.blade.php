<div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Grupo</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    @foreach ($group as $grupo)
                    <form wire:submit.prevent="edit" method="POST">
                        <div class="mb-3">
                            <label for="name" name="name" id="name"  class="form-label">Nombre del Equipo</label>
                            <input type="text" wire:model="name" id="name" class="form-control" aria-describedby="nombre" placeholder="{{$grupo->name}}">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>  
                    @endforeach
                </div>
            </div>   
        </div>
    </div>
</div>
