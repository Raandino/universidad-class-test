<?php
include('../../conexion.php');
	
	//recuperar las variables
	$nombreMateria=$_POST['nombreMateria'];
	$grupo=$_POST['grupo'];
	$horaincio=$_POST['horainicio'];
	$horafinal=$_POST['horafinal'];
	$dia=$_POST['dia'];
	$aula=$_POST['aula'];

	
	
		//Consulta para verificar si la hora y dia estan disponibles para un aula
		$sinchoque = "SELECT count(*) as sinchoque from hora_materia where (horainicio BETWEEN cast('$horaincio' AS time) and cast('$horafinal' AS time)  or
		horfinal BETWEEN cast('$horaincio' AS time) and cast('$horafinal' AS time) )
		and hora_materia.dia='$dia' and aula='$aula' ;";
		
		$consultad = mysqli_query($conexion, $sinchoque);
		$arrayd = mysqli_fetch_array($consultad);

		if($arrayd['sinchoque']==0)
		{
			if ($horaincio<$horafinal)
			{
				
			//Recuperamos el idmateria
			$recuperarID="SELECT idmateria as idmateria from materias where nombre='$nombreMateria'";
			$consulta = mysqli_query($conexion, $recuperarID);
			$array = mysqli_fetch_array($consulta);
			$idmateria= $array['idmateria'];
		
			$horario = "INSERT into hora_materia (horainicio, horfinal, idmateria, idgrupo,dia,aula) values ('$horaincio', '$horafinal' , '$idmateria' , '$grupo', '$dia','$aula')";
		
			//verificamos la ejecucion
			if (mysqli_query($conexion, $horario) ){
			
				header("Location: https://universidad-class-test.herokuapp.com/Coordinador/horarioMaterias/materias.php");
					
			}
			else{
				header("Location: https://universidad-class-test.herokuapp.com/Coordinador/horarioMaterias/materias.php?fallo=true");
				
			}	
			}
			else { 
				header("Location: https://universidad-class-test.herokuapp.com/Coordinador/horarioMaterias/materias.php?fallo3=true");}//horas no son validas
		}
		else {
			header("Location: https://universidad-class-test.herokuapp.com/Coordinador/horarioMaterias/materias.php?fallo4=true");//el aula seleccionada ya esta ocupada en esas horas
		}
	
	

?>