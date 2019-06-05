<?php
include('../../conexion.php');
include('../../Login/iniciar.php');

$nota = $_POST['nota'];
$idalumno = $_POST['id'];
$grupo = $_POST['grupo'];
$idmateria = $_POST['idmateria'];
$nombreMateria = $_POST['nombreMateria'];

$query ="UPDATE notas SET  nota= '$nota' WHERE idalumno='$idalumno' and idmateria='$idmateria' and idgrupo='$grupo' ";
           


if(mysqli_query($conexion, $query))
{
    header("Location: https://universidad-class-test.herokuapp.com/LoginDocente/horarioDocentes/notas.php?rn=$nombreMateria&gr=$grupo");
}
else{
    header("Location: https://universidad-class-test.herokuapp.com/LoginDocente/horarioDocentes/notas.php?rn=$nombreMateria&gr=$grupo&fallo=true");
}


?>