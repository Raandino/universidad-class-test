<?php
include('../../conexion.php');
include('../../Login/iniciar.php');
	
	//recuperar las variables
	$codigo=$_POST['codigo'];
	$nombre=$_POST['nombre'];
	$prereq=$_POST['prerequisito'];
	
		//Pasar el nombre de la facultad a id
		$recuperarID="SELECT idmateria from materias where nombre='$prereq';";
		$consulta = mysqli_query($conexion, $recuperarID);
		$array = mysqli_fetch_array($consulta);
		$idpre= $array['idmateria'];


	//hacemos la sentencia de sql
	$sql="INSERT into materias (codigo, nombre, prerequisito) VALUES('$codigo','$nombre','$idpre')";
	
	
	if(mysqli_query($conexion, $sql)){
		header("Location: http://localhost:8080/formulario/admin/Clases/clases.php");
	}
	else{
		header("Location: http://localhost:8080/formulario/admin/Clases/clases.php?fallo=true");
	
		
	}
	

?>