<?php
include('../../conexion.php');
	

    $idfacultad=$_GET['rn'];
    


	//hacemos la sentencia de sql
	$sql="DELETE from facultades where idfacultad='$idfacultad' ";
	//verificamos la ejecucion
	if(mysqli_query($conexion, $sql)){
		header("Location: http://localhost:8080/formulario/admin/facultades/facultades.php");
			
	}
	else{
		echo"Aun hay Carrera inscritos a la facultad";
		
	}
?>