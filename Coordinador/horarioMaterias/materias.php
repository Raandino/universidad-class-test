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
	
	<title>Materias</title>
</head>
<body>
<div id="container">
		<?php include ('../sidebarcoor.php')?>

		<div id="main">
				<div class="contenedor-tabla"> 
					<h2>Tabla Materias</h2>
					<input type="text" name="search" id="search" class="form-control" placeholder="Buscar en tabla" />  
					<br>
						<table class="tabla" id="buscador">
								<thead>
								<tr>
									<td>Id Materia</td>
									<td>Nombre</td>
								
									<td>Hora de inicio</td>
									<td>Hora Final</td>
									<td>Dia</td>
									<td>Grupo</td>
									<td>Acciones</td>
										
								</tr>
								</thead>
							<?php 
							$sql="SELECT materias.idmateria as idmateria, materias.nombre as nombre, hora_materia.horainicio as inicio, hora_materia.horfinal as final , hora_materia.dia as dia, hora_materia.idgrupo as grupo
							from hora_materia, materias
							where materias.idmateria=hora_materia.idmateria;";
							$result=mysqli_query($conexion,$sql);

							while($mostrar=mysqli_fetch_array($result)){
								echo "
								<tbody>
								<tr>
								<td>".$mostrar['idmateria']."</td>
								<td>".$mostrar['nombre']."</td>
								<td>".$mostrar['inicio']."</td>
								<td>".$mostrar['final']."</td>
								<td>".$mostrar['dia']."</td>
								<td>".$mostrar['grupo']."</td>
								

								<td>
								<button >
								<a  href='updatemate.php?rn=$mostrar[idmateria]&sn=$mostrar[nombre]&gr=$mostrar[grupo]&ini=$mostrar[inicio]&fin=$mostrar[final]&dia=$mostrar[dia]'>Editar</a>
								</button>

								<button class='pop-up-del'>
								<a>Borrar</a>
								</button>
								</td>
								
								</tr>
								</tbody>
								<div class='pop-up-borrar'>
										<div>
											<p>¿Esta seguro?</p>
											<button class='pop-up-del'>
												<a href='deletemate.php?id=$mostrar[idmateria]&hi=$mostrar[inicio]&hf=$mostrar[final]&dia=$mostrar[dia]&gp=$mostrar[grupo]'>Confirmar</a>
											</button>
											<br>
											<br>
											<input class= 'pop-up-cancel' type='button' value='Cancelar'>
										</div>
									</div>";
									
							?>
							
						<?php 
						}
						?>	
                    </table>
				
				</div>
			
			<div class="form col">
			<h2>Registrar</h2>	
			<br>
				<form action="insertmate.php" method="POST" autocomplete="off">
					
				<p>Nombre de la Materia</p>	
	
					<select name="nombreMateria">
                        <option >--Materias Disponibles--</option>
                    <?php 
							$sql="SELECT * from materias";
                            $result=mysqli_query($conexion,$sql);
                            
							while($ensenar=mysqli_fetch_array($result)){
                                echo "
                                    <option >".$ensenar['nombre']."</option>
							";
									
                            ?>
                            <?php 
						}
						?>	
                    </select>
					<br>
					<br>

					<p>Grupo</p>
					<input type="number" name="grupo" placeholder="Grupo" maxlength="5"  required>
					<br>
					<br>

					<p>Hora de inicio</p>
					<input type="time" name="horainicio" placeholder="Hora de inicio" maxlength="15"  required>
					<br>
					<br>

					<p>Hora Final</p>
					<input type="time" name="horafinal" placeholder="Hora Final" maxlength="15"  required>
					<br>
					<br>

					<p>Dia</p>
						<select name="dia">
						<option>--Dias diponibles--</option>
						<option>Lunes</option>
						<option>Martes</option>
						<option>Miercoles</option>
						<option>Jueves</option>
						<option>Viernes</option>
						</select>
					
					<br>
					<br>

					
			

					<div class="pop-up">
						<div >
							<p>¿Esta seguro?</p>
							<input href='insertcarrera.php' type="submit" value="Confirmar">
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


	</body>
	<script src="../../pop-up.js"></script>
	</html>
	<?php include ('../main/searchbar.php')?>