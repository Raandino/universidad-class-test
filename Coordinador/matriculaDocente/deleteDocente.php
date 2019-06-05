<?php 
include('../../conexion.php');

$nombremateria = $_GET['pn']; //Nombre de la materia
$iddocente = $_GET['sc']; //id del docente
$grupo = $_GET['gr']; //Grupo


$recuperarID="SELECT idmateria as idmateria from materias where nombre='$nombremateria'";
	$consulta = mysqli_query($conexion, $recuperarID);
	$array = mysqli_fetch_array($consulta);
    $idmateria= $array['idmateria'];

$q ="DELETE   from materia_docente where idmateria = '$idmateria' and iddocente='$iddocente' and idgrupo='$grupo' ";



if(mysqli_query($conexion, $q))
{
   
    header("Location: http://localhost:8080/formulario/Coordinador/matriculaDocente/matriculaDocente.php");
}
else 
{
    header("Location: http://localhost:8080/formulario/Coordinador/matriculaDocente/matriculaDocente.php?fallo3=true");
}

?>