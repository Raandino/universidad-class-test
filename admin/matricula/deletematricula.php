<?php 
include('../../conexion.php');

$nombreMat = $_GET['pn'];
$idalumno = $_GET['sc'];
$grupo = $_GET['gr'];


//Convertir nombre de la materia a su id 
$recuperarID="SELECT idmateria as idmateria from materias where nombre='$nombreMat'";
	$consulta = mysqli_query($conexion, $recuperarID);
	$array = mysqli_fetch_array($consulta);
	$idmateria= $array['idmateria'];



$query = "DELETE   from materias_alumnos where idmateria = '$idmateria' and idalumno = '$idalumno' and idgrupo='$grupo'";

$data = mysqli_query($conexion, $query);
if($data)
{
   
    header("Location: https://universidad-class-test.herokuapp.com/admin/matricula/matricula.php");
}
else 
{
    echo "Sorry, ERROR";
}

?>