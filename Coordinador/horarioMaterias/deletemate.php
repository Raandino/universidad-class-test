<?php 
include('../../conexion.php');

$idmateria = $_GET['id'];
$horainicio = $_GET['hi'];
$horafinal = $_GET['hf'];
$dia = $_GET['dia'];
$grupo = $_GET['gp'];

$q ="DELETE   from hora_materia where idmateria = '$idmateria' and dia='$dia' and idgrupo='$grupo' ";



if(mysqli_query($conexion, $q))
{
   
    header("Location: http://localhost:8080/formulario/Coordinador/horarioMaterias/materias.php");
}
else 
{
    echo"Error al borrar";
}

?>