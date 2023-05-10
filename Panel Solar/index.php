<?php
session_start();

include_once('includes/db.php');
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Panel de Administración</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	
	<div class="login-page bk-img" style="background-image: url(img/login-bg.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold mt-4x" style="color:#fff">Porti Sunon | Iniciar Sesión</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post" action="includes/login.php">

									<label for="" class="text-uppercase text-sm">Email </label>
									<input type="text" name="email" class="form-control mb">

									<label for="" class="text-uppercase text-sm">Contraseña </label>
									<input id="password" name="pass" type="Password" class="form-control" autocomplete="off" required>
									<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()" style="margin-left:286px;margin-top:-67px;padding-top:10px;padding-bottom:14px;font-size:15px;text-align:center";> 
									<span class="fa fa-eye-slash icon"></span> 
									</button>
																	
									<button style="font-size:18px" class="btn btn-primary btn-block" name="login" type="submit">Entrar</button>

								</form>
									<!--  -->
									<?php if(!isset($_SESSION['mal'])){}
									else{
									?>
									<br>
									<p style="color:red"> Has introducido mal la contraseña </p>
									<?php unset($_SESSION['mal']);} ?>

									<!--  -->
									<?php if(!isset($_SESSION['nouser'])){}
									else{
									?>
									<br>
									<p style="color:red;"> El usuario que has introducido no existe </p>
									<?php unset($_SESSION['nouser']);} ?>

									<!--  -->
									<?php if(!isset($_SESSION['creado'])){}
									else{
									?>
									<br>
									<p style="color:green;"> Se ha creado el usuario </p>
									<?php unset($_SESSION['creado']);} ?>

									<!--  -->
									<?php if(!isset($_SESSION['nocreado'])){}
									else{
									?>
									<br>
									<p style="color:red;"> No se ha creado el usuario </p>
									<?php unset($_SESSION['nocreado']);} ?>

									<!--  -->
									<?php if(!isset($_SESSION['duplicado'])){}
									else{
									?>
									<br>
									<p style="color:red"> Este correo ya esta utilizado </p>
									<?php unset($_SESSION['duplicado']);} ?>

									<!--  -->
									<?php if(!isset($_SESSION['enviado'])){}
									else{
									?>
									<br>
									<p style="color:black;"> Se ha enviado un correo de Recuperación </p>
									<?php unset($_SESSION['enviado']);} ?>

									<!--  -->
									<?php if(!isset($_SESSION['cambiado'])){}
									else{
									?>
									<br>
									<p style="color:green;"> Se ha cambiado la contraseña </p>
									<?php unset($_SESSION['cambiado']);} ?>

									<!--  -->
									<?php if(!isset($_SESSION['nocambiado'])){}
									else{
									?>
									<br>
									<p style="color:red;"> No se ha cambiado la contraseña </p>
									<?php unset($_SESSION['nocambiado']);} ?>

			<p style="margin-top: 6%; align=center"><a href="registrar_usuario.php">Crear Usuario</a></p>
			<p style="margin-top: -4%; align=center"><a href="contra_olvidada.php">¿Has olvidado la contraseña?</a></p>

							</div>

						</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("password");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>

</body>

</html>