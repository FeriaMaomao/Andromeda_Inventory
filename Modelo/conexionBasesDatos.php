<?php


function Conectarse()
{
	$objConexion = new mysqli("localhost","id9737123_root","Mentirosa1069","id9737123_andromeda");
	if ($objConexion->connect_errno)
	{
		echo "Erro de conexion a la Base de Datos ".$objConexion->connect_error;
		exit();
	}
	else
	{
		return $objConexion;
	}
}

?>