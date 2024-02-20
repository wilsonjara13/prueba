<?php
session_start();
include_once('db.php');

if(isset($_REQUEST['olvidada']))
{
$email = $_REQUEST['email'];
$pass = $_REQUEST['pass'];
$contra = password_hash($pass, PASSWORD_DEFAULT);
$check = 1;

conectadb();

$sql= mysqli_query($conn, "update usuarios set contra = '$contra' where email = '$email'");

closedb();


$_SESSION['cambiado'] = $check;

header("location:../index.php");

}else{
$_SESSION['nocambiado'] = $check;

header("location:../index.php");
}


?>