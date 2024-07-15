<?php headerAdmin($data); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $data['title'] ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><?php echo $data['title'] ?></li>
    </ol>
    <button class="btn btn-primary mb-2" type="button" id="nuevo_registro"><i class="fas fa-plus-circle"></i> Registrar</button>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover text-center align-middle" id="tblCategorias">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
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

<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="titleModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="frmRegistro">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="imagen_actual" name="imagen_actual">
                    <div class="form-group mb-2">
                        <label for="categoria">Nombre</label>
                        <input id="categoria" class="form-control" type="text" name="categoria" placeholder="Categorias">
                    </div>
                    <div class="form-group">
                      <label for="imagen">Imagen (opcional)</label>
                      <input type="file" class="form-control-file" name="imagen" id="imagen" placeholder="" aria-describedby="fileHelpId">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnAccion">Registrar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php footerAdmin($data); ?>

<script src="<?php echo BASE_URL; ?>assets/js/modulos/categorias.js"></script>

</body>

</html>