<?php

if(isset($_POST["cantoeditado"])){

include_once('../conexion/conexion.php');

$Letra_canto = $_POST["cantoeditado"];

$id = $_POST["id"];

$sqls=mysqli_query($con, "SELECT * FROM cantos WHERE id_canto='".$id."'");

$row = mysqli_fetch_array($sqls);

$id = $row["id_canto"];

if(mysqli_query($con, "UPDATE cantos SET letra_canto='".$Letra_canto."' WHERE id_canto='".$id."'") or die(mysql_error())){

	echo "<script>alert('El canto ha sido actualisado correctamente'); window.location.href='editar.php';</script>";
	
	}else{
		echo "<script>alert('Hay problemas con la base de datos'); window.location.href='editar.php';</script>";
	}


} else {
	echo "<script>alert('Algo salio mal intente despues'); window.location.href='editar.php';</script>";
}



?>