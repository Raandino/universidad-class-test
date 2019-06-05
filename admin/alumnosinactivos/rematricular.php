<?php 
include('../../conexion.php');
include('../../Login/iniciar.php');

$idalumno = $_GET['id'];

$sql = "DELETE from alumnosinactivos where idalumno='$idalumno'";

if(mysqli_query($conexion, $sql))
{
   
    header("Location: http://localhost:8080/formulario/admin/alumnosinactivos/inactivos.php?exito");
}
else 
{
    header("Location: http://localhost:8080/formulario/admin/alumnosinactivos/inactivos.php?fallo2");

}

?>