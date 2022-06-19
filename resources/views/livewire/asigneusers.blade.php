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
                                <th>Firstname</th>
                                <th>Rol</th>
                                <th>Estatus</th>
                                <th>Opción</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <tr>
                                <td>
                                    <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="avatar">
                                    John
                                </td>
                                <td>Administrador</td>
                                <td class="text text-success">Sin Asignar</td>
                                <td>
                                    <button type="submit" class="btn btn-primary">
                                        Agregar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="avatar">
                                    Mary
                                </td>
                                <td>
                                    Usuario
                                </td>
                                <td class="text text-danger">Asignado</td>
                                <td>
                                    <button type="submit" class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>   
        </div>
    </div>
</div>
