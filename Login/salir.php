<?php
session_start();

session_destroy();

header("Location:https://universidad-class-test.herokuapp.com/Login/login.php");
exit();
 
?>