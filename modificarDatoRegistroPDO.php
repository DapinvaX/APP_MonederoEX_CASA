<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

echo 'Editar Registro';



require ('./DAO/MonederoDAO.php');



// PASO 1: RECUPERAR DATOS DEL POST

if(isset($_GET['id'])){

   $id = $_GET['id'];

}

if(isset($_GET['concepto'])){

    $concepto = $_GET['concepto'];
 
 }

 if(isset($_GET['importe'])){

    $importe = $_GET['importe'];
 
 }

 if(isset($_GET['fecha'])){

    $fecha = $_GET['fecha'];
 
 }

 
// PASO 3:CREAR DAO Y LLAMAR A LA FUNCIÓN insertar CON EL DTO DEL PASO 2

$registroDAO = new MonederoDAO();



$resultado = $registroDAO->modificarRegistro($id); 



echo $resultado;

echo 'Registro modificado';



header('Location: index.php');

ob_end_flush();





?>
