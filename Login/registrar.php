<?php
    include('../conexion.php');
    
    $usuario = $_POST['username'];
    $clave = $_POST['password'];
    $sql="INSERT into login VALUES('$usuario','$clave')";

    if(mysqli_query($conexion, $sql)){
		header("Location: https://universidad-class-test.herokuapp.com/Login/login.php");
		
    }
    else{
        echo "Error registrandose";
    }
?>