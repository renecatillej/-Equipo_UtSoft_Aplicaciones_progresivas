<?php
session_start();
include("../../modelo/mdl_login.php");
$obj = new class_login();//VARIABLE GLOBAL

if(isset($_POST['usuario'])){  
$usuario = $_POST['usuario'];//victor
$contrasena = $_POST['contrasena'];//12345
$query = "SELECT * FROM usuarios WHERE usuario_correo='$usuario' AND usuario_contrasena ='$contrasena'";
$resultado = $obj -> login($query);
if(empty($resultado)){
    $mensaje = "USUARIO Y/O CONTRASEÑA INCORRECTOS";
    exit(json_encode([
        "status" => "2",
        "mensaje" => $mensaje
    ]));
}else{
    $mensaje = "USUARIO CORRECTO!!!";
    foreach($resultado as $r){
        $_SESSION['tipo_usuario'] = $r['usuario_nivel'];
    }
    $_SESSION['login'] = "ok";
    exit(json_encode([
        "status" => "1",
        "mensaje" => $mensaje 
    ]));
}
}
?>