<?php
include('../conexion.php');

session_start();
$usuario = $_POST['username'];
$clave1 = $_POST['password'];
$contador = 1; //Contador para verificar si la pass son iguales:v

$_SESSION['usuario']= $usuario;
$_SESSION['clave']= $clave;

//Admins
$q = "SELECT *from login where usuario = '$usuario' and cargo = 'admin' ";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

/*while($array['usuario'] == $usuario && $array['cargo'] == admin){

 if($clave1 == $array['clave']){
    $contador++;
}*/


if($contador>0){
    $_SESSION['usuario'] = $usuario; //nuevo
    header("Location:https://universidad-class-test.herokuapp.com/admin/main/main.php");
}

else{
    header("Location:https://universidad-class-test.herokuapp.com/Login/login.php?fallo=true");
}
//}





 
//header("Location:http://localhost:8080/formulario/Login/login.php?fallo=true");




?>
