<?php 
include_once 'views/template/header.php';
?>
<!-- Start Content -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <h1 class="h1 text-custom"><b>Productos</b></h1>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <?php foreach($data['productos'] as $producto){ ?>
                <div class="col-md-4">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <div class="card-img-container">
                                <img class="card-img rounded-0 img-fluid"
                                    src="<?php echo BASE_URL . $producto['imagen']; ?>">
                            </div>
                            <div
                                class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn custom-nav text-white btnAddDeseo" href="#"
                                            prod="<?php echo $producto['id']; ?>"><i class="fas fa-heart"></i></a></li>
                                    <li><a class="btn custom-nav text-white mt-2"
                                            href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']?>"><i
                                                class="fas fa-eye"></i></a></li>
                                    <li><a class="btn custom-nav text-white mt-2 btnAddcarrito" href="#"
                                            prod="<?php echo $producto['id']; ?>"><i class="fas fa-cart-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']?>"
                                class="h3 text-decoration-none"><?php echo $producto['nombre']; ?></a>
                            <p class="text-center mb-0"><?php echo MONEDA . ' ' . $producto['precio']; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
            <div div="row">
                <ul class="pagination pagination-lg justify-content-end">
                    <?php 
                        $anterior = $data['pagina'] - 1;
                        $siguiente = $data['pagina'] + 1;
                        $url = BASE_URL . 'principal/categorias/' . $data['id_categoria'];
                        if ($data['pagina'] > 1){
                            echo '<li class="page-item">
                                <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="'. $url . '/' . $anterior.'">Anterior</a>
                                </li>';
                        }
                        if ($data['total'] >= $siguiente) {
                            echo '<li class="page-item">
                                <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-white" href="'. $url . '/' .$siguiente.'">Siguiente</a>
                                </li>';
                        }
                        ?>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- End Content -->

<?php 
include_once 'views/template/footer.php';
?>
</body>

</html>