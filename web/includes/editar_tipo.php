<?php
session_start();
include_once('db.php');

$cambiar_tipo = $_REQUEST['cambiar_tipo'];
$email = $_REQUEST['email'];

conectadb();

$sql= mysqli_query($conn, "update usuarios set tipo = '$cambiar_tipo' where email = '$email'");

closedb();

if($_SESSION['tipo'] == 'creador'){}else{

$_SESSION['tipo'] = $cambiar_tipo;
}

header("location:../gestion_admin.php");



?>