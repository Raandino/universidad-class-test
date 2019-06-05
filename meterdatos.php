<?php 
      include('conexion.php');


       //Creacion cuenta admin 
       $admin= "INSERT into login (usuario, clave, cargo) values ('admin','root', 'admin');";
     
       if (mysqli_query($conexion, $admin)) {
       } else {
           echo "Error poner el registro" . mysqli_error($conexion);
       } 


       //insertar facultades
       $ingenieria= "INSERT into facultades values ('F-ING','Facultad de Ingenieria');";
       if (mysqli_query($conexion, $ingenieria)) {
       } else {
           echo "Error poner el registro" . mysqli_error($conexion);
       } 
       $fcae= "INSERT into facultades values ('F-CAE','Facultad de Ciencias Administrativas y Economicas');";
       if (mysqli_query($conexion, $fcae)) {
       } else {
           echo "Error poner el registro" . mysqli_error($conexion);
       } 
       $fmdc= "INSERT into facultades values ('F-MDC','Facultad de Marketing, Diseño y Comunicacion');";
       if (mysqli_query($conexion, $fmdc)) {
       } else {
           echo "Error poner el registro" . mysqli_error($conexion);
       } 
       $fcjur= "INSERT into facultades values ('F-CJYR','Facultad de Ciencias Juridicas y Relaciones Internacionales');";
       if (mysqli_query($conexion, $fcjur)) {
       } else {
           echo "Error poner el registro" . mysqli_error($conexion);
       } 
       $ucol= "INSERT into facultades values ('F-UCOL','UAM COLLEGE');";
       if (mysqli_query($conexion, $ucol)) {
       } else {
           echo "Error poner el registro" . mysqli_error($conexion);
       } 
       /*Registro de dos carreras*/ 
       $isis= "INSERT into oferta_academica(idoferta, nombre, tipo, idfacultad) values ('I-SIS','Ingenieria en Sistemas', 'Pregrado','F-ING');";
       if (mysqli_query($conexion, $isis)) {
       } else {
           echo "Error poner el registro" . mysqli_error($conexion);
       }
       $mark= "INSERT into oferta_academica(idoferta, nombre, tipo, idfacultad) values ('MARK','Marketing', 'Pregrado','F-MDC');";
       if (mysqli_query($conexion, $mark)) {
       } else {
           echo "Error poner el registro" . mysqli_error($conexion);
       }

       //Registro de 3 materias
       $mat= "INSERT into materias(codigo, nombre) values ('MTM','Matematica Basica' );";
       if (mysqli_query($conexion, $mat)) {
       } else {
           echo "Error poner el registro" . mysqli_error($conexion);
       }
       $log= "INSERT into materias(codigo, nombre) values ('SIS101','Logica y Algoritmo' );";
       if (mysqli_query($conexion, $log)) {
       } else {
           echo "Error poner el registro" . mysqli_error($conexion);
       }
       
       $prinma= "INSERT into materias(codigo, nombre) values ('MA101','Fundamentos de Marketing' );";
       if (mysqli_query($conexion, $prinma)) {
       } else {
           echo "Error poner el registro" . mysqli_error($conexion);
       }

       
      
      
      
      
      
      header("Location: http://localhost:8080/formulario/Login/login.php");

 
// Close connection
mysqli_close($link);
	
?>