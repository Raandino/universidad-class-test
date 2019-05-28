<?php 
session_start();
$username = $_SESSION['usuario'];

if(!isset($username)){
	header("Location: https://universidad-class-test.herokuapp.com//login/login.php");
}
else {
	
	
}

?>