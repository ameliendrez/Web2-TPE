<?php
class ConfigApp {

  public static $ACTION = "action";
  public static $PARAMS = "params";
  public static $ACTIONS = [

      '' =>  'WebBeerController#index',
      'home' =>  'WebBeerController#home',
      'variedadCerveza' => 'WebBeerController#mostrarEstilo',
      'proceso' => 'WebBeerController#mostrarProceso',
      'eliminarCerveza' => 'WebBeerController#eliminarCerveza',
      'login' =>  'LoginController#index',
      'logout' =>  'LoginController#destroy',
      'verificarUsuario' =>  'LoginController#verify'

  ];
}

 ?>
