<?php
include('../../conexion.php');
	
	//recuperar las variables
	$iddocente=$_POST['iddocente'];
	$nombre=$_POST['nombre'];
	$segundonombre=$_POST['segundonombre'];
	$apellido=$_POST['apellido'];
	$segundoapellido=$_POST['segundoapellido'];
	$telefono=$_POST['celular'];
	$correo=$_POST['correo'];
	$sexo=$_POST['sexo'];

	//hacemos la sentencia de sql
	$sql="INSERT INTO docentes (iddocente, nombre, segundoNombre, apellido, segundoApellido, sexo, correo, telefono) VALUES('$iddocente','$nombre','$segundonombre', '$apellido','$segundoapellido', '$sexo', '$correo', '$telefono')";
	//verificamos la ejecucion
	if(mysqli_query($conexion, $sql)){
		header("Location: http://localhost:8080/formulario/admin/profesores/profesores.php");
			
	}
	else{
		header("Location: http://localhost:8080/formulario/admin/profesores/profesores.php?fallo=true");
	
		
	}
?>