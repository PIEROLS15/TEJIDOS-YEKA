<?php 
include_once 'views/template/header.php';
?>


<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo BASE_URL . 'assets/img/banner_img_01.jpg'; ?>" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-custom"><b>Zay</b> eCommerce</h1>
                            <h3 class="h2">Tiny and Perfect eCommerce Template</h3>
                            <p>
                                Zay Shop is an eCommerce HTML5 CSS template with latest version of Bootstrap 5 (beta 1).
                                This template is 100% free provided by <a rel="sponsored" class="text-custom"
                                    href="https://templatemo.com" target="_blank">TemplateMo</a> website.
                                Image credits go to <a rel="sponsored" class="text-custom"
                                    href="https://stories.freepik.com/" target="_blank">Freepik Stories</a>,
                                <a rel="sponsored" class="text-custom" href="https://unsplash.com/"
                                    target="_blank">Unsplash</a> and
                                <a rel="sponsored" class="text-custom" href="https://icons8.com/" target="_blank">Icons
                                    8</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo BASE_URL . 'assets/img/banner_img_02.jpg'; ?>" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-custom">Proident occaecat</h1>
                            <h3 class="h2">Aliquip ex ea commodo consequat</h3>
                            <p>
                                You are permitted to use this Zay CSS template for your commercial websites.
                                You are <strong>not permitted</strong> to re-distribute the template ZIP file in any
                                kind of template collection websites.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo BASE_URL . 'assets/img/banner_img_03.jpg'; ?>" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-custom">Repr in voluptate</h1>
                            <h3 class="h2">Ullamco laboris nisi ut </h3>
                            <p>
                                We bring you 100% free CSS templates for your websites.
                                If you wish to support TemplateMo, please make a small contribution via PayPal or tell
                                your friends about our website. Thank you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->


<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1 text-custom"><b>Categorias</b></h1>
        </div>
    </div>
    <div class="row">
        <?php foreach ($data['categorias']as $categoria) { ?>
            <div class="col-12 col-md-4 p-5 mt-3">
    <div class="text-center">
        <a href="<?php echo BASE_URL . 'principal/categorias/' . $categoria['id']?>">
            <img src="<?php echo $categoria['imagen']; ?>" class="rounded-circle img-fluid border categoria-imagen"
                alt="<?php echo $categoria['categoria']; ?>">
        </a>
    </div>
    <h5 class="text-center mt-3 mb-3"><?php echo $categoria['categoria'];?></h5>
    <p class="text-center">
        <a class="btn custom-nav"
            href="<?php echo BASE_URL . 'principal/categorias/' . $categoria['id']?>">
            Comprar
        </a>
    </p>
</div>


        <?php } ?>
    </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1 text-custom"><b>Nuestros Productos</b></h1>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data['nuevoProductos'] as $producto) { ?>
            <div class="col-12 col-md-3 mb-4">
                <div class="card h-100">
                    <a href="<?php echo BASE_URL . 'principal/detail/'. $producto['id']; ?>">
                        <div class="card-img-container">
                            <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                        </div>
                    </a>

                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                            <li class="text-custom"><b><?php echo MONEDA . ' ' . $producto['precio']; ?></b></li>
                        </ul>
                        <a href="<?php echo BASE_URL . 'principal/detail/'. $producto['id']; ?>"
                            class="h2 text-decoration-none text-dark"><?php echo $producto['nombre']; ?></a>
                        <p class="card-text">
                            <?php echo $producto['descripcion']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
</section>
<!-- End Featured Product -->
<?php 
include_once 'views/template/footer.php';
?>
</body>

</html>