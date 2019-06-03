<?php
include('../../conexion.php');
	

    $idcarrera=$_GET['rn'];
    


	//hacemos la sentencia de sql
	$sql="DELETE from oferta_academica where idcarrera='$idcarrera' ";
	//verificamos la ejecucion
	if(mysqli_query($conexion, $sql)){
		header("Location: http://localhost:8080/formulario/admin/facultadesycarreras/carreras.php");
			
	}
	else{
		echo"Aun hay alumnos inscritos a la carrera";
		
	}
?>