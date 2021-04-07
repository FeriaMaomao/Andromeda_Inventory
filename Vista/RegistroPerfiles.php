<?php
  session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user'])){
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión
}
else{
  if($_SESSION['rol'] !=1){
    header("location:../Vista/listaPerfiles.php");
  }
}

require "../Modelo/conexionBasesDatos.php";
$objConexion=Conectarse();
//Consulta Datos Perfil para mostrar en el registro de perfiles
$sql="select distinct Estado from perfil";
$perfil = $objConexion->query($sql);
//Consulta Datos Roles para mostrar en el registro de perfiles
$sql="select * from roles";
$roles = $objConexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Registro de Perfiles</title>
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
  <h2>Registrar Perfil</h2>
  <br>
    <a href="../Vista/listaPerfiles.php" target="_self"><button title="Ver Perfiles" type="button" class="btn btn-primary"><span class="icon-forward"></span> <span class="icon-login"></span></button></a>
  <br>
  <br>
 <form class="form-horizontal" action="../Controlador/validarInsertarPerfil.php" method="post">
<div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="Login">Login: </label>
    <input style="width:30%" type="text" class="form-control" id="Login" name="Login" placeholder="Ingrese un alias para el usuario" required>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="Password">Password: </label>
    <input style="width:30%" type="password" class="form-control" id="Password" name="Password" placeholder="Ingrese la contraseña" required>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="Rol">Rol: </label>
     <select style="width:30%" class="form-control" id="Rol" name="Rol" required>
         <option>Seleccione</option>
         <?php while ($rol=$roles->fetch_object()) { ?>
          <option value=" <?php echo $rol->id_rol; ?> " >
            <?php echo $rol->id_rol. " " .$rol->tipo_rol ?>
          </option>
            <?php } ?>
        </select>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="Estado">Estado: </label>
     <select style="width:30%" class="form-control" id="Estado" name="Estado" required>
         <option>Seleccione</option>
         <option>Activo</option>
         <option>Inactivo</option>
        </select>
  </div>

  <br>
  <br>
      <div align="middle">
        <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
        <button type="reset" class="btn btn-primary btn-lg">Cancelar</button>
      </div>
</form>
</div>

</body>
</html>