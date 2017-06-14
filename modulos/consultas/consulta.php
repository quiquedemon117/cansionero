<?php
include_once('../conexion/conexion.php');
$buscar = $_GET["busqueda"];
$sql=mysqli_query($con, "SELECT * FROM cantos WHERE nombre='$buscar'");


if ($row = mysqli_fetch_array($sql)){ 
   echo "<table class='table' border = '1'> \n"; 
   echo "<tr><th>Nombre</th><th>Tipo</th><th>Tiempo</th><th>Letra</th></tr> \n"; 
   do { 
      echo "<tr><td>".$row["nombre"]."</td><td>".$row["tipo"]."</td><td>".$row["tiempo_liturgico"]."</td><td><a href='canto.php?canto=".$row['id_canto']."'>Ver letra del canto</a></td></tr> \n"; 
   } while ($row = mysqli_fetch_array($sql)); 
   echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 

?>