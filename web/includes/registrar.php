<?php
session_start();
include_once('db.php');

$check = 1;

if(isset($_POST['registrar']))
{
$email = $_REQUEST['email'];
$pass = $_REQUEST['pass'];
$nombre = $_REQUEST['nombre'];
$contra = password_hash($pass, PASSWORD_DEFAULT);

conectadb();
$query = "SELECT count(email) as comprobar from usuarios where email = '$email' ";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

    if($row['comprobar'] == 0){
        $sql2= mysqli_query($conn, "INSERT INTO usuarios (email,contra,nombre,tipo) VALUE ('$email','$contra','$nombre','consultor')");

        
        $_SESSION['creado'] = $check;
        
        header("location:../index.php");

    } else{
        $_SESSION['duplicado'] = $check;
        
        header("location:../index.php");
       
}}
closedb();


}else{

$_SESSION['nocreado'] = $check;
header("location:../index.php");

}

?>