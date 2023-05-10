<?php
session_start();
include_once('includes/db.php');
if($_SESSION['tipo']== "admin" || $_SESSION['tipo'] == "creador"){

$login = $_SESSION['login'];

if(isset($_REQUEST['del'])){

$borrar = $_REQUEST['del'];

conectadb();

$sql = mysqli_query($conn, "delete from usuarios where email = '$borrar'");

closedb();
}

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

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
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

						<h2 class="page-title">Gestión de Administradores</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Usuarios</div>
							<div class="panel-body">
							
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>

										<tr>

										<th>Nombre</th>
										<th>Email </th>
										<th>Tipo</th>
										<!-- si es admin puede hacer action -->
										<?php if($_SESSION['tipo'] == "admin" || $_SESSION['tipo'] == "creador"){?>											
										<th>Cambiar tipo</th>
										<th>Acciones</th>
										<?php }?>
									
										</tr>
									</thead>
									<tbody>

<?php 
conectadb();

$query = "SELECT * from usuarios order by nombre ";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

//solucion a error de array
$email = $row['email'];
$type = $row['tipo'];

?>	
										<tr>
											<td><?php echo "{$row['nombre']}";if($row['email']==$login){echo" <b>(Actual)</b>";}?></td>
											<td><?php echo "{$row['email']}";?></td>
											<td><?php echo "{$row['tipo']}";?></td>										
											<!-- si es admin tipo admin puede hacer action
												 si el usuario es creador que no se pueda cambiar su tipo -->
											<?php if($row['tipo']!= "creador") { if($_SESSION['tipo'] == "admin"|| $_SESSION['tipo'] == "creador"){?>
											<td>
											<form method="post" action="includes/editar_tipo.php">
												<select name="cambiar_tipo">
												<?php 
												$query2 = "SELECT nombre from tipo where nombre != 'creador'";
												$result2 = mysqli_query($conn,$query2);

												while($row = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
												?>	
													<option value="<?php echo"{$row['nombre']}";?>"><?php echo" {$row['nombre']}";?></option>
												<?php }} ?>
													
												</select>
											<button type="submit">Cambiar</button>

											<input type="hidden" name="email" value="<?php echo $email;?>">

											<?php }else{?>
												<td></td> <!--rellenar-->
											<?php } ?>
											</form>

											<form method="post">
											<!-- Los usuarios tipo creador no se pueden borrar -->
											<?php if($type != "creador"){ ?>
												<td><a href="gestion_admin.php?del=<?php echo $email;?>" onclick="return confirm('¿Quieres eliminar el usuario?');"><i class="fa fa-close"></i></a></td>
											<?php }else{?>
												<td></td> <!--relleno-->
											<?php }?>
											</form>

											
										</tr>
										
									</tbody>
<?php }
closedb();
?>	
								</table>

						

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
</body>
</html>
<?php } else{
	header("location:dashboard.php?NO_ERES_ADMIN");
} ?>
