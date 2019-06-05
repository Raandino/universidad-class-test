<?php

	$servername = "universidadtest.crxav7eabiql.us-east-2.rds.amazonaws.com:3306";
	$username = "admin";
	$password = "0011202001";
	

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}

	
	$conexion=mysqli_connect($servername,$username,$password,'universidad');


	
    ?>