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
	
	<title>Matricula</title>
</head>
<body>
<div id="container">
			<?php include ('../../sidebar.php')?>

		<div id="main">
				<div class="contenedor-tabla"> 
					<h2>Matricula de clases </h2>
					<input type="text" name="search" id="search" class="form-control" placeholder="Buscar en tabla" />  
					<br>
					<div class ='tableFixHead scroll' >
					<table class="tabla" id="buscador">
						<thead>
                            <tr>
                                <td>ID alumno</td>
                                <td>Materia</td>
                                <td>Hora inicio</td>
                                <td>Hora final</td>
								<td>grupo</td>
								<td>dia</td>
								<td>Acciones</td>
                                
                                    
                            </tr>
						</thead>
                        <?php 
                        $sql="SELECT materias_alumnos.idalumno as idalumno, materias.nombre as nombre, hora_materia.horainicio as inicio, hora_materia.horfinal as final, materias_alumnos.idgrupo as grupo, hora_materia.dia as dia
						from materias_alumnos, hora_materia, materias
						where materias_alumnos.idmateria=hora_materia.idmateria and materias_alumnos.idmateria=materias.idmateria and materias_alumnos.idgrupo=hora_materia.idgrupo;";
                        $result=mysqli_query($conexion,$sql);

                        while($mostrar=mysqli_fetch_array($result)){
							echo "
							<tbody>
							<tr>
                            <td>".$mostrar['idalumno']."</td>
                            <td>".$mostrar['nombre']."</td>
                            <td>".$mostrar['inicio']."</td>
							<td>".$mostrar['final']."</td>
							<td>".$mostrar['grupo']."</td>
							<td>".$mostrar['dia']."</td>
							
							
							<td>
							
							<button class='pop-up-del-multi'>Borrar<p>".$mostrar['idalumno']."</p><p>".$mostrar['grupo']."</p><p>".$mostrar['nombre']."</p></button>
							<div class='pop-up-borrar'>
										<div>
											<p>¿Esta seguro?</p>
											<button>
												<a class='toDelete' href='deletematricula.php?sc=replace&gr=replace2&pn=replace3'>Confirmar</a>
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
			
			<div class="form col">
			<h2>Registrar</h2>	
				<form action="insertmatricula.php" method="POST" autocomplete="off">
					<p>ID Alumno</p>
					
					<br>
					<input type="text" name="idalumno" placeholder="Id Alumno" maxlength="8">
					<br>	
					<br>
					
                    <br>
					<p>Clases disponibles</p>
                    <select name="nombre" required>
                        <option ></option>
                    <?php 
							$sql="SELECT distinct materias.nombre as nombre from hora_materia, materias where hora_materia.idmateria=materias.idmateria";
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
					
					<br>
					<input type="number" name="grupo" placeholder="No. Grupo" required>
					<br>
					<br>
					<div class="pop-up">
						<div >
							<p>¿Esta seguro?</p>
							<input href='insertmatricula.php' type="submit" value="Confirmar">
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
	<?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
                    <p>Ya Se Inscribio Esta Clase</p>
                    <input class='pop-up-cancel' type='button' value='Confirmar'>
                </div>
            </div> ";
	   }
	   if(isset($_GET["fallo2"]) && $_GET["fallo2"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
                    <p>La Clase Choca</p>
                    <input class='pop-up-cancel' type='button' value='Confirmar'>
                </div>
            </div> ";
	   }
	   if(isset($_GET["fallo3"]) && $_GET["fallo3"] == 'true')
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