<?php
session_start();
include('includes/db.php');

if($_SESSION['tipo']== "admin" || $_SESSION['tipo'] == "creador"){


?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
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
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Crear Usuario</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Información básica</div>
									<div class="panel-body">

										<form method="post" action="includes/registrar_panel.php" class="form-horizontal" enctype="multipart/form-data">

											<div class="form-group">
											<label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
												<div class="col-sm-3">
													<input type="text" name="email" class="form-control" required>
												</div>
											</div>

											<div class="form-group">
											<label class="col-sm-2 control-label">Nombre<span style="color:red">*</span></label>
												<div class="col-sm-3">
													<input type="text" name="nombre" class="form-control" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">Tipo<span style="color:red">*</span></label>
												<div class="col-sm-3">
													<select name="tipo" class="form-control">
														<?php 
														conectadb();
														$query2 = "SELECT nombre from tipo where nombre != 'creador'";
														$result2 = mysqli_query($conn,$query2);

														while($row = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
														?>	

															<option value="<?php echo"{$row['nombre']}";?>"><?php echo" {$row['nombre']}";?></option>

														<?php } 
														mysqli_free_result($result);
														closedb();?>
													</select>
												</div>
											</div>

											<div class="form-group">
											<label class="col-sm-2 control-label">Contraseña<span style="color:red">*</span></label>
												<div class="col-sm-3">
													<input id="password" name="pass" type="Password" class="form-control" autocomplete="off" required>
													<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()" style="margin-left:332px;margin-top:-67px;padding-top:10px;padding-bottom:14px;font-size:15px;text-align:center";> 
													<span class="fa fa-eye-slash icon"></span> 
													</button>
												</div>
											</div>

											<!--  -->
									<?php if(!isset($_SESSION['creado'])){}
									else{
									?>
									<br>
									<p style="color:green;margin-left:273px;margin-top:-30px"> Se ha creado el usuario </p>
									<?php unset($_SESSION['creado']);} ?>

									<!--  -->
									<?php if(!isset($_SESSION['nocreado'])){}
									else{
									?>
									<br>
									<p style="color:red;margin-left:273px;margin-top:-30px"> No se ha creado el usuario </p>
									<?php unset($_SESSION['nocreado']);} ?>

									<!--  -->
									<?php if(!isset($_SESSION['duplicado'])){}
									else{
									?>
									<br>
									<p style="color:red;margin-left:273px;margin-top:-30px"> Este correo ya esta utilizado </p>
									<?php unset($_SESSION['duplicado']);} ?>


											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Borrar datos</button>
													<button class="btn btn-primary" name="submit" type="submit">Crear Usuario</button>
												</div>
											</div>
										</form>
									</div>
								</div>
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
<?php } else{
	header("location:../index.php");
} ?>