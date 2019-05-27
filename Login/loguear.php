<?php
include('../conexion.php');

session_start();
$usuario = $_POST['username'];
$clave = $_POST['password'];


$_SESSION['usuario']= $usuario;
$_SESSION['clave']= $clave;

//ADMINS
$q = "SELECT COUNT(*) as contar from login where usuario = '$usuario' and clave = '$clave' and cargo ='admin'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);


if($array['contar']>0){
    $_SESSION['usuario'] = $usuario; //nuevo
    header("Location:https://universidad-class-test.herokuapp.com/admin/main/main.php");
    
}

//ALUMNOS
$q = "SELECT COUNT(*) as contar from login where usuario = '$usuario' and clave = '$clave' and cargo ='alumno'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

if($array['contar']>0){
    $_SESSION['usuario'] = $usuario; //nuevo
    header("Location:http://localhost:8080/formulario/LoginAlumnos/mainalumnos.php");
    
}

//PROFESORES
$q = "SELECT COUNT(*) as contar from login where usuario = '$usuario' and clave = '$clave' and cargo ='profesor'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

if($array['contar']>0){
    $_SESSION['usuario'] = $usuario; //nuevo
    header("Location:http://localhost:8080/formulario/LoginDocente/maindocentes.php");
    
}
else{
    
   echo"Contrasena o usuario incorrecto";
}

//Coordinadores
$q = "SELECT COUNT(*) as contar from login where usuario = '$usuario' and clave = '$clave' and cargo ='coord'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

if($array['contar']>0){
    $_SESSION['usuario'] = $usuario; //nuevo
    header("Location:http://localhost:8080/formulario/Coordinador/coord.php");
    
}
else{
    
   echo"Contrasena o usuario incorrecto";
}
?>