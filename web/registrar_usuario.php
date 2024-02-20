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
</head>

<body>
	
	<div class="login-page bk-img" style="background-image: url(img/login-bg.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold mt-4x" style="color:#fff">Admin | Sign in</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post" action="includes/registrar.php">

									<label class="text-uppercase text-sm">Email </label>
									<input type="text" name="email" class="form-control mb" required>

									<label class="text-uppercase text-sm">Nombre</label>
									<input type="text" name="nombre" class="form-control mb" required>

									<label class="text-uppercase text-sm">Contraseña</label>
									<input type="password" id="password" name="pass" class="form-control mb" required>
									<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()" style="margin-left:286px;margin-top:-102px;padding-top:10px;padding-bottom:14px;font-size:15px;text-align:center";> 
									<span class="fa fa-eye-slash icon"></span> 
									</button>

									<button style="font-size:18px" class="btn btn-primary btn-block" name="registrar" type="submit">Registrar</button>

								</form>

			<p style="margin-top: 4%; align=center"><a href="index.php">Volver</a>	</p>

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