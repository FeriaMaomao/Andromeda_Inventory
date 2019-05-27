<?php

  session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user'])){
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión
}
else{
  if($_SESSION['rol'] !=1){
    header("location:../Vista/listaInventario.php");
  }
}

require "../Modelo/conexionBasesDatos.php";
//require "../Modelo/Usuario.php";
$objConexion=Conectarse();
$codinventario=$_GET["parametro"];
$sql="select * from activos_tecnologicos where id_inventario=$codinventario";
$Dato = $objConexion->query($sql);

//Consulta Datos Fabricante para mostrar en el registro de inventario
$sql="select idFabricante, NombreFabricante from fabricante";
$fabricante = $objConexion->query($sql);
//Consulta Datos Marca para mostrar en el registro de inventario
$sql="select idMarca, NombreMarca from marca";
$marca = $objConexion->query($sql);
//Consulta Datos Proveedor para mostrar en el registro de inventario
$sql="select id_Proveedor, Nombre from proveedor";
$proveedor = $objConexion->query($sql);
//Consulta Datos Hardware para mostrar en el registro de inventario
$sql="select idTipo_Hardware, NombreTipo from tipo_hardware";
$hardware = $objConexion->query($sql);
//Consulta Datos Usuarios para mostrar en el registro de inventario
$sql="select id_usuarios, Nombres, Apellidos from usuarios";
$usuarios = $objConexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Actualización de Inventario</title>
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
      <h2>Modificar Activos Tecnologicos</h2>
      <br>
      <a href="../Vista/listaInventario.php" target="_self"><button title="Ver Inventario" type="button" class="btn btn-primary"><span class="icon-forward"></span> <span class="icon-tablet"></span></button></a>
      <br>
        <br>
        <br>
        <form class="form-inline" action="../Controlador/validarActualizarInventario.php" method="post" >
          <?php foreach($Dato as $fila) { ?>

    <div class="form-group col-md-3">
      <label for="text">ID Activo:</label>
      <input type="tex" class="form-control" id="idinventario" name="idinventario" value="<?php echo $codinventario ?>" required>
    </div>

    <div class="form-group col-md-3">
      <label for="asignado">Usuario: </label>
        <select id="asignado" name="asignado" class="form-control">
          <option selected> <?php echo $fila["Asignado"] ?> </option>
          <?php while ($usuario=$usuarios->fetch_object()) { ?>
          <option value="<?php echo $usuario->id_usuarios;?>">
            <?php echo $usuario->id_usuarios. " " .$usuario->Nombres. " " .$usuario->Apellidos ?>
          </option> <?php } ?>
        </select>
    </div>

    <div class="form-group col-md-3">
      <label for="text">Nombre:</label>
      <input type="tex" class="form-control" id="nombre" name="nombre" value="<?php echo $fila["Nombre"] ?>" required>
    </div>

     <div class="form-group col-md-3">
       <label for="exampleFormControlSelect1">Tipo: </label>
       <select class="form-control" id="tipo" name="tipo" required>
         <option> <?php echo $fila["Tipo"] ?> </option>
         <?php while ($tipo=$hardware->fetch_object()) { ?>
          <option value="<?php echo $tipo->NombreTipo; ?>" >
            <?php echo $tipo->idTipo_Hardware. " " .$tipo->NombreTipo ?>
          </option> <?php } ?>
        </select>
      </div>

     <div class="form-group col-md-3">
       <label for="exampleFormControlSelect1">Marca: </label>
       <select class="form-control" id="marca" name="marca" required>
         <option> <?php echo $fila["Marca"] ?> </option>
         <?php while ($filaM=$marca->fetch_object()) { ?>
          <option value="<?php echo $filaM->NombreMarca; ?>" >
            <?php echo $filaM->idMarca. " " .$filaM->NombreMarca ?>
          </option> <?php } ?>
        </select>
     </div>
     <br>
     <br>
     <br>

    <div class="form-group col-md-3">
      <label for="Modelo">Modelo:</label>
      <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $fila["Modelo"] ?>" required>
    </div>

    <div class="form-group col-md-3">
      <label for="Serial">Serial:</label>
      <input type="text" class="form-control" id="serial" name="serial" value="<?php echo $fila["Serial"] ?>" required>
    </div>

    <div class="form-group col-md-3">
       <label for="exampleFormControlSelect1">Fabricante: </label>
       <select class="form-control" id="fabricante" name="fabricante" required>
         <option> <?php echo $fila["Fabricante"] ?> </option>
         <?php while ($filaF=$fabricante->fetch_object()) { ?>
          <option value="<?php echo $filaF->NombreFabricante; ?>" >
            <?php echo $filaF->idFabricante. " " .$filaF->NombreFabricante ?>
          </option> <?php } ?>
        </select>
    </div>

    <div class="form-group col-md-3">
       <label for="exampleFormControlSelect1">Estado: </label>
       <select class="form-control" id="estado" name="estado" required>
         <option> <?php echo $fila["Estado"] ?> </option>
         <option>Activo</option>
         <option>Inactivo</option>
         <option>Garantia</option>
         <option>Baja</option>
        </select>
    </div>
    <br>
    <br>
    <br>

    <div class="form-group col-md-3">
       <label for="exampleFormControlSelect1">Proveedor: </label>
       <select class="form-control form-control-lg" id="proveedor" name="proveedor" required>
         <option> <?php echo $fila["invproveedor"] ?> </option>
          <?php while ($filaP=$proveedor->fetch_object()) { ?>
          <option value="<?php echo $filaP->id_Proveedor ?>" >
            <?php echo $filaP->id_Proveedor. " " .$filaP->Nombre ?>
          </option> <?php } ?>
        </select>
    </div>

    <div class="form-group col-md-3">
      <label for="fechaIngreso">Fecha Ingreso:</label>
      <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso" value="<?php echo $fila["Fecha_Ingreso"] ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="fechaSalida">Fecha Salida:</label>
      <input type="date" class="form-control" id="fechaSalida" name="fechaSalida" value="<?php echo $fila["Fecha_Salida"] ?>">
    </div>
    <br>
    <br>
    <br>

    <div class="form-group col-md-3" >
      <label for="exampleFormControlTextarea1">Seguimientos</label>
      <textarea class="form-control" id="seguimientos" name="seguimientos" rows="3" value="<?php echo $fila["Seguimientos"] ?>" ></textarea>
    </div>
  <?php } ?>
      <div align="middle">
        <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
        <button type="reset" class="btn btn-primary btn-lg">Cancelar</button>
      </div>
        </form>
      </div>
      <br>
      <br>

    </div>
    </div>
  </body>
</html>