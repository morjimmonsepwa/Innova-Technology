<div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="text-center">
                        <img class="avatar" src="@if( $user->profile_photo_path == null ) {{  $user->profile_photo_url }} @else {{ asset('storage/'. $user->profile_photo_path) }}  @endif" />
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->rol->name ?? 'Sin Rol'}}
                    </td>
                    <td >
                        @if ( isset(json_decode(Auth::user()->rol->permisos,true)['usuarios.update']))
                            <a for="#editar-{{$user->id}}" type="button" class="btn btn-circle btn-primary" data-bs-toggle="modal" data-bs-target="#editar-{{$user->id}}">
                                <i class="fas fa-highlighter"></i>
                            </a>
                        @endif
                        @if ( isset(json_decode(Auth::user()->rol->permisos,true)['usuarios.destroy']))
                            <a for="#eliminar-{{$user->id}}" type="button" class="btn btn-circle btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar-{{$user->id}}">
                                <i class="fas fa-duotone fa-trash"></i>
                            </a>
                        @endif
                    </td>
                </tr>

                <!-- Modales -->
                    <!-- Modal Editar -->
                        <div wire:ignore.self class="modal fade" id="editar-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Editar Usuario</h5>
                                    </div>
                                    <form wire:submit.prevent="actualizar({{$user->id}})" method="POST">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Nombre</label>
                                                <input type="text" class="form-control" value="{{$user->name}}" aria-describedby="emailHelp" wire:change="name($event.target.value)" id="name" name="name">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Correo</label>
                                                <input type="text" class="form-control" value="{{$user->email}}"  wire:change="email($event.target.value)" id="email" name="email" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                                <input type="password" class="form-control" wire:model="passsword" id="passsword" name="passsword">
                                                @error('passsword') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Confirmar Contraseña</label>
                                                <input type="password" class="form-control" wire:model="confirmed" id="confirmed" name="confirmed">
                                                @error('confirmed') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="mb-3" wire:ignore>
                                                <label class="form-label">Rol</label>
                                                <select class="form-control" wire:change="rol($event.target.value)" id="rol" name="rol" required>
                                                    <option value=""null"">Seleccione una opción: </option>
                                                    @foreach ($roles as  $role)
                                                        @if ($role->id == $user->id_rol)
                                                            <option selected value="{{ $role->id}}">{{$role->name}}</option>
                                                        @else
                                                            <option  value="{{ $role->id}}">{{$role->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
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
                    <!-- Modal Editar -->           
                    <!-- Modal Eliminar -->
                        <div class="modal fade" tabindex="-2" id="eliminar-{{$user->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">¡Atención!</h5>
                                </div>
                                <div class="modal-body">
                                    <p>¿Estas Seguro de Eliminar?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <form action="{{ route('destroy.users',$user->id) }}" method="post">
                                        @csrf
                                        {{ method_field('PUT')}}
                                        <button  type="submit" class="btn btn-primary">
                                           Eliminar
                                        </button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    <!-- Modal Editar -->
                <!-- Modales -->
                @endforeach
            </tbody>
        </table>
    </div>
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
                                        <option value=""null"">Seleccione una opción:</option>
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
@if ( $alert )
<script>
    Swal.fire({
        icon: 'success',
        title: 'Accion correcta',
        confirmButtonText: 'ok',
        confirmButtonColor: '#3e8533'
    })
</script>
@endif


</div>
