<?php
include('../../conexion.php');
include('../../Login/iniciar.php');
	
	//recuperar las variables
	$id=$_POST['id'];
	$nombre=$_POST['nombre'];
	$segundonombre=$_POST['segundoNombre'];
	$apellido=$_POST['apellido'];
	$segundoapellido=$_POST['segundoApellido'];
	$sexo=$_POST['sexo'];
	$correo=$_POST['correo'];
	$celular=$_POST['celular'];
	$carrera=$_POST['carrera'];

	//Recuperamos el idcarrera, ya que el usuario ingresa
	$recuperarID="SELECT idcarrera as idcarrera from oferta_academica where nombre='$carrera'";
	$consulta = mysqli_query($conexion, $recuperarID);
	$array = mysqli_fetch_array($consulta);
	$idcarrera= $array['idcarrera'];

	//hacemos la sentencia de sql
	$sql="INSERT into coordinadores (idcoordinador, nombre, segundoNombre, apellido, segundoApellido, sexo, telefono, correo, idcarrera) VALUES('$id','$nombre', '$segundonombre' ,'$apellido','$segundoapellido','$sexo', '$celular', '$correo',   '$idcarrera')";
	
	//verificamos la ejecucion

	if(mysqli_query($conexion, $sql) ){
		header("Location: https://universidad-class-test.herokuapp.com/admin/coord/coord.php");
	}
	else{
		header("Location: https://universidad-class-test.herokuapp.com/admin/coord/coord.php?fallo=true");
	
		
	}
	

?>