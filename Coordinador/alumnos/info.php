<?php
include('../../conexion.php');
include('../../Login/iniciar.php');

$usuario = $_SESSION['usuario'];
include('../../validarsesion.php');
validarcoor($usuario,$conexion);

$idalumno =$_GET['id'];
$nombre =$_GET['nom'];
$apellido =$_GET['ap'];


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
	<title>Horario de Aumnos</title>
</head>
<body>
<div id="container">
			<?php include ('../sidebarcoor.php')?>

		<div id="main" >
				<div class="contenedor-tabla"> 
					<h2><?php echo $nombre,"   ",$apellido ?> </h2>
					<input type="text" name="search" id="search" class="form-control" placeholder="Buscar en tabla" />  
					<br>
					<table class="tabla" id="buscador">
						<thead>
                            <tr>
                                <td>Materia</td>
                                <td>Inicio</td>
                                <td>Final</td>
                                <td>Grupo</td>
								<td>dia</td>
								<td>nota</td>
								
                                
                                    
                            </tr>
						</thead>
                        <?php 
                        $sql="SELECT materias.idmateria as idmateria, materias.nombre as materia, hora_materia.horainicio as inicio, hora_materia.horfinal as final, materias_alumnos.idgrupo as grupo, hora_materia.dia as dia, notas.nota
						from materias_alumnos, hora_materia, materias, notas
						where materias_alumnos.idmateria=hora_materia.idmateria and materias_alumnos.idmateria=materias.idmateria and materias_alumnos.idgrupo=hora_materia.idgrupo 
						and notas.idalumno=materias_alumnos.idalumno and notas.idmateria=materias.idmateria and materias_alumnos.idalumno='$idalumno' ;";
                        $result=mysqli_query($conexion,$sql);

                        while($mostrar=mysqli_fetch_array($result)){
							echo "
							<tbody>
							<tr>
                            <td>".$mostrar['materia']."</td>
                            <td>".$mostrar['inicio']."</td>
                            <td>".$mostrar['final']."</td>
							<td>".$mostrar['grupo']."</td>
							<td>".$mostrar['dia']."</td>
							<td>".$mostrar['nota']."</td>
							
							
							
                        
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
	</div>


	</body>
	<script src="../../pop-up.js"></script>
	</html>
	<?php include ('../../admin/main/searchbar.php')?>