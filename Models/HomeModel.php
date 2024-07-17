<?php
class HomeModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategorias()
    {
        $sql = "SELECT * FROM categorias";
        return $this->selectAll($sql);
    }

    public function getNuevoProductos()
    {
        $sql = "SELECT * FROM productos WHERE estado = 1 ORDER BY id DESC LIMIT 4";
        return $this->selectAll($sql);
    }

}
 
?>