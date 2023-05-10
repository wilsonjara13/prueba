<?php
session_start();
include('includes/db.php');

$id = $_SESSION['grafica'];
$date1 = $_SESSION['inicio'];
$date2 = $_SESSION['fin'];


conectadb();

$query = "SELECT vatios, voltios, amperios, fecha from historico_panel where tipo = 'update' and id = '$id' and fecha between '$date1' and '$date2' ";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

$etiquetas [] = $row['fecha'];
$voltios [] = $row['voltios'];
$watts []= $row['vatios'];
$amps [] = $row['amperios'];

$respuesta = [
    "etiquetas" => $etiquetas,
    "volts" => $voltios,
    "watts" => $watts,
    "amps" => $amps
];
}
mysqli_free_result($result);
closedb();

// Ahora las imprimimos como JSON para pasarlas a AJAX, pero las agrupamos
echo json_encode($respuesta);


?>
