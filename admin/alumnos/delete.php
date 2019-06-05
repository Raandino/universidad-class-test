<?php 
include('../../conexion.php');
include('../../Login/iniciar.php');
$idalumno = $_GET['rn'];
$sql = "DELETE from oferta_alumnos where idalumno='$idalumno'";
$query = "DELETE   from alumnos where idalumno = '$idalumno'";


$data =  mysqli_query($conexion, $sql) && mysqli_query($conexion, $query);
if($data)
{
   
    header("Location: https://universidad-class-test.herokuapp.com/admin/alumnos/alumnos.php");
}
else 
{
    header("Location: https://universidad-class-test.herokuapp.com/admin/alumnos/alumnos.php?fallo2");

}

?>