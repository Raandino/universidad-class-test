<?php 
include('../../conexion.php');
include('../../Login/iniciar.php');

$idalumno = $_GET['id'];

$sql = "DELETE from alumnosinactivos where idalumno='$idalumno'";

if(mysqli_query($conexion, $sql))
{
   
    header("Location: https://universidad-class-test.herokuapp.com/admin/alumnosinactivos/inactivos.php?exito");
}
else 
{
    header("Location: https://universidad-class-test.herokuapp.com/admin/alumnosinactivos/inactivos.php?fallo2");

}

?>