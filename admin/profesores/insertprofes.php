<?php
include('../../conexion.php');
	
	//recuperar las variables
	$iddocente=$_POST['iddocente'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];

	//hacemos la sentencia de sql
	$sql="INSERT INTO docentes VALUES('$iddocente','$nombre','$apellido')";
	//verificamos la ejecucion
	if(mysqli_query($conexion, $sql)){
		header("Location: https://universidad-class-test.herokuapp.com/admin/profesores/profesores.php");
			
	}
	else{
		header("Location: https://universidad-class-test.herokuapp.com/admin/profesores/profesores.php");
	
		
	}
?>