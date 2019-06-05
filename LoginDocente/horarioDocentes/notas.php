<?php 

include('../../conexion.php');
include('../../Login/iniciar.php');
 
$usuario = $_SESSION['usuario'];
$clave=$_SESSION['clave'];
include('../../validarsesion.php');
validarprofe($usuario,$conexion);
$materia = $_GET['rn'];
$grupo = $_GET['gr'];
//Pasar el nombre de la materia a su id
$recuperarID="SELECT idmateria as idmateria from materias where nombre='$materia'";
	$consulta = mysqli_query($conexion, $recuperarID);
	$array = mysqli_fetch_array($consulta);
	$idmateria= $array['idmateria'];

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
	
	<title>Asignacion De Notas</title>
</head>
<body>
<div id="container">
			<?php include ('../sidebarDoc.php')?>

		<div id="main" >
				<div class="contenedor-tabla"> 
					<h2>Asignar Notas </h2>
					<input type="text" name="search" id="search" class="form-control" placeholder="Buscar" />  
					<br>
					<table class="tabla" id="buscador">
						<thead>
                            <tr>
								<td>CIF</td>
                                <td>Nombre</td>
								<td>Segundo Nombre</td>
                                <td>Apellido</td>
								<td>Segundo Apellido</td>
                                <td>Materia</td>
                                <td>Grupo</td>
								<td>Nota</td>
                                <td>Nueva nota</td>
					
                                
                                    
                            </tr>
						</thead>
                        <?php 
                        $sql="SELECT distinct alumnos.nombre as alumno, alumnos.segundoNombre as segundonombre, alumnos.idalumno as id, alumnos.apellido as apellido, alumnos.segundoApellido as segundoapellido, materias.nombre as materia,materias.idmateria as idmateria,notas.idgrupo as grupo, notas.nota as nota
						from notas , materias, alumnos, materia_docente
						where notas.idmateria=materias.idmateria and notas.idalumno = alumnos.idalumno and materia_docente.idmateria=materias.idmateria and
						materia_docente.iddocente ='$usuario' and notas.idmateria='$idmateria' and notas.idgrupo='$grupo';";
                        $result=mysqli_query($conexion,$sql);

                        while($mostrar=mysqli_fetch_array($result)){
							echo " 
							
							<tbody>
							<tr>
							<td>".$mostrar['id']."</td>
							<td>".$mostrar['alumno']."</td>
							<td>".$mostrar['segundonombre']."</td>
							<td>".$mostrar['apellido']."</td>
							<td>".$mostrar['segundoapellido']."</td>
                            <td>".$mostrar['materia']."</td>
							<td>".$mostrar['grupo']."</td>
                            <td>".$mostrar['nota']."</td>
							<td> <form action='updatenota.php' method='POST'>
							<input type='text' name='id' id='hidden' value=".$mostrar['id']." > 
							<input type='text' name='grupo' id='hidden' value=".$mostrar['grupo']." > 
							<input type='text' name='idmateria' id='hidden' value=".$mostrar['idmateria']." > 
							<input type='text' name='nombreMateria' id='hidden' value='$materia' >
							 
							<input type='number' step='0.01' min='0' max='100' name='nota'required> 
							<button type='submit'>
							Devolver Nota
							</button>
							</form> </td>
							
						
							
							
							
							
                        
							</tr>
							</tbody>
							";

       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
                    <p>No Se Pudo Devolver Nota</p>
                    <input class='pop-up-cancel' type='button' value='Confirmar'>
                </div>
            </div> ";
	   }
                                
                        ?>
                        
                    <?php 
                    }
                    ?>
                    </table>
				
				</div>
			
			
	</div>
	</div>
<style>
 #hidden{
	 display: none
 }
</style>

	</body>
	<script src="../../pop-up.js"></script>
	</html>
	<?php include ('../../admin/main/searchbar.php')?>