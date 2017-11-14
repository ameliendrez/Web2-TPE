<?php

 define('RESOURCE', 0);
 define('PARAMS', 1);

 include_once 'config/Router.php';
 include_once 'model/Model.php';
 include_once 'api/controller/ComentariosApiController.php';

 $router = new Router();
 //(url, verb, controller, method)

 $router->AddRoute("cervezas", "GET", "ComentariosApiController", "getAllComentarios");
 $router->AddRoute("cervezas/:idCerveza", "GET", "ComentariosApiController", "getComentariosByCerveza");
 $router->AddRoute("cervezas/:idComentario", "DELETE", "ComentariosApiController", "borrarComentario");
 $router->AddRoute("cervezas", "POST", "ComentariosApiController", "crearComentario");

 //Se carga la accion que viene por url y se llama a la funcion url para que genere el array
 //con el controlador, el metodo y los parametros por url
 $route = $_GET['resource']; // En la api esto va a ser 'resources'
 $array = $router->Route($route);

 if(sizeof($array) == 0) {
   echo "404";
 }
 else
 {
     $controller = $array[0];
     $metodo = $array[1];
     $url_params = $array[2];
     echo (new $controller())->$metodo($url_params);
 }

 ?>
