<?php 
		include('../../conexion.php');
		include('../../Login/iniciar.php');

		include('../../validarsesion.php');
		$usuario = $_SESSION['usuario']; 
		validaradmin($usuario,$conexion);
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
		
		<title>Coordinadores</title>
	</head>
	<body background-color: #fff>


	<div id="container">
	
	<?php include ('../../sidebar.php')?>

			<div id="main">

					<div class="contenedor-tabla"> 
						<h2>Tabla Coordinadores</h2>
						<input type="text" name="search" id="search" class="form-control" placeholder="Buscar en tabla" />  
						<br>
						<div class ='tableFixHead scroll' >
							<table class="tabla" id="buscador">
								<thead>
									<tr>
										<td >ID</td>
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
								$sql="SELECT coordinadores.idcoordinador as idcoord, coordinadores.nombre as nombre, coordinadores.segundoNombre as segundonombre, coordinadores.apellido as apellido, coordinadores.segundoApellido as segundoapellido,coordinadores.correo as correo, coordinadores.sexo as sexo, coordinadores.telefono as telefono, oferta_academica.nombre as carrera
                                from coordinadores, oferta_academica 
                                where coordinadores.idcarrera = oferta_academica.idcarrera;";
								$result=mysqli_query($conexion,$sql);

								while($mostrar=mysqli_fetch_array($result)){
									echo "
									<tbody>
									<tr>
									<td>".$mostrar['idcoord']."</td>
									<td>".$mostrar['nombre']."</td>
									<td>".$mostrar['segundonombre']."</td>
									<td>".$mostrar['apellido']."</td>
									<td>".$mostrar['segundoapellido']."</td>
									<td>".$mostrar['sexo']."</td>
									<td>".$mostrar['telefono']."</td>
									<td>".$mostrar['correo']."</td>
									<td>".$mostrar['carrera']."</td>

									<td>
				
									<button>
									<a  href='updatecoord.php?rn=$mostrar[idcoord]&sn=$mostrar[nombre]&cl=$mostrar[apellido]&car=$mostrar[carrera]&ndos=$mostrar[segundonombre]&ados=$mostrar[segundoapellido]&sexo=$mostrar[sexo]&telefono=$mostrar[telefono]&correo=$mostrar[correo]'>Editar</a>
									</button>

									<button class='pop-up-del'>Borrar<p>".$mostrar['idcoord']."</p></button>
									<div class='pop-up-borrar'>
										<div>
											<p>¿Esta seguro?</p>
											<button>
												<a class='toDelete' href='deletecoord.php?rn=replace'>Confirmar</a>
											</button>
											<br>
											<br>
											<input class= 'pop-up-cancel' type='button' value='Cancelar'>
										</div>
									</div>
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
					<p>Ya existe un usuario con esta identificacion</p>
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
	

		</body>
		<script src="../../pop-up.js"></script>
		</html>

		<?php include ('../main/searchbar.php')?>