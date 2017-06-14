<?php 
// datos para la coneccion a mysql 
define('DB_SERVER','localhost'); 
define('DB_NAME','cansionero'); 
define('DB_USER','lebd'); 
define('DB_PASS','Lebd2301'); 

$con = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($mysqli_conn->connect_error) {
    die('Error : ('. $mysqli_conn->connect_errno .') '. $mysqli_conn->connect_error);
}	
?>