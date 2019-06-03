<?php 
		include('../../conexion.php');
		include('../../Login/iniciar.php');

		$usuario = $_SESSION['usuario'];
		
		include('../../validarsesion.php');
		validarcoor($usuario,$conexion);
		//idcoordinador a idcarrera
		$recuperarID="SELECT idcarrera from coordinadores where idcoordinador='$usuario';";
		$consulta = mysqli_query($conexion, $recuperarID);
		$array = mysqli_fetch_array($consulta);
		$idcar= $array['idcarrera'];
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
						<h2>Clases y Semestres</h2>
						<input type="text" name="search" id="search" class="form-control" placeholder="Buscar en tabla" />  
						<br>
						<div class ='tableFixHead scroll' >
							<table class="tabla" id="buscador">
								<thead>
									<tr>
										<td >Materia</td>
										<td>Carrera</td>
										<td>Semestre</td>
										
										<td>Acciones</td>	
									</tr>
								</thead>
								<?php 
								$sql="SELECT distinct materias.nombre as idmateria, oferta_academica.nombre as idcarrera, pensum.semestre as semestre 
								from pensum, materias, oferta_academica, coordinadores
								where oferta_academica.idcarrera=pensum.idcarrera and pensum.idmateria=materias.idmateria and coordinadores.idcarrera=oferta_academica.idcarrera and coordinadores.idcoordinador='$usuario';";
								$result=mysqli_query($conexion,$sql);

								while($mostrar=mysqli_fetch_array($result)){
									echo "
									<tbody>
									<tr>
									<td>".$mostrar['idmateria']."</td>
									<td>".$mostrar['idcarrera']."</td>
									<td>".$mostrar['semestre']."</td>
								
									<td>
									<button class='pop-up-del-multi'>Borrar<p>".$mostrar['idmateria']."</p><p>".$mostrar['idcarrera']."</p><p>".$mostrar['semestre']."</p></button>

									<div class='pop-up-borrar'>
										<div>
											<p>¿Esta seguro?</p>
											<button>
												<a class='toDelete' href='deleteClase.php?rn=replace&sn=replace2&pn=replace3'>Confirmar</a>
											</button>
											<br>
											<br>
											<input class= 'pop-up-cancel' type='button' value='Cancelar'>
										</div>
									</div>
									</td>
									
									</tr>
									
									
									</tbody>";
										
								?>
								
							<?php 
							}
							?>	
						</table>
						</div>
					
					</div>
				
				<div class="form col">
				<h2>Registrar</h2>	
				<form action="insertClase.php" method="POST" autocomplete="off" pattern="\S">
                            
                        <p>Materia</p>    
						<select name="materia" required flex>
                        <option required></option>
							<?php 
									$sql="SELECT idmateria, nombre from materias where idmateria not in (
									select materias.idmateria
									 from pensum, materias where pensum.idcarrera='$idcar' and pensum.idmateria=materias.idmateria);";
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
                            <br>

                            <p>Semestre</p>
					<select name="semestre" required>
                        <option></option>
						<option>Semestre I</option>
                        <option>Semestre II</option>
                        <option>Semestre III</option>
                	
                    </select>
                    <br>
                    <br>

                        <p>Carrera</p>    
						
                        <option required></option>
							<?php 
									$sql="SELECT oferta_academica.nombre from coordinadores, oferta_academica
									where coordinadores.idcarrera=oferta_academica.idcarrera and coordinadores.idcoordinador = '$usuario';";
									$result=mysqli_query($conexion,$sql);
								
									
									while($ensenar=mysqli_fetch_array($result)){
										echo "
									
											<input class='idnone' name='carrera' value='".$ensenar['nombre']."' >
											<p>".$ensenar['nombre']."</p>
										
									"
											
									?>
									<?php 
								}
								?>	
							</select>
                        <br>
						<br>

						<div class="pop-up">
							<div >
							<p>¿Esta seguro?</p>
							<input href='insertClase.php' type="submit" value="Confirmar">
							
							<br>
							<input class= "pop-up-cancel" type="button" value="Cancelar">
							</div>
						</div>
						


						
					</form>
					
					<button class="pop-up-activate">Enviar</button>
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