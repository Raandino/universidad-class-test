<?php 
include('../../conexion.php');

$iddocente = $_GET['pn'];
$query = "DELETE   from docentes where iddocente = '$iddocente'";

$data = mysqli_query($conexion, $query);
if($data)
{
   
    header("Location: https://universidad-class-test.herokuapp.com//admin/profesores/profesores.php");
}
else 
{
    echo "Sorry, ERROR";
}

?>