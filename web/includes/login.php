<?php
session_start();
include_once('db.php');
conectadb();


$login = $_REQUEST["email"]; // user y pass del formulario
$pwd = $_REQUEST["pass"];
$check = 1;
 
$result = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$login'") or die
("error en el select");

if( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $pass_hash_bbdd = $row["contra"];
    $tipo_bbdd = $row["tipo"];
    $recu = $row["recu"];


    if(password_verify($pwd, $pass_hash_bbdd)){
    // Si entro aquí es porque el user y password es correcto
        $_SESSION['login'] = $login;
        $_SESSION['tipo'] = $tipo_bbdd;
        $_SESSION['codigo'] = $recu;

        header("location:../dashboard.php");
    }
    else{
    // Si entro aquí es porque el password no es correcto
        $_SESSION['mal'] = $check;
        header("location:../index.php?nopasas");
    }
    closedb();
}
else{
// Si entro en este ELSE es porque no he encontrado el usuario en la BBDD
        $_SESSION['nouser'] = $check;
        header("location:../index.php?nopasas");
    header("location:../index.php?nouser");
}



?>