<?php
session_start();
include_once('db.php');

if(isset($_REQUEST['olvidada']))
{
$email = $_REQUEST['email'];

conectadb();
$result = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$email'") or die
("error en el select");
if( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $to  = "$email";

    // subject
    $subject = 'Clave de Recuperación';
    
    // message
    $message = "
    <html>
    <body>
      <h3>Entra a este <a href='http://localhost/php/Panel%20Solar/recuperacion.php?email=$email'>link</a> para reestablecer la contraseña.</h3>
    </body>
    </html>
    ";
    
    // To send HTML mail, the Content-type header must be set
    $headers = 'From: PW.Recuperacion<proyectowilson1@gmail.com>' . "\r\n";
    $headers  .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // Mail it
    mail($to, $subject, $message, $headers);

closedb();

}$check = 1;
$_SESSION['enviado'] = $check;

header("location:../index.php");
}

?>