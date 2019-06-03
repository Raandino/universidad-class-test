<?php
session_start();

session_destroy();

header("Location: /formulario/Login/login.php");
exit();
 
?>