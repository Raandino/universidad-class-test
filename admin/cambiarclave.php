<?php
include('../conexion.php');

include('../Login/iniciar.php');
//session_start();
error_reporting(0);
$usuario = $_SESSION['usuario'];


?>


<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../estilo.css">
    <link rel="stylesheet" type="text/css" href="../pop-up.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
    
    <title>Cambiar Contraseña</title>
    </head>
    <body >
            <br>
            <br>
    
        <h2 id="h2conf">Cambiar Contraseña</h2>
        <br>
    <div class="formcontra col" >
    <form action="" method="POST" autocomplete="off"  >
		<p>Usuario</p>

		<br>
        <input type="text" name="usuario"  maxlength="8" required value="<?php echo $usuario; ?>" DISABLED >

        <br>
        <br>
		<p>Ingrese la contraseña antigua</p>
		<br>
        <input type="password" name="oldclave" minlength="8" placeholder="Contraseña actual" maxlength="12" required="required" >
        <br>
        <br>
        <p>Ingrese la nueva contraseña</p>
        <br>
        <input type="password" name="newclave" minlength="8" placeholder="Nueva contraseña" minlength="8" maxlength="12" required="required" >
        <br>
        <br>
        <input type="password" name="claverep" minlength="8" placeholder="Repita la contraseña" minlength="8" maxlength="12" required="required">
        <br>
		<br>
		<div class="pop-up">
			<div >
				<p>¿Esta seguro?</p>
				<input type="submit" name="submit" value="Confirmar"/>
					
				<br>
				<input class= "pop-up-cancel" type="button" value="Cancelar">
			</div>
		</div>
    </form>
    <button class="pop-up-activate">Actualizar</button>
    </div>
        <?php
         $oldclave=$_POST['oldclave'];//contraseña antigua 
         $contador = 0;
        
         
          $newclave = $_POST['newclave'];  //nuevacontraseña
          $confirmacion = $_POST['claverep'];
          
                if ($newclave == $confirmacion)
                {  
                        if($_POST['submit'])
                        {
                            $q = "SELECT *from login where usuario= '$usuario'";
                            $consulta = mysqli_query($conexion, $q);
                            $array = mysqli_fetch_array($consulta);

                            if(password_verify($oldclave, $array['clave'])){
                            $clavecrypt = password_hash($newclave, PASSWORD_DEFAULT, ['cost'=>5]);

                            $query ="UPDATE login SET  clave= '$clavecrypt' WHERE usuario='$usuario' ";
                            $data = mysqli_query($conexion, $query);
                            if($data)
                            {
                                header("Location: https://universidad-class-test.herokuapp.com/Login/login.php");
                            }
                            else{
                                header("Location: https://universidad-class-test.herokuapp.com/Login/login.php");
                            }
                            
                        }

                        if($oldclave == $array['clave']){
                            $clavecrypt = password_hash($newclave, PASSWORD_DEFAULT);

                            $query ="UPDATE login SET  clave= '$clavecrypt' WHERE usuario='$usuario' ";
                            $data = mysqli_query($conexion, $query);
                            if($data)
                            {
                                header("Location: https://universidad-class-test.herokuapp.com/Login/login.php");
                            }
                            else{
                                header("Location: https://universidad-class-test.herokuapp.com/Login/login.php");
                            }
                        }

                        else{
                            header("Location: https://universidad-class-test.herokuapp.com/Login/login.php?fallo2=true");  //Contraseña actual no valida
                        }
                                
                       
                        }


                        

                    }
                else {
                    header("Location: https://universidad-class-test.herokuapp.com/admin/cambiarclave.php?fallo=true"); //Contraseñas no coinciden
                }
            


      
        ?>

    <?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
                    <p>Las Contraseñas No Coinciden</p>
                    <button><a class='pop-up-cancel' href='cambiarclave.php'>Confirmar</a></button>
                </div>
            </div> ";
       }
       if(isset($_GET["fallo"]) && $_GET["fallo2"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
                    <p>Constraseña Actual Invalida</p>
                    <button><a class='pop-up-cancel' href='cambiarclave.php'>Confirmar</a></button>
                </div>
            </div> ";
       }
     ?>
        <style>
        body{
            background-color:rgb(21, 32, 43);
        }
        </style>    
        
    </body>
    <script src="../pop-up.js"></script>
</html>