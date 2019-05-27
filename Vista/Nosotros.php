<?php


require "../Modelo/conexionBasesDatos.php";

  session_start();
  extract ($_REQUEST);
  if (!isset($_SESSION['user']))
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Nosotros</title>
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
<div class="container" align="middle">
  <h2><strong>QUIENES SOMOS</strong></h2>
  <br>
  <br>
  <h4>Somos un grupo de estudiantes del SENA en Tecnologia en Analisis y Desarrollo de Sistemas de Informacion <br>
    del Gaes 12, Ficha 1565035 del 2018 en modalidad virtual
  </h4>
  <br>
  <br>
  <img src="../Imagenes/Logo Andromeda Inventory Nosotros.jpeg">
  <br>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.6051010016954!2d-74.02299518523778!3d4.664287596611888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNMKwMzknNTEuNCJOIDc0wrAwMScxNC45Ilc!5e0!3m2!1ses!2sco!4v1543080360846" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  <br>
  <br>
  <a href="Mapa_del_Sitio.html" target="_self"> <input type="button" class="btn btn-primary" name="Mapa del Sitio" value="Mapa del Sitio" /> </a>
</div>

</body>
</html>