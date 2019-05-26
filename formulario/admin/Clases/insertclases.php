<?php
include('../../conexion.php');
include('../../Login/iniciar.php');
	
	//recuperar las variables
	$codigo=$_POST['codigo'];
	$nombre=$_POST['nombre'];
	


	//hacemos la sentencia de sql
	$sql="INSERT into materias (codigo, nombre) VALUES('$codigo','$nombre')";
	
	if(mysqli_query($conexion, $sql)){
		header("Location: http://localhost:8080/formulario/admin/Clases/clases.php");
	}
	else{
		echo "Error al insertar datos";
	
		
	}
	

?>