<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../sweetalert/dist/sweetalert.css">
<script type="text/javascript" src="../../sweetalert/dist/sweetalert.min.js"></script>
</head>
</html>
<?php
if(isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["tiempo"]) && isset($_POST["letra"])){
include_once('../conexion/conexion.php');
session_start();

	$nombrePOST = $_POST["nombre"];
	$tipoPOST = $_POST["tipo"];
	$tiempoPOST = $_POST["tiempo"];
	$letraPOST = $_POST["letra"];


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
		die("<script>swal({title:'Agregado', text:'El canto a sido registrado correctamente', type:'success'}, function(){window.location.href='../../index.html'});</script>");
	}else{
		die("<script>swal({title:'Oops', text:'Ocurrio un problema intente mas tarde', type:'error'}, function(){window.location.href='../../index.html'});</script>");
	}
}
}else{
	echo "Las variables no estan definidas";
}
?>

