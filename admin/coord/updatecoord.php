<?php
    include('../../conexion.php');
    include('../../Login/iniciar.php');
error_reporting(0);

$_GET['rn']; //idcoordinador
$_GET['sn']; //nombre
$_GET['cl']; //apellido
$_GET['car']; //nombre de la carrera


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

 
        <h1 id="h1conf">Actualizar Coordinadores</h1>
        <br>
    <div class="form col" >
    <form action="" method="GET" autocomplete="off"  >
		<p>ID</p>
		<br>
        <input type="text" name="id" placeholder="CIF" maxlength="8" required value="<?php echo $_GET['rn']; ?>" DISABLED>
       
        
		<p>Nombre</p>
		<br>
        <input type="text" name="nombre" placeholder="Primer nombre" maxlength="45" required value="<?php echo $_GET['sn']; ?>">
        
		<p>Apellido</p>
		<br>
		<input type="text" name="apellido" placeholder="Apellido" maxlength="45" required value="<?php echo $_GET['cl']; ?>">
		<br>
        <br>
        <select name="carrera" required>
                        <option required>--Carreras Disponibles--</option>
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
		<br>
		<input type="submit" name="submit" value="Actualizar"/>
    </form>
    </div>
    <?php
        if($_GET['submit'])
        {
        $recuperarID="SELECT idcarrera as idcarrera from oferta_academica where nombre='$carrera'";
	    $consulta = mysqli_query($conexion, $recuperarID);
	    $array = mysqli_fetch_array($consulta);
        $idcarrera= $array['idcarrera'];
    
            $idcoord = $_GET['id'];
            $nombre = $_GET['nombre'];
            $apellido = $_GET['apellido'];
           
            $query ="UPDATE coordinadores SET  nombre= '$nombre', apellido='$apellido' WHERE idcoordinador='$idcoord' OR nombre='$nombre' or apellido ='$apellido' ";
           

            //$data = mysqli_query($conexion, $sqk) && mysqli_query($conexion, $query);
            if(mysqli_query($conexion, $query))
            {
                header("Location: http://localhost:8080/formulario/admin/coord/coord.php");
            }
            else{
               echo "No se pudo actualizar";
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

