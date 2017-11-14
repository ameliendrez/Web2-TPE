<?php

 require_once('model/ComentariosModel.php');
 require_once('Api.php');


 class ComentariosApiController extends Api
 {
   protected $model;

   function __construct()
   {
     parent::__construct();
     $this->model = new ComentariosModel();
   }

   public function getAllComentarios($url_params = [])  //Recibo los parametros de la url y si el endpoint esta escrito
   {
     $comentarios = $this->model->getAllComentarios();
     return $this->json_response($comentarios, 200);
   }


   public function getComentariosByCerveza($url_params = [])  //Recibo los parametros de la url y si el endpoint esta escrito
   {
     $nombre_cerveza = $url_params[':idCerveza'];
     $comentarios = $this->model->getComentarios($nombre_cerveza);
     $response = new stdClass();
     $response->comentarios = $comentarios;
     $response->status = 200;
     return $this->json_response($response, 200);
   }

   public function getComentario($url_params = [])
   {
     $id_comentario = $url_params[":idComentario"];
     $comentario = $this->model->getComentario($id_comentario);
     if ($comentario) {
       return $this->json_response($comentario, 200);
     }
     else {
       return $this->json_response(false, 404);
     }
   }

   public function borrarComentario($url_params = [])
   {
     $id_comentario = $url_params[":idComentario"];
     $comentario = $this->model->getComentario($id_comentario);
     if ($comentario)
     {
       $this->model->borrarComentario($id_comentario);
       return $this->json_response("Borrado exitoso", 200);
     }
     else
       return $this->json_response(false, 404);
    }

     public function crearComentario($url_params = [])
     {
       $body = json_decode($this->raw_data);
       $comentario = $body->comentario;
       $id_cerveza = $body->id_cerveza;
       $id_usuario = $body->id_usuario;
       $data = $this->model->crearComentario($comentario, $id_cerveza, $id_usuario);
       return $this->json_response($data, 200);
     }
 }
  ?>
