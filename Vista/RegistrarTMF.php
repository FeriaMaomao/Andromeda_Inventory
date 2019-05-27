<?php
  session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user'])){
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión
}
else{
  if($_SESSION['rol'] !=1){
    header("location:../Vista/listaProveedor.php");
  }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Tipo, Marca y Fabricante</title>
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

<div align="center"  class="container">
  <div align="left">
      <h2>Registro de Tipo, Marca y Fabricante</h2>
  <br>
	<a href="../Vista/listaInventario.php" target="_self"><button title="Ver Inventario" type="button" class="btn btn-primary"><span class="icon-forward"> </span><span class="icon-laptop"></span></button></a>
  </div>
    <br>
    <?php
  if ($msj==1)
  echo '<h3 style="color:green" align="center">Se ha Agregado el Tipo de Activo Correctamente</h3>';
  if ($msj==2)
  echo '<h3 style="color:green" align="center">Se ha Agregado la Marca de Activo Correctamente</h3>';
  if ($msj==3)
  echo '<h3 style="color:green" align="center">Se ha Agregado el Fabricante de Activo Correctamente</h3>';
  if ($msj==4)
  echo '<h3 style="color:red" align="center">Problemas al Agregar, Por favor revise</h3>';
  ?>
  <br>
 <form class="form-inline" action="../Controlador/validarInsertarTMF.php" method="post" >
<div  >
  <div class="form-group">
    <label for="Tipo">Tipo: </label>
    <input type="text" class="form-control" id="Tipo_Activo" name="Tipo_Activo" placeholder="Tipo Activo">
  </div>
<button type="submit" class="btn btn-primary btn-lg" name="BtnTipo" id="BtnTipo">Registrar</button>
  <br>
  <br>
  <div class="form-group">
    <label for="Marca">Marca: </label>
    <input type="text" class="form-control" id="Marca_Activo" name="Marca_Activo" placeholder="Marca Activo">
  </div>
  <button type="submit" class="btn btn-primary btn-lg" name="BtnMarca" id="BtnMarca">Registrar</button>
  <br>
  <br>
  <div class="form-group">
    <label for="Fabricante">Fabricante: </label>
   
    <input type="text" class="form-control" id="Fabricante_Activo" placeholder="Fabricante Activo" name="Fabricante_Activo">
  </div>
<button type="submit" class="btn btn-primary btn-lg" name="BtnFabricante" id="BtnFabricante">Registrar</button>
  <br>
  <br>
</form>
</div>
</body>
</html>