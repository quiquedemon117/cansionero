<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/bootstrap-theme.css">
	<link rel="stylesheet" href="../../css/style.css">
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.js"></script>
</head>
<body>
<h1>Editar los cantos</h1>
	<form action="editar.php" type="POST" class="form-group">
		<?php
include_once('../conexion/conexion.php');
session_start();

$sql=mysqli_query($con, "SELECT * FROM cantos");

if ($row = mysqli_fetch_array($sql)){ 
   echo "<table class='table' border = '1'> \n"; 
   echo "<tr><th>Nombre</th><th>Tipo</th><th>Tiempo</th><th>Letra</th></tr> \n"; 
   do { 
      echo "<tr><td>".$row["nombre"]."</td><td>".$row["tipo"]."</td><td>".$row["tiempo_liturgico"]."</td><td><a href='canto.php?canto=".$row['id_canto']."'>Ver letra del canto</a><br><a href='editcanto.php?canto=".$row['id_canto']."'>Editar</a></td></tr> \n"; 
   } while ($row = mysqli_fetch_array($sql)); 
   echo "</table> \n"; 
} else { 
echo "<h3>¡ No se ha encontrado ningún registro !</h3>"; 
}
?>
	</form>
</body>
</html>