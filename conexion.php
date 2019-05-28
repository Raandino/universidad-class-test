<?php

	$servername = "universidadtest.crxav7eabiql.us-east-2.rds.amazonaws.com:3306";
	$username = "admin";
	$password = "12345678";
	

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}else{

		echo "<h1>SIRVIO</h1>";
	}

	
	$conexion=mysqli_connect($servername,$username,$password,'universidad_test');


	
    ?>