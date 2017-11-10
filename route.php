<?php
  define('ACTION', 0);
  define('PARAMS', 1);

  include_once 'config/Router.php';
  include_once 'model/Model.php';
  include_once 'view/View.php';
  include_once 'controller/Controller.php';
  include_once 'controller/SecuredController.php';
  include_once 'controller/LoginController.php';
  include_once 'controller/WebBeerController.php';
  include_once 'controller/AdminController.php';

  $router = new Router();
  //(url, verb, controller, method)

  $router->AddRoute("", "GET", "WebBeerController", "index");
  $router->AddRoute("home", "GET", "WebBeerController", "home");
  $router->AddRoute("variedadCerveza", "GET", "WebBeerController", "mostrarCervezas");
  $router->AddRoute("getCervezasOrdenadas", "GET", "WebBeerController", "obtenerCervezasOrdenadas");
  $router->AddRoute("proceso", "GET", "WebBeerController", "mostrarProceso");
  $router->AddRoute("obtenerCervezas", "GET", "WebBeerController", "obtenerCervezas");
  $router->AddRoute("obtenerCerveza/:id", "GET", "WebBeerController", "obtenerCerveza");
  $router->AddRoute("obtenerCervezasPorEstilo/:estilo", "GET", "WebBeerController", "obtenerCervezasPorEstilo");
  $router->AddRoute("getEstilos", "GET", "WebBeerController", "getEstilos");

  $router->AddRoute("login", "GET", "LoginController", "index");
  $router->AddRoute("logout", "GET", "LoginController", "destroy");
  $router->AddRoute("verificarUsuario", "POST", "LoginController", "verify");
  $router->AddRoute("createUser", "GET", "LoginController", "createUser");
  $router->AddRoute("mostrarCreateUser", "GET", "LoginController", "mostrarCreateUser");

  $router->AddRoute("adminList", "GET", "AdminController", "mostrarCervezas");
  $router->AddRoute("nuevaCerveza", "GET", "AdminController", "addCerveza");
  $router->AddRoute("guardarCerveza", "POST", "AdminController", "createCerveza");
  $router->AddRoute("eliminarCerveza/:id", "GET", "AdminController", "eliminarCerveza");
  $router->AddRoute("updateCerveza/:id", "GET", "AdminController", "mostrarUpdateCerveza");
  $router->AddRoute("modificarCerveza", "POST", "AdminController", "modificarCerveza");
  $router->AddRoute("mostrarUsuario", "GET", "AdminController", "mostrarUsuario");
  $router->AddRoute("eliminarUsuario/:id", "GET", "AdminController", "eliminarUsuario");
  $router->AddRoute("cambiarPermiso/:id/:permiso", "GET", "AdminController", "cambiarPermiso");
  $router->AddRoute("imagenesCerveza/:id", "GET", "AdminController", "mostrarImagenes");
  $router->AddRoute("eliminarImagen/:id", "GET", "AdminController", "eliminarImagen");
  $router->AddRoute("nuevoEstilo", "GET", "AdminController", "addEstilo");
  $router->AddRoute("guardarEstilo", "POST", "AdminController", "createEstilo");
  $router->AddRoute("eliminarEstilo/:id", "GET", "AdminController", "destroyEstilo");
  $router->AddRoute("updateEstilo/:id", "GET", "AdminController", "mostrarUpdateEstilo");
  $router->AddRoute("modificarEstilo", "POST", "AdminController", "modificarEstilo");
  $router->AddRoute("mostrarEstilo", "GET", "AdminController", "mostrarEstilos");


  //Se carga la accion que viene por url y se llama a la funcion url para que genere el array
  //con el controlador, el metodo y los parametros por url
  $route = $_GET['action']; // En la api esto va a ser 'resources'
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
