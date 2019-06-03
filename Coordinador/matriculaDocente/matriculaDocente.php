<?php 

include('../../conexion.php');
include('../../Login/iniciar.php');
$usuario = $_SESSION['usuario'];
include('../../validarsesion.php');
validarcoor($usuario,$conexion);
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
	<script src="../../pop-up.js"></script>

	<title>Matricula de Profesores</title>
</head>
<body>
<div id="container">
			<?php include ('../sidebarcoor.php')?>

		<div id="main">
				<div class="contenedor-tabla"> 
					<h2>Matricula de clases </h2>
					<input type="text" name="search" id="search" class="form-control" placeholder="Buscar en tabla" />  
					<br>
					<div class ='tableFixHead scroll' >
					<table class="tabla" id="buscador">
						<thead>
                            <tr>
                                <td>ID Docente</td>
                                <td>Materia</td>
                                <td>Hora inicio</td>
                                <td>Hora final</td>
								<td>Grupo</td>
								<td>Dia</td>
								<td>Aula</td>
								<td>Acciones</td>
                                
                                    
                            </tr>
						</thead>
                        <?php 
                        $sql="SELECT materia_docente.iddocente as iddocente, materias.nombre as nombre, hora_materia.horainicio as inicio, hora_materia.horfinal as final, materia_docente.idgrupo as grupo, hora_materia.dia as dia, hora_materia.aula as aula
                        from materia_docente, hora_materia, materias
                        where materia_docente.idmateria=hora_materia.idmateria and materia_docente.idmateria=materias.idmateria and materia_docente.idgrupo=hora_materia.idgrupo;";
                        $result=mysqli_query($conexion,$sql);

                        while($mostrar=mysqli_fetch_array($result)){
							echo "
							<tbody>
							<tr>
                            <td>".$mostrar['iddocente']."</td>
                            <td>".$mostrar['nombre']."</td>
                            <td>".$mostrar['inicio']."</td>
							<td>".$mostrar['final']."</td>
							<td>".$mostrar['grupo']."</td>
							<td>".$mostrar['dia']."</td>
							<td>".$mostrar['aula']."</td>
							
							
							<td>
							

							<button class='pop-up-del-multi'>Borrar<p>".$mostrar['nombre']."</p><p>".$mostrar['iddocente']."</p><p>".$mostrar['grupo']."</p></button>
							</td>
                        
							</tr>
							</tbody>
							<div class='pop-up-borrar'>
										<div>
											<p>¿Esta seguro?</p>
											<button>
												<a class='toDelete' href='deleteDocente.php?pn=replace&sc=replace2&gr=replace3'>Confirmar</a>
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
				
				</div>
			
			<div class="form col">
			<h2>Registrar</h2>	
				<form action="insertDocente.php" method="POST" autocomplete="off">
					<p>Docente</p>
					<br>
                    <select name="docente" required>
                        <option ></option>
                    <?php 
							$sqk="SELECT * from docentes";
                            $resulte=mysqli_query($conexion,$sqk);
                            
                            

							while($ensenar=mysqli_fetch_array($resulte)){
                                echo "
                               
                                    <option >".$ensenar['iddocente']."</option> 
                                    
                                
							";
									
                            ?>
                            <?php 
						}
						?>	
                    </select>
					<br>	
					<br>
					<p>Clase</p>
					
                    <br>
                    <select class='replace' name="nombre" onchange="change();" required>
                        <option ></option>
                    <?php 
							$sql="SELECT distinct materias.nombre as nombre from hora_materia, materias
							where materias.idmateria=hora_materia.idmateria and (hora_materia.idmateria, hora_materia.idgrupo ) not in (select idmateria,idgrupo from materia_docente);";
                            $result=mysqli_query($conexion,$sql);

							while($ensenar=mysqli_fetch_array($result)){
								$nombredemateria= $ensenar['nombre'];
							
                                echo "
								
                                    <option >".$nombredemateria."</option>       
                                
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
					<input name ="grupo" type="number" value="Grupo">
					<!---<select name="grupo" required>
                        <option ></option>

					<br>
					<?php 
							/*echo $_POST['change'];
							$change = $_POST['change'];
						
							$sql="SELECT idgrupo FROM materias, hora_materia WHERE materias.nombre = '$change';";*/
                           /* $result=mysqli_query($conexion,$sql);
                            
                            

							while($ensenar=mysqli_fetch_array($result)){
                                echo "
                               
                                    <option >".$ensenar['idgrupo']."</option>
                                    
                                
							";
						
								
						}*/
						?>
						 </select>	--->
					<div class="pop-up">
						<div >
							<p>¿Esta seguro?</p>
							<input href='insertDocente.php' type="submit" value="Confirmar">
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
	<?php include ('../../admin/main/searchbar.php')?>