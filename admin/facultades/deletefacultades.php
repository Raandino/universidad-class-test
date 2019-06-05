<?php
include('../../conexion.php');
	

    $idfacultad=$_GET['rn'];
    


	//hacemos la sentencia de sql
	$sql="DELETE from facultades where idfacultad='$idfacultad' ";
	//verificamos la ejecucion
	if(mysqli_query($conexion, $sql)){
		header("Location: https://universidad-class-test.herokuapp.com/admin/facultades/facultades.php");
			
	}
	else{
		header("Location: https://universidad-class-test.herokuapp.com/admin/facultades/facultades.php?fallo2=true");//Aun hay Carrera inscritos a la facultad
		
	}
?>