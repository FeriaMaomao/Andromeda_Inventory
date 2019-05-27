<?php
   session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión

$mysqli = new mysqli("localhost","root","","andromeda_inventory");
	
    $salida = "";

    $query = "SELECT * FROM proveedor";

    if (isset($_POST['consulta'])) {
    	$q = $mysqli->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM proveedor WHERE NIT LIKE '%".$q."%' OR Nombre LIKE '%".$q."%' OR Direccion LIKE '%".$q."%' OR Telefono LIKE '%".$q."%' ";
    }

    $resultado = $mysqli->query($query);

 if ($resultado->num_rows>0) { 
$salida.="<table class='table table-striped'>
    <thead>
      <tr>
        <th>ID Proveedor</th>
        <th>NIT</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
      </tr>
    </thead>
    <tbody>";


while ($fila = $resultado->fetch_assoc()) { 

$salida.="<tr>
        <td>".$fila['id_Proveedor']."</td>
        <td>".$fila['NIT']."</td>
        <td>".$fila['Nombre']."</td>
        <td>".$fila['Direccion']."</td>
        <td>".$fila['Telefono']."</td> ";
        if($_SESSION['rol']==1) {
       $salida.= "<td><button title='Eliminar' type='button' name='eliminar' class='btn btn-primary' onclick='EliminarProveedor(".$fila['id_Proveedor'].")'><span class='icon-remove-user'></span></button></td>
        <td><button title='Actualizar' type='button' name='actualizar' class='btn btn-primary' onclick='ModificarProveedor(".$fila['id_Proveedor'].")'><span class='icon-shuffle'></span></button></td>
        </tr>"; }
    

}
$salida.= "</tbody></table>";
} else
  {
      $salida.="<h3 style='color:red' >NO HAY DATOS</h3>";
    }
    echo $salida;

    $mysqli->close();

?>