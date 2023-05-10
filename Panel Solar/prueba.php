<?php

include('includes/db.php');

if(isset($_REQUEST["prueba"])) {
$valor = $_REQUEST["prueba"];

$a = $valor/rand(1,10);

$c = rand(1,3)/rand(1,10);

$b = $a * $c;

conectadb();

$sql= mysqli_query($conn, "UPDATE panel set voltios = $a, vatios = $b, amperios = $c where id = 1");

closedb();

}
?>