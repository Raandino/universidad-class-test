<?php
    include('../conexion.php');
    
    $usuario = $_POST['username'];
    $clave = $_POST['password'];
    $sql="INSERT into login VALUES('$usuario','$clave')";

    if(mysqli_query($conexion, $sql)){
		header("Location: http://localhost:8080formulario/Login/login.php");
		
    }
    else{
        echo "Error registrandose";
    }
?>