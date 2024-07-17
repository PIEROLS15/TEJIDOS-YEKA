<!DOCTYPE html>
<html lang="es">

<head>
    <title><?php echo $data['title'] . ' - ' . TITLE ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo BASE_URL . 'assets/img/apple-icon.png'; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL . 'assets/img/favicon.ico'; ?>">

    <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/templatemo.css'; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/custom.css'; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/styles_tienda.css'; ?>">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'assets/css/slick.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'assets/css/slick-theme.css'; ?>">

    <!-- Estilos de DataTables -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'assets/DataTables/datatables.min.css'; ?>">

    <!-- Para el funcionamiento de Paypal -->
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID ?>"></script>

</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light custom-nav shadow fixed-top">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-white logo h1 align-self-center" href="<?php echo BASE_URL;?>">
                <?php echo TITLE; ?>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo BASE_URL;?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo BASE_URL . 'principal/shop'?>">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo BASE_URL . 'principal/about'?>">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo BASE_URL . 'principal/contactos'?>">Contacto</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
                        data-bs-target="#templatemo_search">
                        <i class="fas fa-fw fa-search text-white mr-2"></i>
                    </a>

                    <a class="nav-icon position-relative text-decoration-none <?php echo ($data['perfil'] == 'no') ? '' : 'd-none'; ?>"
                        href="<?php echo BASE_URL . 'principal/deseo'?>">
                        <i class="fas fa-fw fa-heart text-white mr-1"></i>
                        <span
                            class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-custom"
                            id="btnCantidadDeseo">0</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none <?php echo ($data['perfil'] == 'no') ? '' : 'd-none'; ?>"
                        href="#" id="verCarrito">
                        <i class="fas fa-fw fa-cart-arrow-down text-white mr-1"></i>
                        <span
                            class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-custom"
                            id="btnCantidadCarrito">0</span>
                    </a>

                    <?php if (!empty($_SESSION['correoCliente'])) {?>
                    <a class="nav-icon position-relative text-decoration-none"
                        href="<?php echo BASE_URL . 'clientes'?>">
                        <img class="img-default" src="<?php echo BASE_URL . 'assets/img/clientes/logo.png' ?>"
                            alt="-LOGO-CLIENTE" width="50">
                    </a>
                    <?php }else{ ?>
                    <a class="nav-icon position-relative text-decoration-none" href="#" data-bs-toggle="modal"
                        data-bs-target="#modalLogin">
                        <i class="fas fa-user text-white"></i>
                    </a>
                    <?php } ?>
                </div>
            </div>

        </div>
    </nav>

    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Buscar ...">
                    <button type="submit" class="input-group-text custom-nav text-light ">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
                <div class="row" id="resultBusqueda">

                </div>
            </div>

        </div>
    </div>