<?php
include_once('../config/config.php');
include("estudiante.php");

$p = new estudiante();
$dp = mysqli_fetch_object($p->getOne($_GET['id']));


if (isset($_POST) && !empty($_POST)){

  $update = $p->update($_POST);
  if ($update){
    $error = '<div class="alert alert-success" role="alert">Paciente modificado correctamente</div>';
  }else{
    $error = '<div class="alert alert-danger" role="alert" > Error al modificar un paciente </div>';
  }
}

?>

<!DOCTYPE html>
<html lasng="es">
    <head>
<meta charset="UTF-8">
<title>Registrar Estudiante </title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


    </head>
<body>
<?php include('../menu.php'); ?>
    <div class="container">
        
        <?php
        if(isset($error)){
            echo $error;
        }
        ?>

        <h2 class="text-center mb-2">registrar sesion</h2>
        <form method="POST" enctype="multipart/form-data">
<div class="row mb-2">
    <div class="col">
        <input type="text" name="nombres" id="nombres" placeholder="Nombres" required class="form-control" value="<?= $dp->nombres?>"/>
        <input type="hidden" name="id" id="id"  required class="form-control" value="<?= $dp->id?>"/>
    </div>
    <div class="col">
        <input type="text" name="apellidos" id="apellidos" placeholder="apellidos" class="form-control" value="<?= $dp->apellidos?>"/>
    </div>
</div>
     <div class="row mb-2">
        <div class="col">
        <input type="text" name="email" id="email" placeholder="correo del estudiante" class="form-control" value="<?= $dp->email?>"/>
        </div>
        <div class="col">
    <input type="number" name="celular" id="celular" placeholder="celular  del estudiante" class="form-control"value="<?= $dp->celular?>"/>
    </div>
</div>
                     

<button class="btn-success">registrar</button>

    </form>

</body>
</html>

 