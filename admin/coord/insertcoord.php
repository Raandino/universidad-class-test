<?php
include('../../conexion.php');
include('../../Login/iniciar.php');
	
	//recuperar las variables
	$id=$_POST['id'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$carrera=$_POST['carrera'];

	//Recuperamos el idcarrera, ya que el usuario ingresa
	$recuperarID="SELECT idcarrera as idcarrera from oferta_academica where nombre='$carrera'";
	$consulta = mysqli_query($conexion, $recuperarID);
	$array = mysqli_fetch_array($consulta);
	$idcarrera= $array['idcarrera'];

	//hacemos la sentencia de sql
	$sql="INSERT into coordinadores VALUES('$id','$nombre','$apellido','$idcarrera')";
	
	//verificamos la ejecucion

	if(mysqli_query($conexion, $sql) ){
		header("Location: https://universidad-class-test.herokuapp.com/admin/coord/coord.php");
	}
	else{
		echo "Ya existe un coordinador con ese numero de carnet";
	
		
	}
	

?>