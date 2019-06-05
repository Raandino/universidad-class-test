
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../estilo.css">
    <link rel="stylesheet" type="text/css" href="../pop-up.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
	<link rel="stylesheet" type="text/css" href="../alumnos.css">
	<title>Login</title>
</head>

<body>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card text-center">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form  action="loguear.php"  method="POST" autocomplete="off">
                    
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Usuario" class="form-control" minlength="5" maxlength="14" required> 
                        </div>

                        <div class="form-group">
                            <input type= "password" name="password" placeholder="Contraseña" class="form-control" minlength="4" maxlength="12" required>
                        </div>

                        <div class="form-group">
                            <button class=" btn btn-success btn-block">
                                Iniciar Sesion 
                            </button>
                        </div>
                      


                    </form>
                </div>
            </div>  

            <?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
                    <p>Contraseña o Usuario Incorrectos</p>
                    <input class='pop-up-cancel' type='button' value='Confirmar'>
                </div>
            </div> ";
       }
     ?>

        

</body>
<script src="../pop-up.js"></script>

</html>


