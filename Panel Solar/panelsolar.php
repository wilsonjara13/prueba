<?php
session_start();
include('includes/db.php');
if(isset($_SESSION['login'])){
$login_chg = $_SESSION['login'];

//borrar
if(isset($_REQUEST['del']))
	{
$id = $_REQUEST['del'];

conectadb();

$sql = mysqli_query($conn, "delete from panel where id = $id");

closedb();
}

//crear
if(isset($_REQUEST['check']))
	{

conectadb();

$sql = mysqli_query($conn, "insert into panel (vatios,voltios,amperios) values (0,0,0) ");

closedb();
}

 ?>

<!doctype html>
<html lang="es" class="no-js">

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
	<!-- Ajax -->
	<script> src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"</script>

	<script type="text/javascript"> 

	function tiempoReal(){

		var tabla = $.ajax({
			url:'panelsolar_instant.php',
			dataType:'text',
			async:false
		}).responseText;

		document.getElementById("miTabla").innerHTML = tabla;
	}
	setInterval(tiempoReal, 1000);
	</script>
	<!-- /Ajax -->
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

						<h2 class="page-title">Gestión de Paneles Solares</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default" id="panel">
							<div class="panel-heading">Panel Solar</div>
							<div class="panel-body">
							
							<section id="miTabla"> <!-- aqui van los datos actualizados con ajax -->
								
							</section>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

<?php } else{
header("location:index.php?INICIA_SESION");
}
?>

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
