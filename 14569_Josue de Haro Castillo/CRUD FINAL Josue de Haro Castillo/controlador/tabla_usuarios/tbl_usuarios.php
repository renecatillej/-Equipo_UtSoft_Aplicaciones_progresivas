<?php
include("../../modelo/mdl_tbl_usuarios.php");
$obj = new tablas();

if(isset($_POST['ver_tabla_user'])){
    $resultado = $obj -> ver_tabla_usuarios();
    echo '
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
    <th>Nombre del usuario</th>
    <th>Correo del usuario</th>
    <th>Contraseña del usuario</th>
    <th>Tipo de usuario</th>
    </tr>
    </thead>
    <tbody>
    ';

    foreach($resultado as $r){
        echo '
        <tr>
                <td>'.$r['usuario_nombre'].'</td>
                <td>'.$r['usuario_correo'].'</td>
                <td>'.$r['usuario_contrasena'].'</td>
                <td>'.$r['usuario_nivel'].'</td>
            </tr>
        ';
    }

    echo '
    </tbody>

</table>
    ';
    echo "
    <script>
    
</script>";
} 

if(isset($_POST['tipo_usuario'])){
    $nombre = $_POST['nombre_usuario'];
    $correo = $_POST['correo_usuario'];
    $contrasena = $_POST['contrasena_usuario'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $resultado = $obj -> add_usuario($nombre,$correo,$contrasena,$tipo_usuario);
    if($resultado == true){
        exit(json_encode([
            "status" => "1"
        ]));
    }else{
        exit(json_encode([
            "status" => "2"
        ]));
    }
}


if(isset($_POST['tbl_eliminar_usuario'])){
    $resultado = $obj -> ver_tabla_usuarios();
    echo '
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
    <th>Nombre del usuario</th>
    <th>Correo del usuario</th>
    <th>Contraseña del usuario</th>
    <th>Tipo de usuario</th>
    <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
    ';

    foreach($resultado as $r){
        echo '
        <tr>
                <td>'.$r['usuario_nombre'].'</td>
                <td>'.$r['usuario_correo'].'</td>
                <td>'.$r['usuario_contrasena'].'</td>
                <td>'.$r['usuario_nivel'].'</td>
                <td><button class="btn btn-danger" onclick="eliminar_usuario('.$r['id_usuario'].')">Eliminar Usuario</button></td>
            </tr>
        ';
}

echo '
</tbody>

</table>
';
}

if(isset($_POST['ver_tabla_mod_user'])){
    $resultado = $obj -> ver_tabla_usuarios();
    echo '
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
    <th>Nombre del usuario</th>
    <th>Correo del usuario</th>
    <th>Contraseña del usuario</th>
    <th>Tipo de usuario</th>
    <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
    ';

    foreach($resultado as $r){
        echo '
        <tr>
                <td>'.$r['usuario_nombre'].'</td>
                <td>'.$r['usuario_correo'].'</td>
                <td>'.$r['usuario_contrasena'].'</td>
                <td>'.$r['usuario_nivel'].'</td>
                <td><button class="btn btn-info" onclick="modificar_usuario('.$r['id_usuario'].')">Modificar Usuario</button></td>
            </tr>
        ';
}

echo '
</tbody>

</table>
';
}

if(isset($_POST['del_user'])){
    $id_user = $_POST['del_user'];
    $resultado = $obj -> eliminar_usuario($id_user);
    if($resultado == true){
        exit(json_encode([
            "status" => "1"
        ]));
    }else{
        exit(json_encode([
            "status" => "2"
        ]));
    }
}


if(isset($_POST['modal_mod_usuario'])){
    $id_user =  $_POST['modal_mod_usuario'];
    $resultado = $obj -> busqueda_usuario($id_user);
    foreach($resultado as $r){
        $nombre = $r['usuario_nombre'];
        $correo = $r['usuario_correo'];
        $contrasena = $r['usuario_contrasena'];
    }
    echo'
    <div class="modal fade" id="modal_mod_users">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modificar Usuario</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="form-group">
    <label for="nombre_usuario_mod">Nombre del usuario:</label>
    <input type="hidden" class="form-control" placeholder="Ingrese usuario nuevo" value="'.$id_user.'" id="id_usuario_mod">
    <input type="text" class="form-control" placeholder="Ingrese usuario nuevo" value="'.$nombre.'" id="nombre_usuario_mod">
  </div>
  <div class="form-group">
    <label for="correo_usuario_mod">Correo del usuario:</label>
    <input type="email" class="form-control" placeholder="Agregar correo" value="'.$correo.'" id="correo_usuario_mod">
  </div>
  <div class="form-group">
    <label for="contrasena_usuario_mod">Contraseña del usuario:</label>
    <input type="text" class="form-control" placeholder="Escribe una contraseña" value="'.$contrasena.'" id="contrasena_usuario_mod">
  </div>
  
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-primary" onclick="modificar_info_usuario()">Registrar usuario</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>
    ';

}


if(isset($_POST['nombre_usuario_mod'])){
    $nombre = $_POST['nombre_usuario_mod'];
    $correo = $_POST['correo_usuario_mod'];
    $contrasena = $_POST['contrasena_usuario_mod'];
    $id_usuario = $_POST['id_usuario_mod'];
    $resultado = $obj -> modificar_informacion_usuario($id_usuario,$nombre,$correo,$contrasena);
    if($resultado == true){
        exit(json_encode([
            "status" => "1"
        ]));
    }else{
        exit(json_encode([
            "status" => "2"
        ]));
    }
}
?>