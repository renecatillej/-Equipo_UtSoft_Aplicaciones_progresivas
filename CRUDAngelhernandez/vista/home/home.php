<?php
include("../menu/top.php");
?>

<div class="container text-center mt-5">
    <h1> <strong>Tabla de usuarios</strong> </h1>    
<div class="row">
        <div class="col-6">
            <div style="background-color: #fff;" id="tabla_usuarios"></div>
        </div>
        <div class="col-6">
            <button class="btn btn-info" onclick="ver_tabla()">Ver Tabla</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_users">Agregar usuario</button>
            <button class="btn btn-warning" onclick="tbl_modificar_usuario()">Modificar usuario</button>
            <button class="btn btn-danger" onclick="tbl_eliminar_usuario()">Eliminar usuario</button>
        </div>
    </div>
</div>

<div id="mdl_mod_usuario"></div>

<!-- The Modal -->
<div class="modal fade" id="add_users">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Agregar Usuario</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="form-group">
    <label for="nombre_usuario">Nombre del usuario:</label>
    <input type="text" class="form-control" placeholder="Ingrese usuario nuevo" id="nombre_usuario">
  </div>
  <div class="form-group">
    <label for="correo_usuario">Correo del usuario:</label>
    <input type="email" class="form-control" placeholder="Agregar correo" id="correo_usuario">
  </div>
  <div class="form-group">
    <label for="contrasena_usuario">Contraseña del usuario:</label>
    <input type="text" class="form-control" placeholder="Escribe una contraseña" id="contrasena_usuario">
  </div>
  <div class="form-group">
    <label for="tipo_usuario">Tipo de usuario:</label>
    <select name="" id="tipo_usuario" class="form-select">
      <option value="0">Seleccione una opción</option>
      <option value="1">Administrador</option>
      <option value="2">Usuario</option>
    </select>
  </div>
  
  
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button class="btn btn-primary" onclick="agregar_usuario()">Registrar usuario</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>






<script src="configuraciones/js/tabla_usuarios/tbl_usuarios.js"></script>
<?php
include("../menu/bot.php");
?>
