<?php
include_once('../config/config.php');
include('../config/Database.php');


class estudiante{

    public $conexion; /* LLAMO LA CONEXION DE MI BASE DE DATOS */

    function __construct(){
        $db= new Database(); /* LA CONEXION A LA BD SIEMPRE SE RENUEVE O ESTE EN LINEA */
        $this->conexion = $db->connectToDatabase();
    }

 
 function save ($params){
 $nombres = $params['nombres'];
 $apellidos = $params['apellidos'];
 $email = $params['email'];
 $celular = $params['celular'];

 
 $insert = "INSERT INTO  estudiantes VALUES(NULL,'$nombres','$apellidos','$email',$celular)";
 return mysqli_query($this->conexion,$insert); 
 }
 
 
 
 function getAll(){
     $sql="SELECT * FROM estudiantes";
     return mysqli_query($this->conexion,$sql);     
 }
 function getOne($id){
     $sql="SELECT * FROM estudiantes WHERE id =$id";
     return mysqli_query($this->conexion,$sql);     
 }
 

 function update($params){
    $nombres = $params['nombres'];
    $apellidos = $params['apellidos'];
    $email = $params['email'];
    $celular = $params['celular'];
    $id = $params['id'];
    

    $update = " UPDATE estudiantes SET nombres='$nombres', apellidos='$apellidos', email='$email', celular='$celular' WHERE id = $id";
    return mysqli_query($this->conexion, $update);
  }
 
 function delete($id){
    $eliminar= "DELETE FROM estudiantes WHERE id = $id"; /* Elimine de la tabla x, el id que me */
    return mysqli_query($this->conexion, $eliminar);
}

 
}
 
 
 ?>