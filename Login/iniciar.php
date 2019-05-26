<?php 
session_start();
$username = $_SESSION['usuario'];

if(!isset($username)){
	header("Location: http://localhost:8080/formulario/login/login.php");
}
else {
	
	
}

?>