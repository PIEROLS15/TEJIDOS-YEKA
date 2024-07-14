<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $data['title'] ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/style.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/styles.css'; ?>">
    <script src="<?php echo BASE_URL . 'assets/js/all.js'; ?>"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form class="user" id="formulario">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control form-control-user" id="email"
                                                aria-describedby="emailHelp" placeholder="Correo Electrónico"
                                                name="email" value="piero@gmail.com">
                                            <label for="inputEmail">Correo Electronico</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control form-control-user" id="clave"
                                                placeholder="Contraseña" name="clave" value="admin">
                                            <label for="inputPassword">Contraseña</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="forgot-password.html">¿Has olvidado tu
                                                contraseña?</a>
                                            <button type="submit" href="index.html"
                                                class="btn btn-primary btn-user btn-block">
                                                Iniciar Sesión
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="<?php echo BASE_URL . 'assets/js/bootstrap.bundle.min.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'assets/js/scripts.js'; ?>"></script>
    <!-- Scripts para login-->
    <script src="<?php echo BASE_URL;?>assets/js/modulos/login.js"></script>
    <script src="<?php echo BASE_URL;?>assets/js/sweetalert2.all.min.js"></script>
    <script>
    const base_url = '<?php echo BASE_URL; ?>';
    </script>
</body>

</html>