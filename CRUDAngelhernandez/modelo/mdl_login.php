<?php
include 'mdl_conexion.php';

class class_login{

    private $lista;
    private $db;


public function __construct()
{
    $this->db = conexion::connect_db();
    $this->arraydb = array();
}

public function login($query){
    $resultado = $this->db->query("$query");
    while ($filas = $resultado->fetch_assoc()) {
        $this->lista[] = $filas;
    }
    return $this->lista;
}


}
