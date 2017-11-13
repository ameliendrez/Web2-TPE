<?php
 abstract class Api {
   protected $model;
   protected $raw_data;

   function __construct(){
     $this->raw_data = file_get_contents("php://input");        //Lee el json recibido y lo asigna a raw_data en un solo string
   }
   protected function json_response($data, $status) {
     header("Content-Type: application/json");                  //Le aviso que espero JSON
     header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
     return json_encode($data);                                 //Devuelvo la data encodeada
   }

   private function _requestStatus($code){
       $status = array(
         200 => "OK",
         404 => "Not found",
         500 => "Internal Server Error"
       );
       return ($status[$code])? $status[$code] : $status[500];  //Devuelvo el mensaje de status segun el codigo que recibo
     }
 }

 ?>
