<?php
class Admin extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Acceso al admin';
        $this->views->getView('admin', "login", $data);
    }

    public function validar()
    {
        if(isset($_POST['email']) && ($_POST['clave']) ){
            if (empty($_POST['email']) || empty($_POST['clave'])){
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            }else{
                $data = $this->model->getUsuario($_POST['email']);
                if (empty($data)) {
                    $respuesta = array('msg' => 'El correo no existe', 'icono' => 'warning');
                }else{
                    if (password_verify($_POST['clave'], $data['clave'])) {
                        $_SESSION['email'] = $data['correo'];
                        $_SESSION['nombre_usuario'] = $data['nombre'];
                        $respuesta = array('msg' => 'Datos correctos', 'icono' => 'success');
                    }else{
                        $respuesta = array('msg' => 'Contraseña incorrecta', 'icono' => 'warning');
                    }
                }
            }
        }else{
            $respuesta = array('msg' => 'Error desconocido', 'icono' => 'error');
        }
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function home()
    {
        $data['title'] = 'Dashboard'. ' - ' . TITLE;
        $data['titulo'] = 'Dashboard';
        $data['pendientes'] = $this->model->getTotales(1);
        $data['procesos'] = $this->model->getTotales(2);
        $data['finalizados'] = $this->model->getTotales(3);
        $data['productos'] = $this->model->getProductos();
        $this->views->getView('admin/administracion', "index", $data);
    }

    public function productosMinimos()
    {
        $data = $this->model->productosMinimos();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function topProductos()
    {
        $data = $this->model->topProductos();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function salir()
    {
        session_destroy();
        header('Location:' . BASE_URL);
    }
}