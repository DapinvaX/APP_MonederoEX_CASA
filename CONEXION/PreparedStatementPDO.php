<?php
//Dump de errores en el navegador
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

?>

<?php
 
 require_once("conexionPDO.php");

try {
    $conexion = new PDO("mysql:host=".$config['host'].";dbname=".$config['dbname'], $config['username'], $config['password']);
    // Establecemos el modo de error de PDO para que salten excepciones
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparamos y vinculamos parametros para que si no existe un administrador, se cree.
    $stmt = $con->prepare("INSERT INTO usuarios (nomCompleto, email, usuario, pass ) WHERE IF NOT EXISTS usuario='administrador' VALUES (:nomCompleto, :email, :usuario, :pass) ");
    $stmt->bindParam(':nomCompleto', $nomCompleto);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':pass', $pass);


    //insertaramos
   
    
    if($usuario!="administrador"){
        $nomCompleto = "DANIEL PINTADO VÁREZ";
        $email = "dapinva95@gmail.com";
        $usuario = "administrador";
        $pass = "Admin1234";
    }


    $stmt->execute();

    echo "Nuevas filas insertadas correctamente";
    echo '<script type="text/javascript">'
    , 'alert("Fila añadida correctamente");'
    , '</script>'
 ;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$con = null;
