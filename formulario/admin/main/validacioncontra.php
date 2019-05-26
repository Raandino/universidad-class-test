<?php

$usuario = $_SESSION['usuario'];
$q = "SELECT COUNT(*) as cambiar from login where usuario = '$usuario' and clave = '12345678'";

$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

if($array['cambiar']>0){
   
   echo "<center><p>Recuerda cambiar tu contraseña $usuario</p></center>";
   //echo "<script type='text/javascript'>alert('Cambia tu contraseña cuando entres al sistema');</script>";
  
   
}
else{
    
}

?>