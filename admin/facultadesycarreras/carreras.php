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
	
	<title>Carreras</title>
</head>
<body>
<div id="container">	
			<?php include ('../../sidebar.php')?>

		<div id="main">
				<div class="contenedor-tabla"> 
					<h2>Facultades y Carreras</h2>
					<input type="text" name="search" id="search" class="form-control" placeholder="Buscar en tabla" />  
					<br>
					<div class ='tableFixHead scroll' >
						<table class="tabla" id="buscador">
								<thead>
								<tr>
									<td>Id Facultad</td>
									<td>Facultad</td>
									<td>Id carrera</td>
									<td>Carrera</td>
									<td>Acciones</td>	
								</tr>
								</thead>

							<?php 
							$sql="SELECT distinct oferta_academica.idcarrera as id,   facultades.idfacultad as idfacultad, facultades.nombre_facultad as nombref, oferta_academica.idoferta as idcarrera, oferta_academica.nombre as nombrec 
							from facultades, oferta_academica
							where facultades.idfacultad = oferta_academica.idfacultad";
							$result=mysqli_query($conexion,$sql);

							while($mostrar=mysqli_fetch_array($result)){
								echo "
								<tbody>
								<tr>
								<td>".$mostrar['idfacultad']."</td>
								<td>".$mostrar['nombref']."</td>
                                <td>".$mostrar['idcarrera']."</td>
								<td>".$mostrar['nombrec']."</td>
								
								<td>
								<button class='pop-up-del' >Borrar<p>".$mostrar['idcarrera']."</p></button>
								<div class='pop-up-borrar'>
											<div>
											<p>¿Esta seguro?</p>
											<button>
											   <a class='toDelete' href='deleteCarrera.php?rn=replace'>Confirmar</a>
											   </button>
											   <br>
											   <br>
											   <input class= 'pop-up-cancel' type='button' value='Cancelar'>
										   </div>
										</div>
								</td>
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
			<h2>Registrar carrera</h2>	
				<form action="insertcarrera.php" method="POST" autocomplete="off" pattern="\S">
					<p>ID Carrera</p>
					<br>
					<input type="text" name="idcarrera" placeholder="ID Carrera"  required >
                    <br>

					<p>Nombre</p>		
					<br>
					<input type="text" name="nombre" placeholder="Nombre de la Carrera" maxlength="45"  required>
					<br>
					<br>

					<p>Pregrado o Posgrado</p>
					<select name="tipo" required>
                        <option ></option>
						<option>Pregrado</option>
						<option>Posgrado</option>
                	
                    </select>

						<br>
						<br>


					<p>Facultad</p>
                    <select name="nombreFac" required>
                        <option ></option>
                    <?php 
							$sql="SELECT * from facultades";
                            $result=mysqli_query($conexion,$sql);
                            
							while($ensenar=mysqli_fetch_array($result)){
                                echo "
                               
                                    <option >".$ensenar['nombre_facultad']."</option>
                                    
                                
							";
									
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
	<?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
                    <p>Error Al Registrar La Carrera</p>
                    <input class='pop-up-cancel' type='button' value='Confirmar'>
                </div>
            </div> ";
	   }
     ?>


	</body>
	<script src="../../pop-up.js"></script>
	</html>
	<?php include ('../main/searchbar.php')?>