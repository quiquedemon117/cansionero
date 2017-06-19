<?php
include_once('../conexion/conexion.php');
// comprobamos que el arhivo no sea mayor de 1Mb
if($_FILES["archivo"]["size"]>10000000){
echo "Solo se permiten archivos menores de 10MB";
}else{
// sacamos todas las propiedades del archivo
$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo= $_FILES['archivo']['type'];
$tamano_archivo = $_FILES["archivo"]['size'];
$direccion_temporar = $_FILES['archivo']['tmp_name'];
// movemos el archivo a la capeta de nuestro servidor
move_uploaded_file($_FILES['archivo']['tmp_name'],"musica/" . $_FILES['archivo']['name']);

$query= "INSERT INTO upload (nombre_archivo)VALUES ('$nombre_archivo')";

$consulta = mysql_query($con, $query);

header("Location: music.php");
}?>