<?php


function validaradmin($usuario,$conexion)
{
    $sinchoque = "SELECT count(*) as validacion from login where usuario='$usuario' and cargo='admin'";
	$consultad = mysqli_query($conexion, $sinchoque);
	$arrayd = mysqli_fetch_array($consultad);

    if($arrayd['validacion']==1)
    {       
    }
    else if ($arrayd['validacion']==0)
    {
        header("Location: http://localhost:8080/formulario/Login/login.php");
    }
}

/*Validacion de alumno*/ 
function validaralumno($usuario,$conexion)
{
    $sinchoque = "SELECT count(*) as validacion from login where usuario='$usuario' and cargo='alumno'";
	$consultad = mysqli_query($conexion, $sinchoque);
	$arrayd = mysqli_fetch_array($consultad);

    if($arrayd['validacion']==1)
    {       
    }
    else if ($arrayd['validacion']==0)
    {
        header("Location: http://localhost:8080/formulario/Login/login.php");
    }
}

/*Validacion de profesor*/ 
function validarprofe($usuario,$conexion)
{
    $sinchoque = "SELECT count(*) as validacion from login where usuario='$usuario' and cargo='profesor'";
	$consultad = mysqli_query($conexion, $sinchoque);
	$arrayd = mysqli_fetch_array($consultad);

    if($arrayd['validacion']==1)
    {       
    }
    else if ($arrayd['validacion']==0)
    {
        header("Location: http://localhost:8080/formulario/Login/login.php");
    }
}

/*Validacion de admin*/ 
function validarcoor($usuario,$conexion)
{
    $sinchoque = "SELECT count(*) as validacion from login where usuario='$usuario' and cargo='coord'";
	$consultad = mysqli_query($conexion, $sinchoque);
	$arrayd = mysqli_fetch_array($consultad);

    if($arrayd['validacion']==1)
    {       
    }
    else if ($arrayd['validacion']==0)
    {
        header("Location: http://localhost:8080/formulario/Login/login.php");
    }
}


?>