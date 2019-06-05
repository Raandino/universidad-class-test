<?php
include('../../conexion.php');
include('../../Login/iniciar.php');
	
	//recuperar las variables
	$cif=$_POST['cif'];
	$nombre=$_POST['nombre'];
	$segundonombre=$_POST['segundoNombre'];
	$apellido=$_POST['apellido'];
	$segundoapellido=$_POST['segundoApellido'];
	$sexo=$_POST['sexo'];
	$correo=$_POST['correo'];
	$celular=$_POST['celular'];
	$carrera=$_POST['carrera'];


	//Valida el cif del nuevo alumno
	$sinchoque = "SELECT count(*) as sinchoque from alumnosinactivos where idalumno='$cif';";
		
		$consultad = mysqli_query($conexion, $sinchoque);
		$arrayd = mysqli_fetch_array($consultad);

		if($arrayd['sinchoque']==0)
		{
			//Recuperamos el idcarrera, ya que el usuario ingresa el nombre de la carrera
			$recuperarID="SELECT idcarrera as idcarrera from oferta_academica where nombre='$carrera'";
			$consulta = mysqli_query($conexion, $recuperarID);
			$array = mysqli_fetch_array($consulta);
			$idcarrera= $array['idcarrera'];

			//hacemos la sentencia de sql para insertar al alumno
			$sql="INSERT into alumnos(idalumno, nombre, segundoNombre,apellido,segundoApellido,sexo,correo,telefono) 
			VALUES('$cif','$nombre','$segundonombre','$apellido','$segundoapellido','$sexo','$correo','$celular')";
			$sqk="INSERT into oferta_alumnos VALUES ('$idcarrera','$cif')";
			//verificamos la ejecucion

			if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sqk)){
				header("Location: http://localhost:8080/formulario/admin/alumnos/alumnos.php");
			}
			else{
				header("Location: http://localhost:8080/formulario/admin/alumnos/alumnos.php?fallo=true");	
				
			}
		}
		else
		{
			header("Location: http://localhost:8080/formulario/admin/alumnos/alumnos.php?fallo=true");
		}
			

?>

