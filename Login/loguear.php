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
    header("Location:https://universidad-class-test.herokuapp.com//admin/main/main.php");
    
}

//ALUMNOS
$q = "SELECT COUNT(*) as contar from login where usuario = '$usuario' and clave = '$clave' and cargo ='alumno'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

if($array['contar']>0){
    $_SESSION['usuario'] = $usuario; //nuevo
    header("Location:https://universidad-class-test.herokuapp.com//LoginAlumnos/mainalumnos.php");
    
}

//PROFESORES
$q = "SELECT COUNT(*) as contar from login where usuario = '$usuario' and clave = '$clave' and cargo ='profesor'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

if($array['contar']>0){
    $_SESSION['usuario'] = $usuario; //nuevo
    header("Location:https://universidad-class-test.herokuapp.com//LoginDocente/maindocentes.php");
    
}

//Coordinadores
$q = "SELECT COUNT(*) as contar from login where usuario = '$usuario' and clave = '$clave' and cargo ='coord'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

if($array['contar']>0){
    $_SESSION['usuario'] = $usuario; //nuevo
    header("Location:https://universidad-class-test.herokuapp.com//Coordinador/main/maincoor.php");
    
}{
    //header("Location:https://universidad-class-test.herokuapp.com//Login/login.php");
    
    echo " Contraseña o Usuario Incorrecto
    <script>
         $('.pop-up').(function(){
     $('body').css('pointer-events', 'none');
     $('.pop-up').css('display', 'block')
     $('.pop-up').slideDown(500);
 });
 $('.pop-up-cancel').click(function(){
     $('body').css('pointer-events', 'all');
     $('.pop-up').css('display', 'none')
     $('.pop-up-borrar').css('display', 'none');
     $('.pop-up').slideDown(500);
     $('.pop-up-borrar').slideDown(500);
 });
     </script> ";
 
 }  

?>