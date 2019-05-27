<?php
  session_start();
  extract ($_REQUEST);
  if (!isset($_SESSION['user']))
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Mapa del Sitio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../fonts/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../Js/menu.js"> </script>
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
    </ul>
    <br>
    <div style="color:#FFFFFF" align="right"><span class="icon-user" style="color:#FFFFFF"></span>   <?php echo $_SESSION['user']?> </div>
  </div>
</nav>
<br>
<br>

<div class="container">
<h1>MAPA DEL SITIO</h1>
<br>
<h3>Pagina de Inicio</h3>
<br>
<li><a href="../Vista/Nosotros.php"><span class="icon-home"></span> Nosotros</a></li>
<br>
<h3>Secciones</h3>
<br>
<li><a href="../Vista/listaUsuarios.php"><span class="icon-users"></span> Usuarios</a></li>
<ul>
  <li><a href="../Vista/RegistroUsuario.php" target="_self"><span class="icon-add-user"></span> Registrar Usuarios</a></li>
  <li><a href="../Vista/listaUsuarios.php" target="_self"><span class="icon-trash"></span> Eliminar Usuarios</a></li>
  <li><a href="../Vista/listaUsuarios.php" target="_self"><span class="icon-forward"></span> Actualizar Usuarios</a></li>
</ul>
<li><a href="../Vista/listaInventario.php"><span class="icon-laptop"></span> Inventario</a></li>
<ul>
  <li><a href="../Vista/RegistrodeInventario.php" target="_self"><span class="icon-plus"></span> <span class="icon-laptop"></span> Registrar Activo</a></li>
  <li><a href="../Vista/listaInventario.php" target="_self"><span class="icon-trash"></span> Eliminar Activo</a></li>
  <li><a href="../Vista/listaInventario.php" target="_self"><span class="icon-forward"></span> Actualizar Activo</a></li>
</ul>
<li><a href="../Vista/listaProveedor.php"><span class="icon-man"></span> Proveedor</a></li>
<ul>
  <li><a href="../Vista/Registroproveedor.php" target="_self"><span class="icon-plus"> </span><span class="icon-man"></span> Registrar Proveedor</a></li>
  <li><a href="../Vista/listaProveedor.php" target="_self"><span class="icon-trash"></span> Eliminar Proveedor</a></li>
  <li><a href="../Vista/listaProveedor.php" target="_self"><span class="icon-forward"></span> Actualizar Proveedor</a></li>
</ul>
<li><a href="../Vista/reportes.php"><span class="icon-text-document"></span> Reporte</a></li>
<ul>
  <li><a href="../Vista/reportes.php" target="_self"><span class="icon-download"></span> Descargar Masivo de Activos</a></li>
  <li><a href="../Vista/reportes.php" target="_self"><span class="icon-download"></span> Descargar Reporte por Busqueda</a></li>
</ul>
<li><a href="../Vista/listaPerfiles.php"><span class="icon-login"></span> Perfiles</a></li>
<ul>
  <li><a href="../Vista/RegistroPerfiles.php" target="_self"><span class="icon-plus"></span> <span class="icon-login"></span> Registrar Perfiles</a></li>
  <li><a href="../Vista/listaPerfiles.php" target="_self"><span class="icon-trash"></span> Eliminar Perfil</a></li>
  <li><a href="../Vista/listaPerfiles.php" target="_self"><span class="icon-forward"></span> Actualizar Perfil</a></li>
</ul>
<li><a href="#"><span class="icon-mouse"></span> Menu<span></span></a>
<ul>
  <li><a href="../Vista/Mapa_del_Sitio.php"><span class="icon-flow-cascade"></span> Mapa del Sitio</a></li>
  <li><a href="salir.php" onmouseover="mopen('m1')" onmouseout="mclosetime()"><span class="icon-log-out"></span> Cerrar Sesion</a></li>
</ul>
<br>
<br>
</div>

</body>
</html>