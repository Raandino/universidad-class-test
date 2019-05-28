<?php 
include('../../conexion.php');
include('../../Login/iniciar.php');



$idmateria = $_GET['pn'];
$sql = "DELETE from materias where idmateria='$idmateria'";


$data =  mysqli_query($conexion, $sql);
if($data)
{
   
    header("Location: https://universidad-class-test.herokuapp.com/admin/Clases/clases.php");
}
else 
{
   echo"No se puede eliminar materia que tiene un horario";
}

?>