<?php
class UsuariosModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarios()
    {
        $sql = "SELECT id, nombre, apellido, correo, perfil FROM usuarios";
        return $this->selectAll($sql);
    }
    
    public function registrar($nombre, $apellido, $correo, $clave)
    {
        $sql = "INSERT INTO usuarios (nombre, apellido, correo, clave) VALUES (?,?,?,?)";
        $array = array($nombre, $apellido, $correo, $clave);
        return $this->insertar($sql, $array);
    }


}
 
?>