<?php
session_start();
if($_SESSION['tipo_usuario'] == 1){
  echo '
  <li class="nav-item">
  <a class="nav-link" href="home"> PAGINA DE INICIO
  <span class="visually-hidden">(current)</span>
  </li>
  <li class="nav-item">
          <a class="nav-link" href="#">Administrador</a>
        </li>
  ';
}
if($_SESSION['tipo_usuario'] == 2){
  echo '
  <li class="nav-item">
  <a class="nav-link" href="home"> PAGINA DE INICIO
  <span class="visually-hidden">(current)</span>
  </li>
  <li class="nav-item">
          <a class="nav-link" href="#">Usuario</a>
        </li>
  ';
}
?>