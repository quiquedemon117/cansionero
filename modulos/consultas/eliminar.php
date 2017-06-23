<?php
session_start();	 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {	 
} else {
	   echo "Esta pagina es solo para usuarios registrados.<br>";
	   echo "<br><a href='../usuario/login.php'>Login</a>";
exit;
	}
$now = time(); 
	if($now > $_SESSION['expire']) {
	session_destroy(); 
	echo "Su sesion a terminado,
	<a href='../usuario/login.php'>Necesita Hacer Login</a>";
exit;
}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../images/favicon.png">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/bootstrap-theme.css">
	<link rel="stylesheet" href="../../css/style.css">
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.js"></script>
</head>
<body>
<a href="../usuario/logout.php"><button class="btn btn-danger" style="float:right;">Cerrar sesion</button></a>
<h1>Eliminar los cantos</h1>
	<form action="editar.php" type="POST" class="form-group">
		<?php
include_once('../conexion/conexion.php');
session_start();

$sql=mysqli_query($con, "SELECT * FROM cantos");

if ($row = mysqli_fetch_array($sql)){ 
   echo "<table class='table' border = '1'> \n"; 
   echo "<tr><th>Nombre</th><th>Tipo</th><th>Tiempo</th><th>Letra</th></tr> \n"; 
   do { 
      echo "<tr><td>".$row["nombre"]."</td><td>".$row["tipo"]."</td><td>".$row["tiempo_liturgico"]."</td><td><a href='deletecanto.php?canto=".$row['id_canto']."' id='delete49'>Eliminar</a></td></tr> \n"; 
   } while ($row = mysqli_fetch_array($sql)); 
   echo "</table> \n"; 
} else { 
echo "<h3>¡ No se ha encontrado ningún registro !</h3>"; 
}
?>
	</form>
</body>
</html>