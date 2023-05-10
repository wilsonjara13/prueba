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
											<th>Acciones</th>

										</tr>
									</thead>
									<tbody>

									<?php 
conectadb();

$query = "SELECT id, vatios, voltios, amperios, fecha from panel";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

?>	
										<tr>
											<td><?php echo "{$row['id']}";?></td>
											<td><?php echo "{$row['vatios']}";?></td>
											<td><?php echo "{$row['voltios']}";?></td>
											<td><?php echo "{$row['amperios']}";?></td>
											<td><?php echo "{$row['fecha']}";?></td>

											<td><?php if($_SESSION['tipo'] == "admin" || $_SESSION['tipo'] == "creador"){?>										
											<a href="panelsolar.php?del=<?php echo "{$row['id']}";?>" onclick="return confirm('¿Quieres borrarlo?');"><i class="fa fa-close"></i></a>
												<?php } ?>	
										<span style="margin-left:5px"></span> <!-- Separador --> 
											<a href="panelsolar_grafica.php?id=<?php echo "{$row['id']}";?>"><i class=" fa fa-area-chart"></i></a>
											</td>
										</tr>

<?php }
mysqli_free_result($result);
closedb();
?>										


									</tbody>
								</table>