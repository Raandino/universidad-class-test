<?php

	$servername = "us-cdbr-iron-east-02.cleardb.net:3306";
	$username = "baaa99915d8ee8";
	$password = "9aaeb95d";
	

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}

	
	$conexion=mysqli_connect($servername,$username,$password,'universidad');


	
    ?>