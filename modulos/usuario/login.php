<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inicio de sesion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../../sweetalert/dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<script type="text/javascript" src="../../sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4" style="padding-top:20%;">
				<form method="post" action="login.php">
					<div class="form-group">
						<label for="">Usuario</label>
						<input class="form-control" type="text" name="user" required>
					</div>
					<div class="form-group">
						<label for="">Contraseña</label>
						<input class="form-control" type="password" name="pass" required>
					</div>
					<input class="btn btn-success" type="submit" value="iniciar sesion">
				</form>
				<?php

require_once('../conexion/conexion.php');
session_start();

if(isset($_POST["user"]) && isset($_POST["pass"])){
$user = $_POST["user"];
$pass = $_POST["pass"];

		
		$sql = mysqli_query($con, "SELECT * FROM usuarios WHERE user='$user' AND pass='$pass'");

		if(mysqli_num_rows($sql) != 0){
	    $_SESSION['loggedin'] = true;
	    $_SESSION['username'] = $username;
	    $_SESSION['start'] = time();
	    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
			header('Location: ../upload/music.php');
		}else{
			echo "<script>swal({text:'Su usuario o contraseña son incorrectos' type:'error'}, function(){window.location.href='login.php'});</script>";
		}

}else{
	echo "<script>swal({text:'Olvido Colocar su usuario y contraseña' type:'error'}, function(){window.location.href='login.php'});</script>";
}

mysqli_close($con);
				?>
			</div>
		</div>
	</div>
</body>
</html>