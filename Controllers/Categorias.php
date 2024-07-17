<?php
class Categorias extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (empty($_SESSION['nombre_usuario'])) {
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
    }
    public function index()
    {
        $data['title'] = 'Categorias';
        $this->views->getView('admin/categorias', "categorias", $data);
    }

    public function listar()
    {
        $data = $this->model->getCategorias(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['imagen'] = '<img class="img-thumbnail" src="'. BASE_URL . $data[$i]['imagen'] .'"  alt="'. $data[$i]['categoria'] .'" width="50";>';
            $data[$i]['accion'] = '<div class="d-flex">
            <button class="btn btn-primary" type="button" onclick="editCat(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="eliminarCat(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
        </div>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
{
    if (isset($_POST['categoria'])) {
        $categoria = $_POST['categoria'];
        $imagen = $_FILES['imagen'];
        $tmp_name = $imagen['tmp_name'];
        $id = $_POST['id'];
        $ruta = 'assets/img/categorias/';
        $nombreImg = date('YmdHis');
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (empty($_POST['categoria'])) {
            $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
        } else {
            if (!empty($imagen['name'])) {
                if (in_array($imagen['type'], $allowedTypes)) {
                    $destino = $ruta . $nombreImg . '.jpg';
                } else {
                    $respuesta = array('msg' => 'Formato de imagen no permitido', 'icono' => 'error');
                    echo json_encode($respuesta);
                    die();
                }
            } else if (!empty($_POST['imagen_actual']) && empty($imagen['name'])) {
                $destino = $_POST['imagen_actual'];
            } else {
                $destino = $ruta . 'default.png';
            }

            if (empty($id)) {
                $result = $this->model->verificarCategoria($categoria);
                if (empty($result)) {
                    $data = $this->model->registrar($categoria, $destino);
                    if ($data > 0) {
                        if (!empty($imagen['name'])) {
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'Categoria registrada', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al registrar', 'icono' => 'error');
                    }
                } else {
                    $respuesta = array('msg' => 'Correo ya existe', 'icono' => 'warning');
                }
            } else {
                $data = $this->model->modificar($categoria, $destino, $id);
                if ($data == 1) {
                    if (!empty($imagen['name'])) {
                        move_uploaded_file($tmp_name, $destino);
                    }
                    $respuesta = array('msg' => 'Categoria modificada', 'icono' => 'success');
                } else {
                    $respuesta = array('msg' => 'Error al modificar', 'icono' => 'error');
                }
            }
        }
        echo json_encode($respuesta);
    }
    die();
}



    public function delete($idCat)
    {
        if (is_numeric($idCat)) {
            $data = $this->model->eliminar($idCat);
            if ($data == 1) {
                $respuesta = array('msg' => 'Categoria Eliminada', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'Error al eliminar', 'icono' => 'error');
            }
        } else {
            $respuesta = array('msg' => 'Error desconocido', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }

    public function edit($idCat)
    {
        if (is_numeric($idCat)) {
            $data = $this->model->getCategoria($idCat);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        } 
        die();
    }
}