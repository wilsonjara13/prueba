	<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			<li class="ts-label">
				<br>
				<?php echo $_SESSION['login']?> 
				<br> Tipo: <?php echo $_SESSION['tipo']?>
			</li>

			<li class="ts-label">Menú</li>

			<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	
			<li><a><i class="fa fa-table"></i> Paneles Solares</a>
				<ul>
				<?php if($_SESSION['tipo'] == "admin" || $_SESSION['tipo'] == "creador"){ ?>
					<li><a href="panelsolar.php?check=1" onclick="return confirm('¿Quieres crear un nuevo panel?');">Crear</a></li>
				<?php } ?>
					<li><a href="panelsolar.php"> Gestión</a></li>
				</ul>		
			</li>

			<?php if($_SESSION['tipo'] == "admin" || $_SESSION['tipo'] == "creador"){?>	
			<li><a><i class="fa fa-user"></i> Gestión Administradores</a>
				<ul>
					<li><a href="gestion_admin_crear.php">Crear</a></li>
					<li><a href="gestion_admin.php"> Gestión</a></li>
				</ul>
			</li>
			<?php } ?>


			</ul>
		</nav>