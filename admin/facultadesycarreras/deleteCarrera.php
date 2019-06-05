<?php
include('../../conexion.php');
	

    $idcarrera=$_GET['rn'];
    


	//hacemos la sentencia de sql
	$sql="DELETE from oferta_academica where idcarrera='$idcarrera' ";
	//verificamos la ejecucion
	if(mysqli_query($conexion, $sql)){
		header("Location: https://universidad-class-test.herokuapp.com/admin/facultadesycarreras/carreras.php");
			
	}
	else{
		header("Location: https://universidad-class-test.herokuapp.com/admin/facultadesycarreras/carreras.php?fallo2=true");//Aun hay alumnos inscritos en la carrera
		
	}
?>