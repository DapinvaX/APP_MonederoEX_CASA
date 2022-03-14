<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

echo 'Eliminar Registro';



require ('./DAO/MonederoDAO.php');



// PASO 1: RECUPERAR DATOS DEL POST

if(isset($_GET['id'])){

   $id = $_GET['id'];

}



// PASO 3:CREAR DAO Y LLAMAR A LA FUNCIÓN insertar CON EL DTO DEL PASO 2

$registroDAO = new MonederoDAO();



$resultado = $registroDAO->eliminarRegistro($id);



echo $resultado;

echo 'Registro eliminado';



header('Location: index.php');

ob_end_flush();





?>

