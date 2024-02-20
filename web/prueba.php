<?php

include('includes/db.php');

if(isset($_REQUEST["prueba"])) {
$a = $_REQUEST["prueba"];

conectadb();

$sql= mysqli_query($conn, "INSERT INTO prueba value ($a)");

closedb();

}
?>