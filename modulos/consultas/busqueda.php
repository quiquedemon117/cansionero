<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Busqueda</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/bootstrap-theme.css">
	<link rel="stylesheet" href="../../css/style.css">
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="../../images/logo.png" alt=""></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="../../index.html">Registro</a></li>
            <li class="active"><a href="modulos/consultas/busqueda.php">Busqueda de cantos</a></li>
            <li><a href="../contacto/contacto.html">Contacto</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mas... <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav><br>
    <br>
    <br>
    <br>
		<div class="col-md-12">
				<form type="GET" action="busqueda.php" class="form-group" role="search">
            <div class="form-group">
               <input name="busqueda" type="text" class="form-control" placeholder="Buscar...">
            </div>
            <input name="search" type="submit" class="btn btn-default" value="Buscar">
         </form>
         
		</div>


		<center><div class="col-md-12">
			<?php
include_once('../conexion/conexion.php');
$buscar = $_GET["busqueda"];

if($buscar == "*"){
	$sql=mysqli_query($con, "SELECT * FROM cantos");
}else if($buscar != "*"){
	$sql=mysqli_query($con, "SELECT * FROM cantos WHERE nombre='$buscar'");
}

if ($row = mysqli_fetch_array($sql)){ 
   echo "<table class='table' border = '1'> \n"; 
   echo "<tr><th>Nombre</th><th>Tipo</th><th>Tiempo</th><th>Letra</th></tr> \n"; 
   do { 
      echo "<tr><td>".$row["nombre"]."</td><td>".$row["tipo"]."</td><td>".$row["tiempo_liturgico"]."</td><td><a href='canto.php?canto=".$row['id_canto']."'>Ver letra del canto</a></td></tr> \n"; 
   } while ($row = mysqli_fetch_array($sql)); 
   echo "</table> \n"; 
} else { 
echo "<h3>¡ No se ha encontrado ningún registro !</h3>"; 
} 

?>
		</div></center>
</body>
	</div>
</html>