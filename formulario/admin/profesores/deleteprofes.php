<?php 
include('../../conexion.php');

$iddocente = $_GET['pn'];
$query = "DELETE   from docentes where iddocente = '$iddocente'";

$data = mysqli_query($conexion, $query);
if($data)
{
   
    header("Location: http://localhost:8080/formulario/admin/profesores/profesores.php");
}
else 
{
    echo "Sorry, ERROR";
}

?>