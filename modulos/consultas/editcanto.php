<?php 
include_once('../conexion/conexion.php');
$sqls=mysqli_query($con, "SELECT nombre FROM cantos");
$row = mysqli_fetch_array($sqls)
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/bootstrap-theme.css">
	<link rel="stylesheet" href="../../css/style.css">
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.js"></script>
</head>
<body>
<br><br>
<h1 class="text-center"> <?php echo $row["nombre"]; ?> </h1>
<br><br>
	<div class='divcustom col-md-offset-3 col-md-6 form-group'>
<?php
	echo '<form method="POST" action="configedit.php">';
	echo '<label for="comment">Editar:</label>';
	echo '<textarea name="cantoeditado" class="form-control" rows="40">';

$canto_GET = $_GET['canto'];
$sql=mysqli_query($con, "SELECT letra_canto FROM cantos WHERE id_canto='$canto_GET'") or die(mysql_error());

if ($row = mysqli_fetch_array($sql)){ 
      echo $row["letra_canto"]; 
}
	echo '</textarea><br>';
	echo "<input name='id' class='sr-only' type='text' value='".$canto_GET."'>";
	echo '<input type="submit" class="btn btn-success" name="guardar" value="Guardar">';
	echo '</form>';
?>
<br>
	</div>
</body>
</html>