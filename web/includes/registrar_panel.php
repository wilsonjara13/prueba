<?php
session_start();
include_once('db.php');

$check = 1;

if(isset($_POST['submit']))
  {
$email=$_POST['email'];
$pass=$_POST['pass'];
$nombre=$_POST['nombre'];
$tipo=$_POST['tipo'];
$contra = password_hash($pass, PASSWORD_DEFAULT);


conectadb();
$query = "SELECT count(email) as comprobar from usuarios where email = '$email' ";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

    if($row['comprobar'] == 0){

        $sql= mysqli_query($conn, "INSERT INTO usuarios VALUES('$email','$contra','$nombre','$tipo')");

        $_SESSION['creado'] = $check;
        
        header("location:../gestion_admin_crear.php");
    } else{

        $_SESSION['duplicado'] = $check;
        header("location:../gestion_admin_crear.php");
    }
}closedb();
} 

else{

    $_SESSION['nocreado'] = $check;
    header("location:../gestion_admin_crear.php");


}




?>