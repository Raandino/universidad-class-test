<?php

$usuario = $_SESSION['usuario'];
$q = "SELECT COUNT(*) as cambiar from login where usuario = '$usuario' and clave = '12345678'";

$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

?>