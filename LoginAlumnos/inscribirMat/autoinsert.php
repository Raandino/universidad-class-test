<?php
include('../../conexion.php');
include('../../Login/iniciar.php');

$usuario = $_SESSION['usuario']; //id del alumno

	$idmateria=$_GET['rn']; //id de la materia
    $grupo=$_GET['gr']; //grupo de la materia
	$horainicio= $_GET['ini'];
	$horafinal= $_GET['fin'];
	$dia= $_GET['dia'];

	$sionopre = "SELECT count(*) as siono from materias where idmateria='$idmateria' and  nombre not in(SELECT nombre from materias where prerequisito != 0) ;";
	$consultsiono = mysqli_query($conexion, $sionopre);
	$arraysiono = mysqli_fetch_array($consultsiono);

	if($arraysiono['siono'] ==1)
	{
			//Consulta para verificar si la hora y dia estan disponibles para un estudiante
			$sinchoque = "SELECT count(*) as sinchoque FROM  materias, hora_materia, materias_alumnos 
			WHERE (hora_materia.horainicio BETWEEN cast('$horainicio' AS time) and cast('$horafinal' AS time)  or
			hora_materia.horfinal BETWEEN cast('$horainicio' AS time) and cast('$horafinal' AS time) )
			and hora_materia.dia='$dia' 
			and materias_alumnos.idalumno='$usuario' and materias.idmateria = hora_materia.idmateria and materias.idmateria= materias_alumnos.idmateria and materias_alumnos.idgrupo=hora_materia.idgrupo";
			
			$consultad = mysqli_query($conexion, $sinchoque);
			$arrayd = mysqli_fetch_array($consultad);

			if($arrayd['sinchoque']==0)
			{
					$sql="INSERT INTO materias_alumnos(idmateria, idalumno, idgrupo) VALUES('$idmateria','$usuario','$grupo')";
					//verificamos la ejecucion
					if(mysqli_query($conexion, $sql)){
						header("Location: http://localhost:8080/formulario/LoginAlumnos/inscribirMat/inscribirMat.php");
							
					}
					else{
						header("Location: http://localhost:8080/formulario/LoginAlumnos/inscribirMat/inscribirMat.php?fallo=true");
				
						
					}
			}
			else 
			{
				header("Location: http://localhost:8080/formulario/LoginAlumnos/inscribirMat/inscribirMat.php?fallo2=true");
			
			}
	}
	else 
	{
			

	//id del prerequisito de la materia
	$idpre = "SELECT prerequisito as pre from materias where idmateria='$idmateria';";
	$consultap = mysqli_query($conexion, $idpre);
	$arrayp = mysqli_fetch_array($consultap);
	$idprerequisito= $arrayp['pre']; //id del prerequisito

	$verpre = "SELECT count(*) as validacion from notas where idalumno='$usuario' and idmateria='$idprerequisito'/*prerequisito*/ and nota>=70;";
	$consult = mysqli_query($conexion, $verpre);
	$arrayt = mysqli_fetch_array($consult);


	if ($arrayt['validacion']==1)
	{
					//Consulta para verificar si la hora y dia estan disponibles para un estudiante
				$sinchoque = "SELECT count(*) as sinchoque FROM  materias, hora_materia, materias_alumnos 
				WHERE (hora_materia.horainicio BETWEEN cast('$horainicio' AS time) and cast('$horafinal' AS time)  or
				hora_materia.horfinal BETWEEN cast('$horainicio' AS time) and cast('$horafinal' AS time) )
				and hora_materia.dia='$dia' 
				and materias_alumnos.idalumno='$usuario' and materias.idmateria = hora_materia.idmateria and materias.idmateria= materias_alumnos.idmateria and materias_alumnos.idgrupo=hora_materia.idgrupo";
				
				$consultad = mysqli_query($conexion, $sinchoque);
				$arrayd = mysqli_fetch_array($consultad);

				if($arrayd['sinchoque']==0)
				{
						$sql="INSERT INTO materias_alumnos(idmateria, idalumno, idgrupo) VALUES('$idmateria','$usuario','$grupo')";
						//verificamos la ejecucion
						if(mysqli_query($conexion, $sql)){
							header("Location: http://localhost:8080/formulario/LoginAlumnos/inscribirMat/inscribirMat.php");
								
						}
						else{
							header("Location: http://localhost:8080/formulario/LoginAlumnos/inscribirMat/inscribirMat.php?fallo=true");
					
							
						}
				}
				else 
				{
					header("Location: http://localhost:8080/formulario/LoginAlumnos/inscribirMat/inscribirMat.php?fallo2=true");
				
				}
	}
	else{ echo"No ha aprobado el prerequisito para esta clase"; }
	}











	


?>