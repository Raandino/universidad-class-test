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
		
		<title>Alumnos</title>
	</head>
	<body>


	<div id="container">
	
	<?php include ('../../sidebar.php')?>

			<div id="main">

				<div class="form col">
				
			
				<h2>Registrar</h2>	
				<form action="guardar.php" method="POST" autocomplete="off" pattern="\S">
					<p>CIF</p>
					
					<input type="text" name="cif" placeholder="CIF" minlength="8" maxlength="8" pattern="^[0-9]*$" required oninvalid="this.setCustomValidity('Deben ser 8 numeros')" oninput="this.setCustomValidity('')">
					<br>
					<br>
					<p>Nombres</p>
			
					<input type="text" name="nombre" placeholder="Primer nombre" maxlength="25" pattern="[A-Za-z]+" required>
					<br> <br> 
					<input type="text" name="segundoNombre" placeholder="Segundo nombre" maxlength="25" pattern="[A-Za-z]+" >
					<br><br>
					<p>Apellido</p>
					<input type="text" name="apellido" placeholder="Primer apellido" maxlength="25" required>
						<br>
						<br>
					<input type="text" name="segundoApellido" placeholder="Segundo apellido" maxlength="25" required>
					<br><br>

					<p>Sexo<p>
					<select name="sexo" required>
                        <option ></option>
						<option>Masculino</option>
						<option>Femenino</option>
						<option>Indefinido</option>
                    </select>
					<br><br>
					<p>Correo</p>
					<input type="email" name="correo" placeholder="Correo Electronico" maxlength="30" required>
					<br><br>

					<p>Celular</p>
					<input type="text" name="celular" placeholder="Numero de Celular" maxlength="11" pattern="[0-9]{11}"  >
					<br><br>
						<p>Seleccione una carrera</p>
						<select name="carrera" required flex>
                        <option value=""> </option>
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
							<input class= "pop-up-cancel" type="button" value="Cancelar">
							</div>
						</div>
						


						
					</form>
					<br>
					<button class="pop-up-activate">Enviar</button>
				</div> 
			
		</div>
		
	
		<?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
					<p>Ya existe un alumnno con esta identificacion</p>
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