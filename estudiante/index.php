<?php
include_once('../config/config.php');
include("estudiante.php");

$libro= new estudiante(); /* Llamo toda la clase que tienes mis recetas o funciones */
$todosRegistros= $libro->getAll(); /* Traigame la funcion ver todos los usuarios */

if(isset($_GET['id']) && !empty($_GET['id'])){
    $borrar= $libro->delete($_GET['id']);

    if($borrar){ /* SI SE BORRA */
        header('Location'. ROOT . 'estudiante/lista.php'); /* QUE SE ACTUALIZA LISTA */
    }else{ /* SINO SE BORRA QUE ME MUESTRE QUE HUBO UN ERROR */
        $mensaje= "<div class='alert-danger' rol='alert'>Error al eleminar el estudiante</div>";
    }
}

?>

<!DOCTYPE html>

<html>
<head>
<meta charset="UTF_8">
<title> Lista De Estudiantes </title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<?php include('../menu.php'); ?>

<div class="container">
    <h3>Lista De Estudiantes</h3>

    <div class="row">
        <?php
        while ($usuarios= mysqli_fetch_object($todosRegistros)){
            echo "<div class='col-6'>";
            echo "<div class='border border-info p-2'>";
            echo "<h5>Nombre: $usuarios->nombres  </h5>";
            echo "<p><b>Apellidos:</b> $usuarios->apellidos 
            <br>
            <b> Email: </b>  $usuarios->email
            <br>
            <b> celular </b> $usuarios->celular
            </p>";
          
            echo "<div class='center'> <a class='btn btn-success' href='". ROOT ."/estudiante/edit.php?id=$usuarios->id' >Modificar</a> - <a class='btn btn-danger' href='". ROOT ."/estudiante/index.php?id=$usuarios->id' >Eliminar</a> </div>";

            echo "</div>";
            echo "</div>";
        }

        ?>

    </div>
</div>
</body>
</html>