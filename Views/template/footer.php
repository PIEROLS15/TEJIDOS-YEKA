<!-- Start Modal Carrito-->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header custom-nav text-white">
                <h5 class="modal-title"><i class="fas fa-cart-arrow-down"></i> Mi Carrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover text-center align-middle"
                        id="tableListaCarrito">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>SubTotal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-around mb-3">
                <h3 id="totalGeneral"></h3>
                <?php if (!empty($_SESSION['correoCliente'])) { ?>
                <a class="btn custom-nav" href="<?php echo BASE_URL . 'Clientes'; ?>">Procesar pago</a>
                <?php }else{?>
                <a class="btn custom-nav" href="#" onclick="abrirModalLogin();">Login</a>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
<!-- End Modal Carrito -->

<!-- Start Modal login-->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header custom-nav text-white">
                <h5 class="modal-title" id="titleLogin"> Inicia Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <form method="get" action="">
                    <div class="text-center">
                        <img src="<?php echo BASE_URL . 'assets/img/apple-icon.png'; ?>"
                            class="img-thumbnail rounded-circle" alt="" width="100">
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="frmLogin">
                            <div class="form-group mb-3">
                                <label for="correoLogin" class="text-custom"><i class="fas fa-envelope"></i> Correo</label>
                                <input type="text" name="correoLogin" id="correoLogin" class="form-control"
                                    placeholder="Correo Electrónico">
                            </div>
                            <div class="form-group mb-3">
                                <label for="claveLogin" class="text-custom"><i class="fas fa-key"></i> Contraseña</label>
                                <input type="text" name="claveLogin" id="claveLogin" class="form-control"
                                    placeholder="Contraseña">
                            </div>
                            <a href="#" id="btnRegister" class="text-custom">Todavia no tienes una cuenta?</a>
                            <div class="float-end">
                                <button type="button" class="btn custom-nav btn-lg text-white" id="login">Login</button>
                            </div>
                        </div>
                        <!-- formulario de registro -->
                        <div class="col-md-12 d-none" id="frmRegister">
                            <div class="form-group mb-3">
                                <label for="nombreRegistro" class="text-custom"><i class="fas fa-list"></i> Nombres</label>
                                <input type="text" name="nombreRegistro" id="nombreRegistro" class="form-control"
                                    placeholder="Nombres Completo">
                            </div>
                            <div class="form-group mb-3">
                                <label for="correoRegistro" class="text-custom"><i class="fas fa-envelope"></i> Correo</label>
                                <input type="text" name="correoRegistro" id="correoRegistro" class="form-control"
                                    placeholder="Correo Electrónico">
                            </div>
                            <div class="form-group mb-3">
                                <label for="claveRegistro" class="text-custom"><i class="fas fa-key"></i> Contraseña</label>
                                <input type="text" name="claveRegistro" id="claveRegistro" class="form-control"
                                    placeholder="Contraseña">
                            </div>
                            <a href="#" id="btnLogin" class="text-custom">Ya tienes una cuenta</a>
                            <div class="float-end">
                                <button type="button" class="btn custom-nav  btn-lg"
                                    id="registrarse">Registrarse</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal login -->





<!-- Start Footer -->
<footer class="custom-nav" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 pt-5">
                <a class="navbar-brand text-white border-bottom logo h1 align-self-center" href="<?php echo BASE_URL;?>">
                    <?php echo TITLE; ?>
                </a>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        123 Consectetur at ligula 10660
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Luxury</a></li>
                    <li><a class="text-decoration-none" href="#">Sport Wear</a></li>
                    <li><a class="text-decoration-none" href="#">Men's Shoes</a></li>
                    <li><a class="text-decoration-none" href="#">Women's Shoes</a></li>
                    <li><a class="text-decoration-none" href="#">Popular Dress</a></li>
                    <li><a class="text-decoration-none" href="#">Gym Accessories</a></li>
                    <li><a class="text-decoration-none" href="#">Sport Shoes</a></li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Home</a></li>
                    <li><a class="text-decoration-none" href="#">About Us</a></li>
                    <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                    <li><a class="text-decoration-none" href="#">FAQs</a></li>
                    <li><a class="text-decoration-none" href="#">Contact</a></li>
                </ul>
            </div>

        </div>

        <div class="row text-light mb-4">
            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
            <div class="col-auto me-auto">
                <ul class="list-inline text-left footer-icons">
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i
                                class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i
                                class="fab fa-instagram fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                class="fab fa-twitter fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i
                                class="fab fa-linkedin fa-lg fa-fw"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <label class="sr-only" for="subscribeEmail">Email address</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control bg-dark border-light" id="subscribeEmail"
                        placeholder="Email address">
                    <div class="input-group-text btn-success text-light">Subscribe</div>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<!-- Start Script -->
<script src="<?php echo BASE_URL;?>assets/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo BASE_URL;?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo BASE_URL;?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo BASE_URL;?>assets/js/templatemo.js"></script>
<script src="<?php echo BASE_URL;?>assets/js/custom.js"></script>
<script src="<?php echo BASE_URL;?>assets/js/sweetalert2.all.min.js"></script>
<script>
const base_url = '<?php echo BASE_URL;?>';
</script>
<script src="<?php echo BASE_URL;?>assets/js/carrito.js"></script>
<script src="<?php echo BASE_URL;?>assets/js/login.js"></script>
<script src="<?php echo BASE_URL;?>assets/js/es-ES.js"></script>
<!-- End Script -->