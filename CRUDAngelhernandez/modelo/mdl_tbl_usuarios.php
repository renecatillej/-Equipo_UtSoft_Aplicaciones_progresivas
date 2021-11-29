<?php
include 'mdl_conexion.php';

class tablas{
    private $lista;
    private $db;


    public function __construct()
    {
        $this->db = conexion::connect_db();
        $this->arraydb = array();
    }

    public function ver_tabla_usuarios(){
        $resultado = $this->db->query("SELECT * FROM usuarios");
        while ($filas = $resultado->fetch_assoc()) {
            $this->lista[] = $filas;
        }
        return $this->lista;
    }

    public function add_usuario($nombre,$correo,$contrasena,$tipo_usuario){
        $resultado = $this->db->query("INSERT INTO usuarios 
        (
        usuario_nombre,
        usuario_correo,
        usuario_contrasena,
        usuario_nivel
        )
        VALUES
        (
        '$nombre',
        '$correo',
        '$contrasena',
        '$tipo_usuario'
        )
        ");
        if(!$resultado){
            return false;
        }else{
            return true;
        }
    }

    public function eliminar_usuario($id_user){
        $resultado = $this->db->query("DELETE FROM usuarios WHERE id_usuario='$id_user'");
        if(!$resultado){
            return false;
        }else{
            return true;
        }
    }

    public function busqueda_usuario($id_user){
        $resultado = $this->db->query("SELECT * FROM usuarios WHERE id_usuario = '$id_user'");
        while ($filas = $resultado->fetch_assoc()) {
            $this->lista[] = $filas;
        }
        return $this->lista;
    }

    public function modificar_informacion_usuario($id_usuario,$nombre,$correo,$contrasena){
        $resultado = $this->db->query("UPDATE usuarios 
        SET 
        usuario_nombre='$nombre',
        usuario_correo='$correo',
        usuario_contrasena='$contrasena'
        WHERE
        id_usuario = '$id_usuario'");
         if(!$resultado){
            return false;
        }else{
            return true;
        }

    }
}
?>