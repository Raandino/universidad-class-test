<?php
include('../../conexion.php');
	
	//recuperar las variables
	$nombreMateria=$_POST['nombreMateria'];
	$grupo=$_POST['grupo'];
	$horaincio=$_POST['horainicio'];
	$horafinal=$_POST['horafinal'];

	$dia=$_POST['dia'];


	//Recuperamos el idmateria
	$recuperarID="SELECT idmateria as idmateria from materias where nombre='$nombreMateria'";
	$consulta = mysqli_query($conexion, $recuperarID);
	$array = mysqli_fetch_array($consulta);
	$idmateria= $array['idmateria'];

	



	$horario = "INSERT into hora_materia (horainicio, horfinal, idmateria, idgrupo,dia) values ('$horaincio', '$horafinal' , '$idmateria' , '$grupo', '$dia')";

	//verificamos la ejecucion
	if (mysqli_query($conexion, $horario) ){
	
		header("Location: https://universidad-class-test.herokuapp.com//Coordinador/horarioMaterias/materias.php");
			
	}
	else{
		echo"Error al insertar datos";
		
	}
?>