<?php
	include('../../conexion.php');
error_reporting(0);

$_GET['rn'];
$_GET['sn'];
$_GET['cl'];
$_GET['ndos']; //segundo nombre
$_GET['ados']; //segundo apellido
$_GET['sexo']; //sexo
$_GET['telefono']; //telefono
$_GET['correo']; //correo
$_GET['cl']; //apellido

?>

<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../estilo.css">
    <link rel="stylesheet" type="text/css" href="../../pop-up.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
    </head>
    <body >

    <div class="container">
    </div>
        <h1 id="h1conf">Actualizar Tabla Docentes</h1>
        <br>
    <div class="formcontra col" >
    <form action="" method="GET" autocomplete="off"  >
		<p>ID Docente</p>
	
        <input class="idnone" type="text" name="iddocente" placeholder="iddocente" maxlength="8" required value="<?php echo $_GET['rn']; ?>">
        <p> <?php echo $_GET['rn']; ?> </p>
        <br>
        
		<p>Nombres</p>
		
        <input type="text" name="nombre" placeholder="Primer nombre" maxlength="45" required value="<?php echo $_GET['sn']; ?>">
        <br><br>
        <input type="text" name="segundoNombre" placeholder="Segundo nombre" maxlength="25" pattern="[A-Za-z]+" required required value="<?php echo $_GET['ndos']; ?>">
        <br><br>

		<p>Apellidos</p>
		<input type="text" name="apellido" placeholder="Apellido" maxlength="45" required value="<?php echo $_GET['cl']; ?>">
		<br><br>
        <input type="text" name="segundoapellido" placeholder="Apellido" maxlength="45" required value="<?php echo $_GET['ados']; ?>">
        <br><br>

        <p>Telefono</p>
		<input type="text" name="telefono"  maxlength="11" pattern="[0-9]{11}" required value="<?php echo $_GET['telefono']; ?>">
		<br><br>

        <p>Correo</p>
		<input type="email" name="correo"  maxlength="45" required value="<?php echo $_GET['correo']; ?>">
		<br><br>
		<div class="pop-up">
			<div >
				<p>¿Esta seguro?</p>
				<input type="submit" name="submit" value="Confirmar"/>
					
				<br>
				<input class= "pop-up-cancel" type="button" value="Cancelar">
			</div>
		</div>
    </form>
    <button class="pop-up-activate">Actualizar</button>
    </div>
        <?php
        if($_GET['submit'])
        {
            $iddocente = $_GET['iddocente'];
            $nombre = $_GET['nombre'];
            $segundonombre = $_GET['segundoNombre'];
            $apellido = $_GET['apellido'];
            $segundoapellido = $_GET['segundoapellido'];
            $telefono = $_GET['telefono'];
            $correo = $_GET['correo'];
            $carrera = $_GET['carrera'];



            $query ="UPDATE docentes SET   nombre= '$nombre', apellido='$apellido', segundoNombre='$segundonombre', segundoApellido='$segundoapellido', correo='$correo', telefono='$telefono' WHERE iddocente='$iddocente' or nombre= '$nombre' or apellido='$apellido'  ";
            $data = mysqli_query($conexion, $query);
            if($data)
            {
                header("Location: https://universidad-class-test.herokuapp.com/admin/profesores/profesores.php");
            }
            else{
                header("Location: https://universidad-class-test.herokuapp.com/admin/profesores/updateprofes.php?fallo=true");
            }
        }
      
        ?>
        <?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
                    <p>No Se Pudo Actualizar</p>
                    <input class='pop-up-cancel' type='button' value='Confirmar'>
                </div>
            </div> ";
	   }
     ?>
        <style>
        body{
            background-color:rgb(21, 32, 43);
        }
        </style>    
        
    </body>
    <script src="../../pop-up.js"></script>
</html>