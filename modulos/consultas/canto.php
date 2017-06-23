<?php 
include_once('../conexion/conexion.php');
$canto_GET = $_GET['canto'];
$sqls=mysqli_query($con, "SELECT nombre FROM cantos WHERE id_canto='".$canto_GET."'");
$row = mysqli_fetch_array($sqls)
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../images/favicon.png">
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
	<div class='divcustom col-md-offset-3 col-md-6'>
<?php

$sql=mysqli_query($con, "SELECT letra_canto FROM cantos WHERE id_canto='$canto_GET'");

if ($row = mysqli_fetch_array($sql)){ 
   do { 
      echo nl2br($row["letra_canto"]); 
   } while ($row = mysqli_fetch_array($sql)); 
   echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
?>
	</div>
</body>
</html>