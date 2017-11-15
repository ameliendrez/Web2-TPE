<?php

 require_once('model/ComentariosModel.php');
 require_once('model/PuntuacionCervezaModel.php');
 require_once('Api.php');


 class ComentariosApiController extends Api
 {
   protected $modelPuntuacion;


   function __construct()
   {
     parent::__construct();
     $this->model = new ComentariosModel();
     $this->modelPuntuacion = new PuntuacionCervezaModel();
   }

   public function getAllComentarios($url_params = [])  //Recibo los parametros de la url y si el endpoint esta escrito
   {
     $comentarios = $this->model->getAllComentarios();
     if($comentarios) {
       $response = new stdClass();
       $response->comentarios = $comentarios;
       return $this->json_response($response, 200);
     }
     else{
       return $this->json_response(false, 404);
     }
   }


   public function getComentariosByCerveza($url_params = [])  //Recibo los parametros de la url y si el endpoint esta escrito
   {
     $id_cerveza = $url_params[':idCerveza'];
     $comentarios = $this->model->getComentarios($id_cerveza);

     //ACA HAY QUE CONTROLAR QUE LO HAGA CORRECTAMENTE
     $puntaje = $this->modelPuntuacion->getPromedio($id_cerveza);
     $puntaje = round($puntaje, 1);

     if($comentarios) {
       $response = new stdClass();
       $response->comentarios = $comentarios;

       //ACA HAY QUE CONTROLAR QUE LO HAGA CORRECTAMENTE
       $response->puntaje = $puntaje;

       return $this->json_response($response, 200);
     }
     else{
       return $this->json_response(false, 404);
     }

   }

   public function getComentario($url_params = [])
   {
     $id_comentario = $url_params[":idComentario"];
     $comentario = $this->model->getComentario($id_comentario);
     if($comentario) {
       $response = new stdClass();
       $response->comentario = $comentario;
       return $this->json_response($response, 200);
     }
     else{
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
       $puntaje = $body->puntaje;
       $puntuacion = $this->modelPuntuacion->setPuntuacion($id_cerveza,$puntaje);
       $data = $this->model->crearComentario($comentario, $id_cerveza, $id_usuario);
       return $this->json_response($data, 200);
     }
 }
  ?>
