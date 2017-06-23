<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../sweetalert/dist/sweetalert.css">
	<script type="text/javascript" src="../../sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	
</body>
</html>

<?php
include_once('../conexion/conexion.php');
include_once('../upload/music.php');
// comprobamos que el arhivo no sea mayor de 1Mb
if($_FILES['archivo']['type'] != "audio/mp3") {
	if($_FILES['archivo']['size'] < 1000000){
echo "<script>swal({title:'Error', text:'Solo se permiten archivos menores de 10 MB y en formato mp3', type:'error'}, function(){window.location.href='music.php'});</script>";
}
}else{
$select = $_POST["canto"];
$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo= $_FILES['archivo']['type'];
$tamano_archivo = $_FILES["archivo"]['size'];
$direccion_temporar = $_FILES['archivo']['tmp_name'];

// movemos el archivo a la capeta de nuestro servidor
if(copy($_FILES['archivo']['tmp_name'],"musica/".$_FILES['archivo']['name'])){
$query= "INSERT INTO upload (nombre_archivo)VALUES ('$nombre_archivo')";
$consulta = mysqli_query($con, $query);
mysqli_query($con, "INSERT INTO upload (nombre_archivo, id_canto) VALUES ('".$nom."', '".$select."')");
echo "<script>swal({title:'Archivo guardado', text:'Correctamente', type:'success'}, function(){window.location.href='music.php'});</script>";
}else{
echo "<script>swal({title:'Error', text:'Algo salio mal intente de nuevo', type:'error'}, function(){window.location.href='music.php'});</script>";
	 }
}
?>