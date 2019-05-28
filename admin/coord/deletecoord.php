<?php 
include('../../conexion.php');
include('../../Login/iniciar.php');

$idcoord = $_GET['rn'];

$query = "DELETE   from coordinadores where idcoordinador = '$idcoord'";


$data = mysqli_query($conexion, $query);
if($data)
{
   
    header("Location: https://universidad-class-test.herokuapp.com/admin/coord/coord.php");
}
else 
{
    echo"Error al eliminar dato";

}

?>