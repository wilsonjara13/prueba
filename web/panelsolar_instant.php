<?php
session_start();
include('includes/db.php');

 ?>
<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Número</th>
											<th>Vatios</th>
											<th>Voltios</th>
											<th>Amperios</th>
											<th>Última actualización</th>
											<!-- si es admin puede hacer action -->
											<?php if($_SESSION['tipo'] == "admin" || $_SESSION['tipo'] == "creador"){?>										
											<th>Acciones</th>
											<?php }?>										

										</tr>
									</thead>
									<tbody>

									<?php 
conectadb();

$query = "SELECT p.id, p.vatios, p.voltios, p.amperios, pf.fecha from panel p #hecho asi para poder hacer un trigger de actualizacion de fecha
		  inner join panel_fecha pf on p.id = pf.id";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

?>	
										<tr>
											<td><?php echo "{$row['id']}";?></td>
											<td><?php echo "{$row['vatios']}";?></td>
											<td><?php echo "{$row['voltios']}";?></td>
											<td><?php echo "{$row['amperios']}";?></td>
											<td><?php echo "{$row['fecha']}";?></td>

<?php if($_SESSION['tipo'] == "admin" || $_SESSION['tipo'] == "creador"){?>										
<td><a href="panelsolar.php?del=<?php echo "{$row['id']}";?>" onclick="return confirm('¿Quieres borrarlo?');"><i class="fa fa-close"></i></a></td>
										</tr>

<?php }}
mysqli_free_result($result);
closedb();
?>										


									</tbody>
								</table>