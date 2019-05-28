<?php
include('../../conexion.php');
include('../../Login/iniciar.php');
	
	//recuperar las variables
	$materia=$_POST['materia'];
	$semestre=$_POST['semestre'];
	$carrera=$_POST['carrera'];

	//Recuperamos el idcarrera, ya que el usuario ingresa el nombre de la carrera
	$recuperarID="SELECT idcarrera as idcarrera from oferta_academica where nombre='$carrera'";
	$consulta = mysqli_query($conexion, $recuperarID);
	$array = mysqli_fetch_array($consulta);
    $idcarrera= $array['idcarrera'];
    
    //Recuperamos el idmateria, ya que el usuario ingresa el nombre de la materia
	$recuperarmat="SELECT idmateria as idmateria from materias where nombre='$materia'";
	$consulta = mysqli_query($conexion, $recuperarmat);
	$array = mysqli_fetch_array($consulta);
	$idmateria= $array['idmateria'];

	//hacemos la sentencia de sql
	$sql="INSERT into pensum VALUES('$idcarrera','$semestre','$idmateria')";
	
	//verificamos la ejecucion

	if(mysqli_query($conexion, $sql)){
		header("Location: https://universidad-class-test.herokuapp.com/Coordinador/clasesCarrera/agregarClase.php");
	}
	else{
		echo "Error al insertar clase, por favor asegurese que esta clase no este inscrita";
	
		
	}
	

?>
