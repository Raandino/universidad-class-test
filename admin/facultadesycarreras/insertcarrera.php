<?php
include('../../conexion.php');
	



	//recuperar las variables
	$idcarrera=$_POST['idcarrera'];
    $nombre=$_POST['nombre']; //nombre de la carrera
    $tipo = $_POST['tipo'];
    $nombreFacultad= $_POST['nombreFac'];

	//Pasar el nombre de la facultad a id
	$recuperarID="SELECT idfacultad as idFac from facultades where nombre_facultad ='$nombreFacultad'";
	$consulta = mysqli_query($conexion, $recuperarID);
	$array = mysqli_fetch_array($consulta);
	$idfacultad= $array['idFac'];


	//hacemos la sentencia de sql
	$sql="INSERT into oferta_academica (idoferta, nombre, tipo, idfacultad) values ('$idcarrera','$nombre', '$tipo', '$idfacultad');";
	//verificamos la ejecucion
	if(mysqli_query($conexion, $sql)){
		header("Location: https://universidad-class-test.herokuapp.com/admin/facultadesycarreras/carreras.php");
			
	}
	else{
       echo"Error al registrar la materia";
		
	}
?>