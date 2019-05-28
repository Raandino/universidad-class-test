<?php
	include('../../conexion.php');
error_reporting(0);

$_GET['rn'];
$_GET['sn'];


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
		<br>
        <input type="text" name="idmateria" placeholder="idmateria" maxlength="8" required value="<?php echo $_GET['rn']; ?>" >
        
		<p>Nombre</p>
		<br>
        <input type="text" name="nombre" placeholder="Primer nombre" maxlength="45" required value="<?php echo $_GET['sn']; ?>">
        <br>
		<br>
		<input type="submit" name="submit" value="Actualizar"/>
    </form>
    </div>
        <?php
        if($_GET['submit'])
        {
            $idmateria = $_GET['idmateria'];
            $nombre = $_GET['nombre'];
         

            $query ="UPDATE materias SET  nombre= '$nombre' WHERE idmateria='$idmateria' or nombre='$nombre' ";
            $data = mysqli_query($conexion, $query);
            if($data)
            {
                header("Location: https://universidad-class-test.herokuapp.com/admin/horarioMaterias/materias.php");
            }
            else{
                header("Location: https://universidad-class-test.herokuapp.com/admin/horarioMaterias/materias.php");
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