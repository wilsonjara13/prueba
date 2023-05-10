<?php
session_start();
include('includes/db.php');
if(isset($_SESSION['login'])){
$login_chg = $_SESSION['login'];

if(isset($_REQUEST['id'])){
$id = $_REQUEST['id'];
$_SESSION['grafica'] = $id;

}


if(isset($_REQUEST['filtro'])){


$inicio = $_REQUEST['date1'];
$_SESSION['inicio'] = $inicio;

$fin = $_REQUEST['date2'];
$_SESSION['fin'] = $fin;

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
	<!-- Grafica -->
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

						<h1 class="page-title">Gráfica Panel (<?php echo "$id"; ?>)</h1>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default" id="panel">
							<div class="panel-heading">Panel Solar </div>
							<div class="panel-body">
							
							<form method="post" class="form">
                                <div class="accordion-content">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="row">                                              
                                              <div class="col-sm-3">
                                                <fieldset>
                                                <p style="margin-bottom:-2px"><b>Fecha Inicio</b></p>
                                                  <input name="date1" type="datetime-local" class="form-control" required>
                                                </fieldset>
                                              </div>

                                              <div class="col-sm-3">
                                                <fieldset>
                                                <p style="margin-bottom:-2px"><b>Fecha Fin</b></p>
                                                  <input name="date2" type="datetime-local" class="form-control" required>
                                                </fieldset>
                                              </div>


											  <div class="blue-button">
                                                <button class="btn" name="filtro" type="submit" 
                                                style="padding: 11px 15px 11px 15px; background-color: #4883ff; color: white; font-size: 15px; font-weight: 500; margin-left:15px; margin-top:19px">
                                                Filtrar
                                                </button>                                                
                                              </div>
                                </form>
								
								<br><br>
								<a href="panelsolar.php" style="margin-left:20px">Volver</a>
								<br><br><br><br>

							<canvas id="grafica"></canvas>
							<script type="text/javascript" src="script.js"></script>

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
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
</body>
</html>
