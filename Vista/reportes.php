<?php
  session_start();
  extract ($_REQUEST);
  if (!isset($_SESSION['user']))
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión

require "../Modelo/conexionBasesDatos.php";
require "../Controlador/ConsultaReportes.php";
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Reporte de Inventario</title>
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
      <h2>Descargar Reporte de Activos</h2>
      <br>
      <?php if($_SESSION['rol']==1) { ?>
      <a href="../Vista/listaInventario.php" target="_self"><button title="Ver Inventario" type="button" class="btn btn-primary"><span class="icon-forward"></span> <span class="icon-tablet"></span></button></a><?php } ?>
      <a href="../Controlador/MasivoInventario.php" target="_self"><button title="Descargar Masivo" type="button" class="btn btn-primary"><span class="icon-download"></span></button></a>
      <br>
        <br>
        <br>
  <form class="form-inline" action="../Controlador/Generar Reporte.php" method="post" >
     <div class="form-group col-md-2">
      <label for="asignado">Usuario: </label>
        <select id="asignado" name="asignado" class="form-control">
          <option value="">Seleccione</option>
            <?php while ($usuario=$usuarios->fetch_object()) { ?>
          <option value="<?php echo $usuario->id_usuarios;?>">
            <?php echo $usuario->id_usuarios. " " .$usuario->Nombres. " " .$usuario->Apellidos ?>
          </option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group col-md-2">
       <label for="exampleFormControlSelect1">Estado: </label>
       <select class="form-control" id="estado" name="estado">
         <option value="">Seleccione</option>
         <?php while ($estac=$estadoactivo->fetch_object()) { ?>
          <option value="<?php echo $estac->Estado; ?>">
            <?php echo $estac->Estado?>
          </option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group col-md-2">
       <label for="exampleFormControlSelect1">Ingreso o Salida: </label>
       <select class="form-control form-control-lg" id="ingresosalida" name="ingresosalida">
         <option value="">Seleccione</option>
         <option value="Fecha_Ingreso">Fecha_Ingreso</option>
         <option value="Fecha_Salida">Fecha_Salida</option>
        </select>
    </div>

    <div class="form-group col-md-2">
      <label for="Fecha Ingreso">Desde:</label>
      <input type="date" class="form-control" id="desde" name="desde">
    </div>

    <div class="form-group col-md-2">
      <label for="Fecha Salida">Hasta:</label>
      <input type="date" class="form-control" id="hasta" name="hasta">
    </div>
    <br>
    <br>
    <br>
    <br>
     <br>
     <br>
      <div align="middle">
       <button type="submit" class="btn btn-primary btn-lg" name="generar_reporte" >Descargar</button>
        <button type="reset" class="btn btn-primary btn-lg">Cancelar</button>
      </div>
  </form>
      <br>
      <br>
</div>

    </div>
    </div>
  </body>
</html>