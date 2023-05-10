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

  require_once ("../PHPMailer/clsMail.php");

  $para = $row['email'];

  $mailSend = new clsMail();

  $bodyHTML = "
  <html>
  <body>
    <h3>Entra a este <a href='http://localhost/php/Panel%20Solar/recuperacion.php?email=$email'>link</a> para reestablecer la contraseña.</h3>
  </body>
  </html>
  ";
  
  $enviado =  $mailSend->metEnviar("Porti Sunon","Porti Sunon - Usuario","$para","Recuperación de contraseña", $bodyHTML);

  if($enviado){
      echo ("Enviado");
  }else {
      echo ("No se pudo enviar el correo");
  }

closedb();

}$check = 1;
$_SESSION['enviado'] = $check;

header("location:../index.php");
}

?>