<div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Asignar Usuarios</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <input class="form-control mb-4" id="tableSearch" type="text"
                    placeholder="Nombre Usuario">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Estatus</th>
                                <th>Opción</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <img  src="@if( $user->profile_photo_path == null ) {{  $user->profile_photo_url }} @else {{ asset('storage/'. $user->profile_photo_path) }}  @endif" alt="Avatar" class="avatar">
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->rol->name}}
                                    </td>
                                    <td class="text text-success">Sin Asignar</td>
                                    <td>
                                        <button wire:click="asigned_user({{$user->id}})" type="submit" class="btn btn-primary">
                                            Agregar
                                        </button>
                                    </td>
                                </tr>
                              @endforeach
                            @foreach ($details as $detail)
                                <tr>
                                    <td>
                                        <img  src="@if( $detail->user->profile_photo_path == null ) {{  $detail->user->profile_photo_url }} @else {{ asset('storage/'. $detail->user->profile_photo_path) }}  @endif" alt="Avatar" class="avatar">
                                        {{$detail->user->name}}
                                    </td>
                                    <td>
                                        @foreach ($roles as $rol)
                                            @if($detail->user->id_rol == $rol->id)
                                                {{$rol->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text text-danger">
                                        Asignado
                                    </td>
                                    <td>
                                        <button wire:click="delete_user({{$detail->id}})" type="submit" class="btn btn-danger">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>   
        </div>
    </div>
</div>
