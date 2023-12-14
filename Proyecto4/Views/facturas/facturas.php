<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de facturas</h5>

                <div class="table-responsive">
                    <button type="button" onclick="cargaclientes()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_factura">
                        Nueva factura
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">cliente</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">fecha</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">total</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">estado</h6>
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
<div class="modal fade" id="modal_factura" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_facturas">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Facturas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id_factura" id="id_factura">    
                    <div class="form-group">
                        <label for="id_cliente">cliente</label>
                      <select name="id_cliente" id="id_cliente" class="form-control">
                        <option value="0">Seleccione un cliente</option>
                      </select>
                    </div>              
                    <div class="form-group">
                        <label for="nombre">total</label>
                        <input type="text" required class="form-control" id="total" name="total" placeholder="Ingrese el total">
                    </div>
                    <div class="form-group">
                        <label for="estado">estado</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="pagado">pagado</option>
                            <option value="pendiente">pendiente</option>
                            <option value="anulada">anulada</option>
                            <option value="rechazada">rechazada</option>
                        </select>
                        
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

<script src="facturas.js"></script>