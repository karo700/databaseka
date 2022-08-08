<?php 
include_once('../config/config.php');
include('estudiante.php');



 if (isset($_POST) && !empty($_POST)){
    /* SI EXISTE UN REGISTRO Y NO ESTA VACIO */
  
    $data= new estudiante(); /* LLAMO A MI LIBRO DE RECETAS */
  
  
    $save = $data-> save($_POST); /* UTILICE LA RECETA SAVE */
    if($save){
      $mensaje= '<div class="alert alert-success" role="alert">Usuario creado correctamente </div> ';
    }else{
      $mensaje='<div class="alert alert-danger" role="alert">Error al crear el usuario </div> ';
    }
  }
?>     

<!DOCTYPE html>
<html>
 <head>
    <meta charset="UTF-8">
    <title>Registrar Estudiante </title>
     
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
<body>
<?php include('../menu.php') ?>
<?php 
      if (isset($mensaje)){
        echo $mensaje;
      }
?>
    <div class="container">
          <h2 class="text-center mb-2">Registrar Estudiante</h2>
            <form method="POST" enctype="multipart/form-data">
                     <div class="row mb-2">
                         <div class="col">
                         <input type="text" name="nombres" id="nombres" placeholder="nombre del estudiante" class="form-control" required/>
                        </div>
                        <div class="col">
                         <input type="text" name="apellidos" id="apellidos" placeholder="apellidos  del estudiante" class="form-control" required/>
                        </div>
                     </div>
                     <div class="row mb-2">
                         <div class="col">
                         <input type="text" name="email" id="email" placeholder="correo del estudiante" class="form-control" required/>
                        </div>
                        <div class="col">
                         <input type="number" name="celular" id="celular" placeholder="celular  del estudiante" class="form-control" required/>
                        </div>
                     </div>
                     <button class="btn btn-success">Registrar Estudiante </button>
             </form>
    </div>     
</body>
</html>