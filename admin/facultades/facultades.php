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
	
	<title>Facultades</title>
</head>
<body>
<div id="container">	
			<?php include ('../../sidebar.php')?>

		<div id="main">
				<div class="contenedor-tabla"> 
					<h2>Facultades</h2>
					<input type="text" name="search" id="search" class="form-control" placeholder="Buscar en tabla" />  
					<br>
					<div class ='tableFixHead scroll' >
						<table class="tabla" id="buscador">
								<thead>
								<tr>
									<td>Id Facultad</td>
									<td>Nombre</td>
									
									<td>Acciones</td>	
								</tr>
								</thead>

							<?php 
							$sql="SELECT * from facultades";
							$result=mysqli_query($conexion,$sql);

							while($mostrar=mysqli_fetch_array($result)){
								echo "
								<tbody>
								<tr>
								<td>".$mostrar['idfacultad']."</td>
								<td>".$mostrar['nombre_facultad']."</td>
                              
								
                                <td>
                                <button  >
                                <a  href='updatefacultades.php?rn=$mostrar[idfacultad]&sn=$mostrar[nombre_facultad]'>Editar</a>
                                </button>
								<button class='pop-up-del' >Borrar<p>".$mostrar['idfacultad']."</p></button>
								<div class='pop-up-borrar'>
											<div>
											<p>¿Esta seguro?</p>
											<button>
											   <a class='toDelete' href='deletefacultades.php?rn=replace'>Confirmar</a>
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
			<h2>Registrar Facultad</h2>	
				<form action="insert.php" method="POST" autocomplete="off" pattern="\S">
					<p>ID Facultad</p>
					<br>
					<input type="text" name="idfacultad" placeholder="ID Facultad" maxlength="6"  required >
                    <br>
                    <br>
					<p>Nombre</p>		
					<br>
					<input type="text" name="nombre" placeholder="Nombre de la Facultad" maxlength="45"  required>
					<br>
					<br>

					

                    <br>
					<br>
					<div class="pop-up">
						<div >
							<p>¿Esta seguro?</p>
							<input href='insert.php' type="submit" value="Confirmar">
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
                    <p>Error Al Registrar La Facultad</p>
                    <input class='pop-up-cancel' type='button' value='Confirmar'>
                </div>
            </div> ";
	   }
	   if(isset($_GET["fallo2"]) && $_GET["fallo2"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
                    <p>Aun Hay Carreras Pertenecientes De Esta Facultad</p>
                    <input class='pop-up-cancel' type='button' value='Confirmar'>
                </div>
            </div> ";
	   }
     ?>


	</body>
	<script src="../../pop-up.js"></script>
	</html>
	<?php include ('../main/searchbar.php')?>