<?php 
include('../../conexion.php');

$idmateria = $_GET['id'];
$horainicio = $_GET['hi'];
$horafinal = $_GET['hf'];
$dia = $_GET['dia'];
$grupo = $_GET['gp'];

$q ="DELETE   from hora_materia where idmateria = '$idmateria'  and idgrupo='$grupo' ";



if(mysqli_query($conexion, $q))
{
   
    header("Location: https://universidad-class-test.herokuapp.com/Coordinador/horarioMaterias/materias.php");
}
else 
{
    header("Location: https://universidad-class-test.herokuapp.com/Coordinador/horarioMaterias/materias.php?fallo2=true");
}

?>