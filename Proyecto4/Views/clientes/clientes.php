<?php require_once('../html/head2.php') ?>

<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de clientes</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_clientes">
                        Nuevo cliente
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombres</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">direccion</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">telefono</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">correo</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_clientes">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_clientes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_clientes">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">clientes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id_cliente" id="id_cliente">


                  
                    <div class="form-group">
                        <label for="nombre">nombre</label>
                        <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="nombre">
                    </div>
                    <div class="form-group">
                        <label for="direccion">direccion</label>
                        <input type="text" required class="form-control" id="direccion" name="direccion" placeholder="direccion">
                    </div>
                    <div class="form-group">
                        <label for="telefono">telefono</label>
                        <input type="text" required onfocusout="telefono_repetido()" class="form-control" id="telefono" name="telefono" placeholder="telefono">
                        <div class="alert alert-danger d-none" role="alert" id="TelefonoRepetido">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="correo">correo</label>
                        <input type="text" required onfocusout="correo_repetido()" class="form-control" id="correo" name="correo" placeholder="correo">
                        <div class="alert alert-danger d-none" role="alert" id="CorreoRepetido">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="clientes.js"></script>
<script src="clientes.model.js"></script>