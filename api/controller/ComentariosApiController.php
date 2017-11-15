<?php

 require_once 'model/ComentariosModel.php';
 require_once 'model/PuntuacionCervezaModel.php';
 require_once 'Api.php';
 //require_once 'libs/recaptchalib.php';


 class ComentariosApiController extends Api
 {
   protected $modelPuntuacion;
   // private $secret = "6Ley3TgUAAAAALPxyDyCgYihMJXoQ0r_zNou7F2h";


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
       // $captcha = $body->capcha;
       //
       // $capcha = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . RECAPTCHA_SECRET . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']));
       // if($captcha->success == false)
       // {
       //     print_r(json_encode(array('status' => 'error', 'message' => 'No valid Captcha')));
       // }
       // else{
       //
       // }     $capcha = $body->capcha;

       // $response = null;
       // $reCaptcha = new ReCaptcha($secret);
       // if ($_POST["g-recaptcha-response"]) {
       //      $response = $reCaptcha->verifyResponse(
       //          $_SERVER["REMOTE_ADDR"],
       //          $_POST["g-recaptcha-response"]
       //      );
       // //  }
       // if ($response != null && $response->success) {
       //    echo "Hi " . $_POST["name"] . " (" . $_POST["email"] . "), thanks for submitting the form!";
       //  } else {



       $puntuacion = $this->modelPuntuacion->setPuntuacion($id_cerveza,$puntaje);
       $data = $this->model->crearComentario($comentario, $id_cerveza, $id_usuario);
       return $this->json_response($data, 200);
     }
 }
  ?>
