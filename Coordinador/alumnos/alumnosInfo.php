<?php 
		include('../../conexion.php');
		include('../../Login/iniciar.php');

		$usuario = $_SESSION['usuario'];
		include('../../validarsesion.php');
		validarcoor($usuario,$conexion);
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
		
		<title>Agregar Clase Coordinador </title>
	</head>
	<body>


	<div id="container">
	
	<?php include ('../sidebarcoor.php')?>

			<div id="main">

					<div class="contenedor-tabla"> 
						<h2>Informacion de alumnos</h2>
						<input type="text" name="search" id="search" class="form-control" placeholder="Buscar en tabla" />  
						<br>
						<div class ='tableFixHead scroll' >
							<table class="tabla" id="buscador">
								<thead>
									<tr>
										<td>Id Alumno</td>
										<td>Nombre</td>
										<td>Segundo Nombre</td>
										<td>Apellido</td>
										<td>Segundo Apellido</td>
										<td>Sexo</td>
										<td>Telefono</td>
										<td>Correo</td>
										<td>Carrera</td>
										<td>Acciones</td>

									</tr>
								</thead>
								<?php 
								$sql="SELECT alumnos.idalumno as idalumno, alumnos.nombre as nombre, alumnos.segundoNombre as segundonombre, alumnos.apellido as apellido, alumnos.segundoApellido as segundoapellido, alumnos.sexo as sexo, alumnos.telefono as telefono, alumnos.correo as correo,oferta_academica.nombre as carrera 
                                from alumnos, oferta_alumnos, oferta_academica, coordinadores
                                where alumnos.idalumno=oferta_alumnos.idalumno and oferta_alumnos.idcarrera=oferta_academica.idcarrera and coordinadores.idcarrera=oferta_academica.idcarrera and coordinadores.idcoordinador='$usuario';";
								$result=mysqli_query($conexion,$sql);

								while($mostrar=mysqli_fetch_array($result)){
									echo "
									<tbody>
									<tr>
									<td>".$mostrar['idalumno']."</td>
									<td>".$mostrar['nombre']."</td>
									<td>".$mostrar['segundonombre']."</td>
									<td>".$mostrar['apellido']."</td>
									<td>".$mostrar['segundoapellido']."</td>
									<td>".$mostrar['sexo']."</td>
									<td>".$mostrar['telefono']."</td>
									<td>".$mostrar['correo']."</td>
                                    <td>".$mostrar['carrera']."</td>
								
									<td>
									<button >
									<a href='info.php?id=$mostrar[idalumno]&nom=$mostrar[nombre]&ap=$mostrar[apellido]'>Info</a>
									</button>
									</td>
									
									</tr>
									</tbody>
									";
										
								?>
								
							<?php 
							}
							?>	
						</table>
						</div>
					
					</div>
				
				
						


						
					
                
			
		</div>
		
		</div>
		<?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
					<p>Hubo Un Error Al Registrar</p>
                    <input class='pop-up-cancel' type='button' value='Confirmar'>
                </div>
            </div> ";
	   }
	   if(isset($_GET["fallo2"]) && $_GET["fallo2"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
					<p>Hubo Un Error Al Borrar</p>
                    <input class='pop-up-cancel' type='button' value='Confirmar'>
                </div>
            </div> ";
       }
     ?>
		<style>
			.form {
				width:250px;
				height: 500px;
			}
			.idnone{
					display: none;
			}
		</style>
	

		</body>
		<script src="../../pop-up.js"></script>
		</html>

		<?php include ('../../admin/main/searchbar.php')?>