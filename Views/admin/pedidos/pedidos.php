<?php headerAdmin($data); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $data['title'] ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><?php echo $data['title'] ?></li>
    </ol>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#listaPedidos"
                type="button" role="tab" aria-controls="listaPedidos" aria-selected="true">Pedidos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="proceso-tab" data-bs-toggle="tab" data-bs-target="#listaProceso" type="button"
                role="tab" aria-controls="listaProceso" aria-selected="true">En proceso</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pedidosFinalizados"
                type="button" role="tab" aria-controls="pedidosFinalizados" aria-selected="false">Finalizados</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="listaPedidos" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover text-center align-middle"
                                    id="tblPendientes" style="width:100%;">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Id Transacción</th>
                                            <th>Monto</th>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Correo</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Dirección</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Aquí van los datos de la tabla -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="listaProceso" role="tabpanel" aria-labelledby="proceso-tab">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover text-center align-middle"
                                    id="tblProceso" style="width:100%;">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Id Transacción</th>
                                            <th>Monto</th>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Correo</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Dirección</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Aquí van los datos de la tabla -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pedidosFinalizados" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover text-center align-middle"
                            id="tblFinalizado" style="width:100%;">
                            <thead class="table-dark">
                                <tr>
                                    <th>Id Transacción</th>
                                    <th>Monto</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Correo</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Dirección</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí van los datos de la tabla -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPedidos" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Productos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-borderer table-striped table-hover text-center align-middle"
                        id="tablePedidos" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>SubTotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script>
$('#exampleModal').on('show.bs.modal', event => {
    var button = $(event.relatedTarget);
    var modal = $(this);
    // Use above variables to manipulate the DOM

});
</script>

<?php footerAdmin($data); ?>

<script src="<?php echo BASE_URL; ?>assets/js/modulos/pedidos.js"></script>

</body>

</html>