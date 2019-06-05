<?php 
include('../../conexion.php');
	
include('../../Login/iniciar.php');
include('../../admin/main/validacioncontra.php');
$usuario = $_SESSION['usuario'];
include('../../validarsesion.php');
validarcoor($usuario,$conexion);

$recuperarID="SELECT nombre from coordinadores where idcoordinador='$usuario';";
$consultad = mysqli_query($conexion, $recuperarID);
$arrayd = mysqli_fetch_array($consultad);
$nombre= $arrayd['nombre'];
?>
	
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../../alumnos.css">
		<link rel="stylesheet" type="text/css" href="../../pop-up.css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
		
		<title>Coordinador</title>
	</head>
	<body background-color: #fff>
	<div id="container">
			<?php include ('../sidebarcoor.php')?>

			<div id="main">
			<div id="main-repair">
					<div class="row">
						<div class ="col"> 
							<h2 class="mainh2">Bienvenido/a, <?php echo $nombre; ?></h2>
							
						</div>
					</div>
					<div class="row">
						<div class="col">
							
						</div>
					</div>
				</div>
			</div>
	</div>
	<?php
	if($array['cambiar']>0){
   
		echo "<div class='pop-up-error'>
			  <div>
		   <p>Recuerda cambiar tu contraseña, $nombre</p>
		   <input class= 'pop-up-cancel' type='button' value='Okay'>
		</div>
	 </div>";
	   
		
	 }
	 
	?>
	


		</body>
		<script src="../../pop-up.js"></script>
		</html>