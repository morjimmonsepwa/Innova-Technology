<div>
    <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Rol</h5>
                </div>
                <form wire:submit.prevent="store" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" name="name" id="name"  class="form-label">Nombre</label>
                            <input type="text" wire:model="name" id="name" class="form-control" aria-describedby="nombre">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <label for="permisos" class="form-label">Permisos:</label>
                        <div class="mb-3">
                        <div class="container overflow-hidden">
                            <div class="container">
                                <div class="row row-cols-3">
                                    @foreach ($permisos as $key=>$value ) 
                                        <div class="col">
                                            <input class="form-check-input chkboxname" wire:model="permiso.{{$key}}"  value="{{$key}}" id="{{$key}}" type="checkbox" role="switch">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">
                                                {{  
                                                    str_replace('create','crear',
                                                    str_replace('create','crear',
                                                    str_replace('edit','editar',
                                                    str_replace('index','inicio',
                                                    str_replace('role','roles',
                                                    str_replace('destroy','eliminar',
                                                    str_replace('.',' ',
                                                    $key )))))))
                                                }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
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
