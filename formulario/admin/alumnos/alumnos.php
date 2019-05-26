	<?php 
		include('../../conexion.php');
		include('../../Login/iniciar.php');
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
		
		<title>Alumnos</title>
	</head>
	<body>


	<div id="container">
	
	<?php include ('../../sidebar.php')?>

			<div id="main">

					<div class="contenedor-tabla"> 
						<h2>Tabla Alumnos</h2>
						<input type="text" name="search" id="search" class="form-control" placeholder="Buscar en tabla" />  
						<br>
							<table class="tabla" id="buscador">
								<thead>
									<tr>
										<td >Id</td>
										<td>Nombre</td>
										<td>Apellido</td>
										<td>Carrera</td>
										<td>Acciones</td>	
									</tr>
								</thead>
								<?php 
								$sql="SELECT alumnos.idalumno as idalumno, alumnos.nombre as nombre, alumnos.apellido as apellido, oferta_academica.nombre as carrera
								from alumnos, oferta_alumnos, oferta_academica 
								where alumnos.idalumno=oferta_alumnos.idalumno and oferta_alumnos.idcarrera=oferta_academica.idcarrera;";
								$result=mysqli_query($conexion,$sql);

								while($mostrar=mysqli_fetch_array($result)){
									echo "
									<tbody>
									<tr>
									<td>".$mostrar['idalumno']."</td>
									<td>".$mostrar['nombre']."</td>
									<td>".$mostrar['apellido']."</td>
									<td>".$mostrar['carrera']."</td>

									<td>
				
									<button>
									<a  href='update.php?rn=$mostrar[idalumno]&sn=$mostrar[nombre]&cl=$mostrar[apellido]&car=$mostrar[carrera]'>Editar</a>
									</button>

									<button class='pop-up-activate'>
									<a  href='delete.php?rn=$mostrar[idalumno]'>Borrar</a>
									</button>
									</td>
									
									</tr>
									</tbody>";
										
								?>
								
							<?php 
							}
							?>	
						</table>
					
					</div>
				
				<div class="form col">
				<h2>Registrar</h2>	
				<form action="guardar.php" method="POST" autocomplete="off" pattern="\S">
					<p>CIF</p>
					
					<br>
					<input type="text" name="cif" placeholder="CIF" maxlength="8" pattern="^[0-9]*$" required>
					<p>Nombre</p>
					
					<br>
					<input type="text" name="nombre" placeholder="Primer nombre" maxlength="25" pattern="^[A-Za-z]+$" required>
					<p>Apellido</p>
					
					<br>
					<input type="text" name="apellido" placeholder="Apellido" maxlength="25" pattern="^[A-Za-z]+$" required>
						<br>
								<br>
						<select name="carrera" required flex>
                        <option required>--Carreras Disponibles--</option>
							<?php 
									$sql="SELECT * from oferta_academica";
									$result=mysqli_query($conexion,$sql);
								
									
									while($ensenar=mysqli_fetch_array($result)){
										echo "
									
											<option >".$ensenar['nombre']."</option>
										
									"
											
									?>
									<?php 
								}
								?>	
							</select>

						<br>

						<div class="pop-up">
							<div >
							<p>¿Esta seguro?</p>
							<input href='guardar.php' type="submit" value="Confirmar">
							<br>
							<br>
							<input class= "pop-up-cancel" type="button" value="Cancelar">
							</div>
						</div>
						


						
					</form>
					
					<button class="pop-up-activate">Enviar</button>
				</div>
			
		</div>
		
		</div>
		<style>
			.form {
				width:250px;
				height: 500px;
			}
		</style>
	

		</body>
		<script src="../../pop-up.js"></script>
		</html>

		<?php include ('../main/searchbar.php')?>