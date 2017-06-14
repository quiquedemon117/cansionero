<?php
if(isset($_GET["nombre"]) && isset($_GET["tipo"]) && isset($_GET["tiempo"]) && isset($_GET["letra"])){
include_once('../conexion/conexion.php');
session_start();

	$nombrePOST = $_GET["nombre"];
	$tipoPOST = $_GET["tipo"];
	$tiempoPOST = $_GET["tiempo"];
	$letraPOST = $_GET["letra"];


//Escribimos la consulta necesaria
$consulta = "SELECT nombre FROM cantos WHERE nombre LIKE '%$nombrePOST%'";

//Obtenemos los resultados
$rConsulta = mysqli_query($con, $consulta) or die(mysql_error());
$dConsulta = mysqli_fetch_array($rConsulta);
$BD = $dConsulta['nombre'];

if($nombrePOST == $BD){
	echo "<script>alert('El canto ya esta registrado intente con otro por favor'); window.location.href='../../index.html';</script>";
}else{

	$consultaRegistro = "INSERT INTO cantos (nombre, tipo, tiempo_liturgico, letra_canto) VALUES ('$nombrePOST', '$tipoPOST', '$tiempoPOST', '$letraPOST')";

	if(mysqli_query($con, $consultaRegistro)){
		die('<script>alert("El canto fue registrado correctamente"); window.location.href="../../index.html";</script>');
	}else{
		die('<script>alert("Ha ocurrido un error por favor intente de nuevo"); window.location.href="../../index.html";</script>');
	}
}
}else{
	echo "Las variables no estan definidas";
}
?>

