<?php 
include('../../conexion.php');
include('../../Login/iniciar.php');

$idcoord = $_GET['rn'];

$query = "DELETE   from coordinadores where idcoordinador = '$idcoord'";


$data = mysqli_query($conexion, $query);
if($data)
{
   
    header("Location: http://localhost:8080/formulario/admin/coord/coord.php");
}
else 
{
    header("Location: http://localhost:8080/formulario/admin/coord/coord.php?fallo2=true");

}

?>