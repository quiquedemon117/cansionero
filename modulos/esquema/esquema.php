<?php

include_once('../conexion/conexion.php');
include_once('../consultas/busqueda.php');
date_default_timezone_set('America/Mexico_City');
$date = time();
$fecha = date("d/m/y", $date);
$hora = date("hh:mm:ss", $date); 

if(mysqli_query($con, "INSERT INTO esquema_rapido (fecha, hora, id_canto) VALUES ('$fecha', '$hora', '$id')")){
	echo "<script>alert('El canto fue agregado a el esquema rapido');</script>";
}else{
	echo "<script>alert('No se pudo agregar el canto al esquema rapido intente mas tarde');</script>";
}


?>