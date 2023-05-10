<?php
session_start();
include_once('db.php');

if(isset($_REQUEST['submit'])){

$email = $_SESSION['login'];

$pass_vieja = $_REQUEST['vieja'];
$pass_nueva = $_REQUEST['nueva'];
   

    conectadb();
    
    $query = "SELECT * from usuarios where email = '$email'";
    $result = mysqli_query($conn, $query);
    $check = 1;
    
    if($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

        $pass_hash_bbdd = $row["contra"];
    
        if(password_verify($pass_vieja, $pass_hash_bbdd)){
            $contra = password_hash($pass_nueva, PASSWORD_DEFAULT);

            $sql = mysqli_query ($conn , "UPDATE usuarios set contra = '$contra' where email = '$email'");
            $_SESSION['cambiado'] = $check;

            header("location:../contra_cambiar.php");
    
        } else{
            $_SESSION['error'] = $check;
            header("location:../contra_cambiar.php");
        }
    
    }
}
    closedb();

?>