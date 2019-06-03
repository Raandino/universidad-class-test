<?php
include('../../conexion.php');
	
	//recuperar las variables
	$iddocente=$_POST['docente'];
	$nombre=$_POST['nombre']; //nombre de la materia
	$grupo=$_POST['grupo'];

	//Pasar el nombre de la materia a id
	$recuperarID="SELECT idmateria as idmateria from materias where nombre='$nombre'";
	$consulta = mysqli_query($conexion, $recuperarID);
	$array = mysqli_fetch_array($consulta);
    $idmateria= $array['idmateria'];
    
	//Primera consulta para obtener la hora y dia de la materia
	$cdh="SELECT horainicio as inicio, horfinal as final,dia as dia from hora_materia where idmateria='$idmateria' and idgrupo='$grupo'";
	$consultahdm = mysqli_query($conexion, $cdh);
	$array = mysqli_fetch_array($consultahdm);
	$horainicio= $array['inicio'];
	$horafinal= $array['final'];
	$dia= $array['dia'];

	//Verificar si la clase y el grupo existen
	$existencia = "SELECT count(*) as existencia from hora_materia where idmateria='$idmateria' and idgrupo='$grupo'; ";
	
	$consultados = mysqli_query($conexion, $existencia);
	$arraydos = mysqli_fetch_array($consultados);

	if($arraydos['existencia']==1)
	{
			
			//Consulta para verificar si la hora y dia estan disponibles para un docente
			$sinchoque = "SELECT count(*) as sinchoque FROM  materias, hora_materia, materia_docente 
			WHERE (hora_materia.horainicio BETWEEN cast('$horainicio' AS time) and cast('$horafinal' AS time)  or
			hora_materia.horfinal BETWEEN cast('$horainicio' AS time) and cast('$horafinal' AS time) )
			and hora_materia.dia='$dia' 
			and materia_docente.iddocente='$iddocente' and materias.idmateria = hora_materia.idmateria and materias.idmateria= materia_docente.idmateria and materia_docente.idgrupo=hora_materia.idgrupo";
			
			$consultad = mysqli_query($conexion, $sinchoque);
			$arrayd = mysqli_fetch_array($consultad);

			if($arrayd['sinchoque']==0)
			{
				
						//hacemos la sentencia de sql
					$sql="INSERT INTO materia_docente(idmateria, iddocente, idgrupo) VALUES('$idmateria','$iddocente','$grupo')";
					//verificamos la ejecucion
					if(mysqli_query($conexion, $sql)){
						header("Location: http://localhost:8080/formulario/Coordinador/matriculaDocente/matriculaDocente.php");
							
					}
					else{
						header("Location: http://localhost:8080/formulario/Coordinador/matriculaDocente/matriculaDocente.php?fallo=true");
						
					}
			}
			else 
			{
				header("Location: http://localhost:8080/formulario/Coordinador/matriculaDocente/matriculaDocente.php?fallo2=true");
			}
	}
	else 
	{
		echo"El grupo de la materia seleccionada no existe";
	}




	
?>