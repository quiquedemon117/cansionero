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
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="../../images/favicon.png">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
<title>Subir archivos al servidor</title>
</head>
<body>
<a href="../usuario/logout.php"><button class="btn btn-danger" style="float:right;">Cerrar sesion</button></a>
<center>
<h1>Subir cansion</h1>
<form class="form-group" action="sube-video.php" method="post" enctype="multipart/form-data">
<div class="form-group col-md-offset-3 col-md-6">
<?php 
include_once('../conexion/conexion.php');
$query =mysqli_query($con, "SELECT id_canto, nombre FROM cantos");
while ($valores = mysqli_fetch_array($query)) {						
echo '<select name="canto" class="form-control"><option value="'.$valores[id_canto].'">'.$valores[nombre].'</option></select>';
$nom = $valores[nombre];
}
 ?><br>
<input class="form-control-file" type="file" name="archivo" id="archivo"><br>
<input class="btn" type="submit" value="Subir Video" />
</div>
</form>
</center>
</body>
</html>
