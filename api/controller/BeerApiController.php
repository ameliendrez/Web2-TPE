<?php

 require_once('model/BeerModel.php');
 require_once('Api.php');


 class BeerApiController extends Api
 {
   protected $model;

   function __construct()
   {
     parent::__construct();
     $this->model = new BeerModel();
   }

   public function getComentariosCerveza($url_params = [])  //Recibo los parametros de la url y si el endpoint esta escrito
   {                                                        //correctamente y el comentario existe traigo los datos de la tabla
     if (sizeof($url_params) == 1) {
         $id_cerveza = $url_params[0];
         $cerveza = $this->model->getComentariosCerveza($id_cerveza);
         if($cerveza) {
           $response = new stdClass();
           $response->comentarios = $cerveza;
           $response->status = 200;
          return $this->json_response($response, 200);
        }
         else {
           return $this->json_response(false, 404);
        }
      }
       else {
         return $this->json_response(false, 404);
        }
     }

     public function borrarComentario($url_params = [])
     {
       switch (sizeof($url_params)) {
         case 0:
           return $this->json_response(false, 400);
           break;
         case 1:
           $id_comentario = $url_params[0];
           $comentario = $this->model->getComentario($id_comentario);
           if($comentario)
           {
             $this->model->borrarComentario($id_comentario);
             return $this->json_response("Borrado exitoso.", 200);
           }
           else {
             return $this->json_response(false, 404);
           }
         default:
           return $this->json_response(false, 404);
           break;
       }
   }

     public function crearComentario($url_params = [])
     {
     if (sizeof($url_params) == 0) {
       $body = json_decode($this->raw_data);
       $comentario = $body->comentario;
       $id_cerveza = $body->id_cerveza;
       $id_usuario = $body->id_usuario;
       $data = $this->model->crearComentario($comentario, $id_cerveza, $id_usuario);
       return $this->json_response($data, 200);

     }
     else {
       return $this->json_response(false, 404);
     }
   }

 }
  ?>
