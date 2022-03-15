<?php



ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

require_once __DIR__.'/DAO/MonederoDAO.php';



?>





<!DOCTYPE html>

<html>

<title>Monedero</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta charset="UTF-8">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>



<div class="w3-container">

 <h2>Monedero</h2>

  <table class="w3-table w3-bordered">

   <tr>

     <th>Concepto</th>

     <th>Fecha</th>

     <th>Importe</th>

     <th></th>

     <th></th>

   </tr>



   <?php

  $monederoDAO =  new MonederoDAO();

  if(isset($_POST["buscar"])){

    $conceptoBusqueda = "";
    $fechaBusqueda = "";
    $importeBusqueda = 0 ;
     //PREGUNTAR POR LOS CAMPOS DE BÚSQUEDA
     //SI VIENEN EN EL POST LOS RECUPEPRO
     //SI NO VIENEN LOS INICIALIZO A "" o 0
    $conceptoBusqueda =  $_POST["buscar"];
    $fechaBusqueda =  $_POST["buscar"];
    $importeBusqueda =  $_POST["buscar"];

    //pasar a la función los campos de búsqueda
    $listaConceptos =  $monederoDAO->buscar($conceptoBusqueda,$fechaBusqueda,$importeBusqueda);
   
    
  }else{
    $listaConceptos =  $monederoDAO->obtenerResgistros();

  }

 

 



   $id=0;

   if(isset($_GET['id'])){

     $id=$_GET['id'];

   }



     foreach($listaConceptos as $concepto){

      

         $fechaMysql = strtotime($concepto["fecha"]);   

         $fecha = date('d/m/Y',$fechaMysql);



         if($id==$concepto["id"]){

           $html = '

           <form action="modificarDatoRegistroPDO.php" method="POST">
           <input class="w3-input w3-border" type="hidden" name="id" value="'.$concepto["id"].'">
            <tr>

           <td><input class="w3-input w3-border" type="text" name="concepto" value="'.$concepto["concepto"].'"></td>

           <td><input class="w3-input w3-border" type="date" name="fecha" value="'.$fechaMysql.'" ></td>

           <td><input class="w3-input w3-border" type="text" name="importe" value="'.$concepto["importe"].'" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></td>
           
           
           <td>  <input type="submit" class="w3-btn w3-green" value="Guardar">  </td>

           <td>  <a href="index.php" type="button" class="w3-btn w3-red">Cancelar</a> </td>
          <!-- <td>  <input type="button" class="w3-btn w3-red" value="Cancelar" onclick="history.back();"> </td> -->


           <td> </td>

         </tr>

         </form>';

         }else{

           $html = ' <tr>

           <td>'.$concepto["concepto"].'</td>

           <td>'.$fecha.'</td>

           <td>'.$concepto["importe"].'</td>

           <td> <a href="index.php?id='.$concepto["id"].'" class="w3-btn w3-khaki">Editar</a></td>

           <td> <a href="eliminarDatoRegistroPDO.php?id='.$concepto["id"].'" class="w3-btn w3-red">Eliminar</a></td>

         </tr>';

         }

       



       echo $html;



     }



 ?>

  </table>

</div>



 <table class="w3-table w3-bordered"> 

   <tr>

     <form action="insertarDatoRegistroPDO.php" method="POST">

     <td><input class="w3-input w3-border" type="text" name="concepto" placeholder="Concepto"></td>

     <td> <input class="w3-input w3-border" type="date" name="fecha" placeholder="Fecha"></td>

     <td> <input class="w3-input w3-border" type="text" name="importe" placeholder="Importe" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></td>

     <td> <input type="submit" class="w3-btn w3-green" value="Registrar"></td>

     </form>

   </tr>

 

 </table>



 <table class="w3-table w3-bordered">

  

   <tr>

      <form action="index.php" method="POST">


        <input class="w3-input w3-border" type="hidden" name="buscar" value="buscar">
        <td><input class="w3-input w3-border" type="text" name="campoBusquedaConcepto" placeholder="Buscar por concepto"></td>
        <td><input class="w3-input w3-border" type="text" name="campoBusquedaFecha" placeholder="Buscar por fecha"></td>
        <td><input class="w3-input w3-border" type="text" name="campoBusquedaImporte" placeholder="Buscar por importe"></td>
        
        <td> <input type="submit" class="w3-btn w3-blue" value="Buscar"></td>
     

      </form>
  
   </tr>

 

 </table>



 <div class="w3-container">

  

    <div class="w3-container w3-border w3-large">

    <!-- <div class="w3-left-align"><p>El número de registro es 14.</p></div> -->

    <!-- <div class="w3-left-align"><p>El balance del monedero es 569 €.</p></div> -->

   </div>

 </div>



</body>

</html>

