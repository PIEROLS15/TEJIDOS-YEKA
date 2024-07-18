<?php 
include_once 'views/template/header.php';
?>
<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <div class="card-img-container">
                        <img class="card-img img-fluid" src="<?php echo BASE_URL . $data['producto']['imagen'];?>"
                            alt="Card image cap" id="product-detail">
                    </div>
                </div>

                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item"
                        data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="<?php echo BASE_URL;?>assets/img/product_single_01.jpg"
                                                alt="Product Image 1">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="<?php echo BASE_URL;?>assets/img/product_single_02.jpg"
                                                alt="Product Image 2">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="<?php echo BASE_URL;?>assets/img/product_single_03.jpg"
                                                alt="Product Image 3">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="<?php echo BASE_URL;?>assets/img/product_single_04.jpg"
                                                alt="Product Image 4">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="<?php echo BASE_URL;?>assets/img/product_single_05.jpg"
                                                alt="Product Image 5">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="<?php echo BASE_URL;?>assets/img/product_single_06.jpg"
                                                alt="Product Image 6">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.Second slide-->

                            <!--Third slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="<?php echo BASE_URL;?>assets/img/product_single_07.jpg"
                                                alt="Product Image 7">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="<?php echo BASE_URL;?>assets/img/product_single_08.jpg"
                                                alt="Product Image 8">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="<?php echo BASE_URL;?>assets/img/product_single_09.jpg"
                                                alt="Product Image 9">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.Third slide-->
                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="h2"><?php echo $data['producto']['nombre']; ?></h1>
                        <p class="h3 text-custom"><b><?php echo MONEDA . ' '. $data['producto']['precio']; ?></b></p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Categoria</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong><?php echo $data['producto']['categoria'];?></strong></p>
                            </li>
                        </ul>

                        <h6>Descripción:</h6>
                        <p><?php echo $data['producto']['descripcion']; ?></p>

                        <form action="" method="GET">
                            <input type="hidden" id="idProducto" value="<?php echo $data['producto']['id']; ?>">
                            <div class="col-auto">
                                <ul class="list-inline pb-3">
                                    <li class="list-inline-item text-right">
                                        Cantidad
                                        <input type="hidden" id="product-quanity" value="1">
                                    </li>
                                    <li class="list-inline-item"><span class="btn custom-nav" id="btn-minus">-</span>
                                    </li>
                                    <li class="list-inline-item"><span class="badge bg-secondary"
                                            id="var-value">1</span></li>
                                    <li class="list-inline-item"><span class="btn custom-nav" id="btn-plus">+</span>
                                    </li>
                                    <button type="button" class="btn custom-nav mt-2 btn-lg rounded-pill"
                                        id="btnAddCart">Añadir al carrito</button>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Close Content -->

<!-- Start Article -->
<section class="py-5">
    <div class="container">
        <div class="row text-left p-2 pb-3">
            <h4>Productos Relacionados</h4>
        </div>

        <!--Start Carousel Wrapper-->
        <div id="carousel-related-product">
            <?php foreach($data['relacionados'] as $relacion) { ?>

            <div class="p-2 pb-3">
                <div class="product-wap card rounded-0">
                    <div class="card rounded-0">
                        <div class="card-img-container">
                            <img class="card-img rounded-0 img-fluid"
                                src="<?php echo BASE_URL .  $relacion['imagen'];?>">
                        </div>
                        <div
                            class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                            <ul class="list-unstyled">
                                <li><a class="btn custom-nav text-white btnAddDeseo" href="#"
                                        prod="<?php echo $relacion['id']; ?>"><i class="fas fa-heart"></i></a></li>
                                <li><a class="btn custom-nav text-white mt-2"
                                        href="<?php echo BASE_URL . 'principal/detail/' . $relacion['id']?>"><i
                                            class="far fa-eye"></i></a></li>
                                <li><a class="btn custom-nav text-white mt-2 btnAddcarrito" href="#"
                                        prod="<?php echo $relacion['id']; ?>"><i class="fas fa-cart-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="<?php echo BASE_URL . 'principal/detail/' . $relacion['id']?>"
                            class="h3 text-decoration-none"><?php echo $relacion['nombre'];?></a>
                        <p class="text-center mb-0"><?php echo MONEDA . ' '. $relacion['precio'];?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- End Article -->


<?php 
include_once 'views/template/footer.php';
?>
<script src="<?php echo BASE_URL . 'assets/js/modulos/detail.js'; ?>"></script>

<!-- Start Slider Script -->
<script src="<?php echo BASE_URL . 'assets/js/slick.min.js'; ?>"></script>
<script>
$('#carousel-related-product').slick({
    infinite: true,
    arrows: false,
    slidesToShow: 4,
    slidesToScroll: 3,
    dots: true,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 3
            }
        }
    ]
});
</script>
<!-- End Slider Script -->

</body>

</html>