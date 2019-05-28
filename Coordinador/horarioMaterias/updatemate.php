<?php
	include('../../conexion.php');
error_reporting(0);

$_GET['rn']; // ID DE LA MATERIA
$_GET['sn'];   //Nombre de la materia 
$_GET['gr'];   //Grupo de la materia
$_GET['ini'];   //Hora inicio de la materia
$_GET['fin'];   //Hora final de la materia
$_GET['dia'];   //Dia de la materia


?>

<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../estilo.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
    </head>
    <body >

    <div class="container">
    
    </div>
        <h1 id="h1conf">Actualizar tabla Materias</h1>
        <br>
    <div class="form col" >
    <form action="" method="GET" autocomplete="off"  >
		<p>ID Materia</p>
        <input class="idnone" type="text" name="idmateria" placeholder="idmateria" maxlength="8" required value="<?php echo $_GET['rn']; ?>" >
        <p> <?php echo $_GET['rn']; ?> </p>
        <br>

        <p> <?php echo $_GET['sn']; ?> </p>
        <input class="idnone" type="text" name="nombre" placeholder="Primer nombre" maxlength="45" required value="<?php echo $_GET['sn']; ?>">
        <br>
	
        <p>Grupo</p>
        <p> <?php echo $_GET['gr']; ?> </p>
        <input class="idnone" type="text" name="grupo" placeholder="Primer nombre" maxlength="45" required value="<?php echo $_GET['gr']; ?>">
        <br>
        <p>Hora inicio</p>
        <input  type="time" name="horainicio"   required value="<?php echo $_GET['ini']; ?>">
        <br>
		<br>

        <p>Hora Final</p>
        <input  type="time" name="horafinal" required value="<?php echo $_GET['fin']; ?>">
        <br>
		<br>

        <p>Dia</p>
        <input  type="text" name="dia" maxlength="10" required value="<?php echo $_GET['dia']; ?>">
        <br>
		<br>
		<input type="submit" name="submit" value="Actualizar"/>
    </form>
    </div>
        <?php
        if($_GET['submit'])
        {
            $idmateria = $_GET['idmateria'];
            $grupo = $_GET['grupo'];
            $horainicio = $_GET['horainicio'];
            $horafinal = $_GET['horafinal'];
            $dia = $_GET['dia'];

            $query ="UPDATE hora_materia SET horainicio='$horainicio', horfinal='$horafinal', dia='$dia' where idmateria='$idmateria' and idgrupo='$grupo' ";
            $data = mysqli_query($conexion, $query);
            if($data)
            {
                
                header("Location: https://universidad-class-test.herokuapp.com//Coordinador/horarioMaterias/materias.php");
            }
            else{
               echo"Error al hacer update";
            }
        }
      
        ?>
        <style>
        body{
            background-color:rgb(21, 32, 43);
        }
        </style>    
        
    </body>
</html>