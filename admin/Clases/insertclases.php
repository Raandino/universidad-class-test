<?php
include('../../conexion.php');
include('../../Login/iniciar.php');
	
	//recuperar las variables
	$codigo=$_POST['codigo'];
	$nombre=$_POST['nombre'];
	


	//hacemos la sentencia de sql
	$sql="INSERT into materias (codigo, nombre) VALUES('$codigo','$nombre')";
	
	if(mysqli_query($conexion, $sql)){
		header("Location: https://universidad-class-test.herokuapp.com//admin/Clases/clases.php");
	}
	else{
		echo "Error al insertar datos";
	
		
	}
	

?>