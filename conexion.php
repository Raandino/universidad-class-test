<?php

	$servername = "us-cdbr-iron-east-02.cleardb.net:3306";
	$username = "baaa99915d8ee8";
	$password = "9aaeb95d";
	

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}else{
		echo "<h1>SOS LA MERA YUCA</h1>"
	}

	
	$conexion=mysqli_connect($servername,$username,$password,'heroku_a9b4f5dbca572c4');


	
    ?>