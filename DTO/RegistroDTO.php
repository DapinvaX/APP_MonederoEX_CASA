<?php



class RegistroDTO{



   private $id;

   private $concepto;

   private $fecha;

   private $importe;



   function __contruct(){



   }



   function getId(){

       return $this->id;

   }



   function setId($id){



       $this->id=$id;

   }



   function getConcepto(){

       return $this->concepto;

   }



   function setConcepto($concepto){



       $this->concepto=$concepto;

   }



   function getFecha(){

       return $this->fecha;

   }



   function setFecha($fecha){



       $this->fecha=$fecha;

   }



   function getImporte(){

       return $this->importe;

   }



   function setImporte($importe){



       $this->importe=$importe;

   }







}





?>

