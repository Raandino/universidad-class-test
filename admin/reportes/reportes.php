<?php 

include('../../conexion.php');
include('../../Login/iniciar.php');

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../../alumnos.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	

<title>Reportes</title>
</head>
<body background-color: #fff>
<div id="container">
        <?php include ('../../sidebar.php')?>

    <div id="main">
            <div class="contenedor-tabla"> 
                <h2>Matricula de alumnos</h2>
                <input type="text" name="search" id="search" class="form-control" placeholder="Buscar en tabla" />  
					<br>
                    <table class="tabla" id="buscador">
                            <tr>
                                <td>ID alumno</td>
                                <td>Nombre del alumno</td>
                                <td>ID materia</td>
                                <td>Materia</td>
                                
                                    
                            </tr>

                        <?php 
                        $sql="SELECT matri.idalumno, alumnos.nombre as alumnos, matri.idmateria,materias.nombre 
                        from materias_alumnos as matri, materias, alumnos 
                        where matri.idalumno = alumnos.idalumno and materias.idmateria = matri.idmateria";
                        $result=mysqli_query($conexion,$sql);

                        while($mostrar=mysqli_fetch_array($result)){
                            echo "<tr>
                            <td>".$mostrar['idalumno']."</td>
                            <td>".$mostrar['alumnos']."</td>
                            <td>".$mostrar['idmateria']."</td>
                            <td>".$mostrar['nombre']."</td>
                        
                            </tr>";
                                
                        ?>
                        
                    <?php 
                    }
                    ?>
                    </table>
                    </div>
                </div>	
     
</body>
</html>
<?php include ('../main/searchbar.php')?>  