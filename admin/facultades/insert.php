<?php
include('../../conexion.php');
	



	//recuperar las variables
	$idfacultad=$_POST['idfacultad'];
    $nombre=$_POST['nombre']; //nombre de la carrera
   

	
    

	//hacemos la sentencia de sql
	$sql="INSERT into facultades (idfacultad, nombre_facultad) values ('$idfacultad','$nombre');";
	//verificamos la ejecucion
	if(mysqli_query($conexion, $sql)){
		header("Location: http://localhost:8080/formulario/admin/facultades/facultades.php");
			
	}
	else{
		header("Location: http://localhost:8080/formulario/admin/facultades/facultades.php?fallo=true");
		
	}
?>