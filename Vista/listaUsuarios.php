<?php

  session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión

require "../Modelo/conexionBasesDatos.php";
require "../Modelo/Usuario.php";
$objDatos=new Usuario();
$registro=$objDatos->consultarUsuarios();

if(!isset($_REQUEST['msj'])){
    $msj=0;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Usuarios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../fonts/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../Js/menu.js"> </script>
  <script>

    function Cambiar(codusuario)
    {
      window.location="localhost/andromeda_inventory/Vista/ModificarUsuario.php?parametro="+codusuario;
    }

    function EliminarUsuario(codigoeliminar)
    {
      window.location="localhost/andromeda_inventory/Controlador/validarEliminarUsuario.php?parametro="+codigoeliminar;
    }

  </script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../Vista/Nosotros.php"><span class="icon-home" style="color:#FFFFFF"></span> Andromeda Inventory</a>
      <img alt="Brand" src="../Imagenes/Logo Andromeda Inventory.jpeg">
    </div>
    <ul class="nav navbar-nav">
      <li><a href="../Vista/listaUsuarios.php"><span class="icon-users" style="color:#FFFFFF"></span> Usuarios</a></li>
      <li><a href="../Vista/listaInventario.php"><span class="icon-laptop" style="color:#FFFFFF"></span> Inventario</a></li>
      <li><a href="../Vista/listaProveedor.php"><span class="icon-man" style="color:#FFFFFF"></span> Proveedor</a></li>
      <li><a href="../Vista/reportes.php"><span class="icon-text-document" style="color:#FFFFFF"></span> Reporte</a></li>
      <?php if($_SESSION['rol']==1) { ?>
      <li><a href="../Vista/listaPerfiles.php"><span class="icon-login" style="color:#FFFFFF"></span> Perfiles</a></li>
    <?php } ?>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="icon-mouse" style="color:#FFFFFF"></span> Menu<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../Vista/Mapa_del_Sitio.php"><span class="icon-flow-cascade"></span> Mapa del Sitio</a></li>
          <li><a href="salir.php" onmouseover="mopen('m1')" onmouseout="mclosetime()"><span class="icon-log-out"></span> Cerrar Sesion</a></li>
        </ul>
      </li>
      <form class="navbar-form navbar-left" action="">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar Usuario" name="caja_busqueda" id="caja_busqueda">
        </div>
    </form>
    </ul>
    <br>
    <div style="color:#FFFFFF" align="right"><span class="icon-user" style="color:#FFFFFF"></span>   <?php echo $_SESSION['user']?> </div>
  </div>
</nav>

<div class="container">
  <h2>Usuarios Registrados</h2>
  <br>
  <?php if($_SESSION['rol']==1) { ?>
  <a href="../Vista/RegistroUsuario.php" target="_self"><button title="Registrar Usuarios" type="button" class="btn btn-primary"><span class="icon-add-user"></span></button></a><?php } ?>
  <br>
  <?php
  if ($msj==1)
  echo '<h3 style="color:green" align="center">Se ha Agregado el Usuario Correctamente</h3>';
  if ($msj==2)
  echo '<h3 style="color:red" align="center">Problemas al Agregar Usuario, Por favor revise los datos</h3>';
  if ($msj==3)
  echo '<h3 style="color:green" align="center">Se ha Modificado el Usuario Correctamente</h3>';
  if ($msj==4)
  echo '<h3 style="color:red" align="center">Problemas al Modificar Usuario, Por favor revise</h3>';
  if ($msj==5)
  echo '<h3 style="color:green" align="center">Se ha Eliminado el Usuario Correctamente</h3>';
  if ($msj==6)
  echo '<h3 style="color:red" align="center">Problemas al Eliminar Usuario, Por favor revise</h3>';
  ?>
  <br>
  
  <div id="datos">

  </div>


</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../Js/Usuario.js"></script>
</body>
</html>