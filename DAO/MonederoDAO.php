<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);



require __DIR__.'/../DTO/RegistroDTO.php';



class MonederoDAO{


   public function obtenerResgistros(){



     try {


       require ('./CONEXION/conexionPDO.php');

       $sql = "SELECT id, concepto, fecha, importe FROM monedero";

       $conceptos = $conexion->query($sql);

       return $conceptos;

      } catch(PDOException $e) {

        echo "Error: " . $e->getMessage();

        }

         $conexion = null;

   }



   public function obtenerRegistroPorId($id){

    try {

      require ('./CONEXION/conexionPDO.php');     

      $sql = "SELECT id, concepto, fecha, importe FROM monedero WHERE id=".$id;

      $conceptos = $conexion->query($sql);

      return $conceptos;


     } catch(PDOException $e) {

       echo "Error: " . $e->getMessage();

       }

        $conexion = null; 

   }

   public function buscar($campoBusquedaConcepto,$campoBusquedaFecha,$campoBusquedaImporte){

    try {

      require ('./CONEXION/conexionPDO.php');     

      $sql = "SELECT id, concepto, fecha, importe FROM monedero WHERE 1 ";
      
      if($campoBusquedaConcepto!=''){

        $sql.=" AND concepto='".$campoBusquedaConcepto."'";
      }

      if($campoBusquedaFecha!=''){

        $sql.=" AND fecha=".$campoBusquedaFecha;
      }

      if($campoBusquedaImporte!=''){

        $sql.=" AND importe=".$campoBusquedaImporte;
      }
     
      $conceptos = $conexion->query($sql);

      return $conceptos;


     } catch(PDOException $e) {

       echo "Error: " . $e->getMessage();

       }

        $conexion = null; 



   }

  



   public function insertarRegistro($registroDTO){


       try {


           require_once './CONEXION/conexionPDO.php';


           $fecha = strtotime($registroDTO->getFecha());   

           $fechaMysql = date('Y-m-d',$fecha);

           $sql = "INSERT INTO monedero (concepto,fecha, importe) VALUES ('".$registroDTO->getConcepto()."','".$fechaMysql."',".$registroDTO->getImporte().")";

           // se usa exec() porque la sentencia no devuelve ningún valor

           $conexion->exec($sql);

           return "<p>Nueva fila creada correctamente";

         } catch(PDOException $e) {

           return $sql . "<br>" . $e->getMessage();

         }

         $conexion = null;  

     }

   public function modificarRegistro($registroDTO){

    try {

        require ('./CONEXION/conexionPDO.php');     
 
        $sql = "UPDATE monedero SET concepto='".$registroDTO->getConcepto()."',importe=".$registroDTO->getImporte().",fecha='".$registroDTO->getFecha()."' WHERE id=".$registroDTO->getId()  ;

        $conexion->query($sql);

        return $sql;
 
 
       } catch(PDOException $e) {
 
         echo "Error: " . $e->getMessage();
 
         }
 
          $conexion = null; 

      }

    

   public function eliminarRegistro($id){

    try {

      require ('./CONEXION/conexionPDO.php');

      $sql = "DELETE FROM monedero WHERE id=".$id;

      $conexion->query($sql);

     } catch(PDOException $e) {

       echo "Error: " . $e->getMessage();

       }

        $conexion = null;

    }
  }

?>

