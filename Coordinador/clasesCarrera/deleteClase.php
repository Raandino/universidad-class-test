<?php 
include('../../conexion.php');
include('../../Login/iniciar.php');


$materia = $_GET['rn'];
$carrera = $_GET['sn'];
$semestre = $_GET['pn'];

//Recuperamos el idcarrera, ya que el coord mira el nombre de la carrera
$recuperarID="SELECT idcarrera as idcarrera from oferta_academica where nombre='$carrera'";
$consulta = mysqli_query($conexion, $recuperarID);
$array = mysqli_fetch_array($consulta);
$idcarrera= $array['idcarrera'];

//Recuperamos el idmateria, ya que el coor mira el nombre de la materia
$recuperarmat="SELECT idmateria as idmateria from materias where nombre='$materia'";
$consulta = mysqli_query($conexion, $recuperarmat);
$array = mysqli_fetch_array($consulta);
$idmateria= $array['idmateria'];

$sql = "DELETE from pensum where idcarrera='$idcarrera' and semestre='$semestre' and idmateria='$idmateria'";

$data =  mysqli_query($conexion, $sql);
if($data)
{
    header("Location: https://universidad-class-test.herokuapp.com//Coordinador/clasesCarrera/agregarClase.php");
}
else 
{
    echo"Error al eliminar datos";

}

?>