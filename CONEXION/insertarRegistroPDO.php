<?php
//Dump de errores en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php

//Método 1: Añadiendo el archivo conexion.php que obtiene la conexión
// leyendo los datos de conexión de un fichero .ini
include_once 'conexionPDO.php';



//Método 2: Usando un array para almacenar los datos de conexión.
// Este array puede ir fuera o dentro del fichero que va a usar la base de datos.

/* $dbConfig = array(

    'host' => 'localhost',
    'port' => '3306',
    'user' => 'root',
    'pass' => 'admin1234',
    'db' => 'dawBD',
); */



//Crear constantes para definir los datos de conexión.
//Estas constantes pueden ir dentro o fuera del fichero que va a usar la base de datos.

/* define("SERVIDOR", "localhost");
define("USUARIO", "usuarioDAW");
define("CLAVE", "admin1234");
define("BBDD", "dawBD");
*/


// Crear una conexion
try {
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO monedero (id, nomCompleto, email, usuario, pass) VALUES (id:, nomCompleto:, email:, usuario:, pass:)";
    // se usa exec() porque la sentencia no devuelve ningún valor

    $conexion->exec($sql);

    echo "<p>Nueva fila creada correctamente";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conexion = null;

?>
