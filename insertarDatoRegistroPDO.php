<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

echo 'Insertar Registro';



require ('./DAO/MonederoDAO.php');



// PASO 1: RECUPERAR DATOS DEL POST

if(isset($_POST['concepto'])){

   $concepto = $_POST['concepto'];

}

if(isset($_POST['fecha'])){

   $fecha = $_POST['fecha'];

}

if(isset($_POST['importe'])){

   $importe = $_POST['importe'];

}

echo "DATOS REGISTRO";

echo $concepto;

echo $fecha;

echo $importe;



// PASO 2: CREAR DTO/VO/TO E INICIALIZAR

$registro = new RegistroDTO();

$registro->setConcepto($concepto);

$registro->setFecha($fecha);

$registro->setImporte($importe);





// PASO 3:CREAR DAO Y LLAMAR A LA FUNCIÓN insertar CON EL DTO DEL PASO 2

$registroDAO = new MonederoDAO();



echo "DATOS REGISTRO";

echo $registro->getConcepto();

echo $registro->getFecha();

echo $registro->getImporte();



$resultado = $registroDAO->insertarRegistro($registro);



echo $resultado;

echo 'Registro insertado';



header('Location: index.php');

ob_end_flush();





?>