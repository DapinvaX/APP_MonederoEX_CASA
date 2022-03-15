<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

echo 'Editar Registro';



require ('./DAO/MonederoDAO.php');
//require ('./DTO/RegistroDTO.php');



// PASO 1: RECUPERAR DATOS DEL POST

if(isset($_POST['id'])){

   $id = $_POST['id'];

}

if(isset($_POST['concepto'])){

    $concepto = $_POST['concepto'];
 
 }

 if(isset($_POST['importe'])){

    $importe = $_POST['importe'];
 
 }

 if(isset($_POST['fecha'])){

    $fecha = $_POST['fecha'];
 
 }

 
// PASO 3:CREAR DAO Y LLAMAR A LA FUNCIÓN insertar CON EL DTO DEL PASO 2

$monderoDAO = new MonederoDAO();
$registroDTO = new RegistroDTO();

$registroDTO->setId($id);
$registroDTO->setConcepto($concepto);
$registroDTO->setFecha($fecha);
$registroDTO->setImporte($importe);


$resultado = $monderoDAO->modificarRegistro($registroDTO); 


echo 'Registro modificado';



header('Location: index.php');

ob_end_flush();





?>
