<?php
include('../conexion.php');

session_start();
$usuario = $_POST['username'];
$clave1 = $_POST['password'];
$contador = 0; //Contador para verificar si la pass son iguales:v

$_SESSION['usuario']= $usuario;
$_SESSION['clave']= $clave;

//Admins
$q = "SELECT *from login where usuario = '$usuario' and cargo = 'admin' ";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

while($array['usuario'] == $usuario && $array['cargo'] == admin){


if(password_verify ($clave1, $array['clave'])){
    $contador++;
}

else if($clave1 == $array['clave']){
    $contador++;
}


if($contador>0){
    $_SESSION['usuario'] = $usuario; //nuevo
    header("Location:http://localhost:8080/formulario/admin/main/main.php");
}

else{
    header("Location:http://localhost:8080/formulario/Login/login.php?fallo=true");
}
}


//Alumnos 
$q = "SELECT *from login where usuario = '$usuario' and cargo ='alumno'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

while($array['usuario'] == $usuario && $array['cargo'] == alumno){
if(password_verify ($clave1, $array['clave'])){
    $contador++;
}
else if($clave1 == $array['clave']){
    $contador++;
}

if($contador>0 ){
    $_SESSION['usuario'] = $usuario; //nuevo
    header("Location:http://localhost:8080/formulario/LoginAlumnos/mainAlumnos/mainalumnos.php");
}else{
    header("Location:http://localhost:8080/formulario/Login/login.php?fallo=true");
}

}

//Docentes
$q = "SELECT *from login where usuario = '$usuario' and cargo ='profesor'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

while($array['usuario'] == $usuario && $array['cargo'] == profesor){
if(password_verify ($clave1, $array['clave'])){
    $contador++;
}

else if($clave1 == $array['clave']){
    $contador++;
}

if($contador>0){
    $_SESSION['usuario'] = $usuario; //nuevo
    header("Location:http://localhost:8080/formulario/LoginDocente/mainDocentes/maindocentes.php");
}else{
    header("Location:http://localhost:8080/formulario/Login/login.php?fallo=true");
}

}

//Coordinadores
$q = "SELECT *from login where usuario = '$usuario' and cargo ='coord'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

while($array['usuario'] == $usuario && $array['cargo'] == coord){
if(password_verify ($clave1, $array['clave'])){
    $contador++;
}

else if($clave1 == $array['clave']){
    $contador++;
}

if($contador>0 ){
    $_SESSION['usuario'] = $usuario; 
    header("Location:http://localhost:8080/formulario/Coordinador/main/maincoor.php");
}else{
    header("Location:http://localhost:8080/formulario/Login/login.php?fallo=true");
}

}

 
header("Location:http://localhost:8080/formulario/Login/login.php?fallo=true");




?>