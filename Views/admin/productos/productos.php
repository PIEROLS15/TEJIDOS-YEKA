<?php headerAdmin($data); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $data['title'] ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><?php echo $data['title'] ?></li>
    </ol>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#listaProducto"
                type="button" role="tab" aria-controls="listaProducto" aria-selected="true">Productos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#nuevoProducto" type="button"
                role="tab" aria-controls="nuevoProducto" aria-selected="false">Nuevo Producto</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="listaProducto" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover text-center align-middle"
                                    id="tblProductos" style="width:100%;">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Imagen</th>
                                            <th>Acciones</th>
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
        <div class="tab-pane fade" id="nuevoProducto" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body p-5">
                    <form id="frmRegistro">
                        <div class="row">
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" id="imagen_actual" name="imagen_actual">
                            <div class="col-md-5">
                                <div class="form-group mb-2">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" class="form-control" type="text" name="nombre"
                                        placeholder="Nombre del Producto">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-2">
                                    <label for="precio">Precio</label>
                                    <input id="precio" class="form-control" type="text" name="precio"
                                        placeholder="precio">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-2">
                                    <label for="cantidad">Cantidad</label>
                                    <input id="cantidad" class="form-control" type="number" name="cantidad"
                                        placeholder="cantidad">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="categorias">Categoria</label>
                                    <select class="form-control" name="categoria" id="categoria">
                                        <option value="">Seleccionar</option>
                                        <?php foreach ($data['categorias'] as $categoria){ ?>
                                        <option value="<?php echo $categoria['id']; ?>">
                                            <?php echo $categoria['categoria']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
                                        placeholder="descripcion"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <input type="file" class="form-control" name="imagen" id="imagen"
                                        placeholder="" aria-describedby="fileHelpId">
                                </div>
                            </div>


                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary" id="btnAccion">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php footerAdmin($data); ?>

<script src="<?php echo BASE_URL; ?>assets/js/modulos/productos.js"></script>

</body>

</html>