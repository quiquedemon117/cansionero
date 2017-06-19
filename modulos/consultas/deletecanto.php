<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="../../sweetalert/dist/sweetalert.css">
<script type="text/javascript" src="../../sweetalert/dist/sweetalert.min.js"></script>
</head>
</html>
<?php
include_once('../conexion/conexion.php');
$id = $_GET["canto"];
if(mysqli_query($con, "DELETE FROM cantos WHERE id_canto='".$id."'")){
echo "<script>swal({title:'Eliminar', text:'El canto a sido eliminado correctamente', type:'success'}, function(){window.location.href='eliminar.php'});</script>";	
}else{
	echo "<script>swal({text:'Algo salio mal intente despues' type:'error'}, function(){window.location.href='eliminar.php'});</script>";	
}
?>