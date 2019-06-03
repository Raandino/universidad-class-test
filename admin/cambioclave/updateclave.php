<?php
include('../../conexion.php');
include('../../Login/iniciar.php');
	
	//recuperar las variables
	$usuario=$_POST['usuario'];


    $sinchoque = "SELECT count(*) as validacion from login where usuario='$usuario'";
	
	$consultad = mysqli_query($conexion, $sinchoque);
	$arrayd = mysqli_fetch_array($consultad);

	if($arrayd['validacion']==1)
	{

	$sql="UPDATE login set clave='12345678' where usuario='$usuario'; ";
	
	//verificamos la ejecucion

            if(mysqli_query($conexion, $sql) ){
                header("Location: http://localhost:8080/formulario/admin/cambioclave/claveolvidada.php?success=true"); //que regrese un pop up que diga que se cambio la clave
            }
    }
    else {
        header("Location: http://localhost:8080/formulario/admin/cambioclave/claveolvidada.php?fallo=true");
    }
	

?>
