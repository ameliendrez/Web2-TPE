<?php
class ConfigApp {

  public static $ACTION = "action";
  public static $PARAMS = "params";
  public static $ACTIONS = [

      '' =>  'WebBeerController#index',
      'home' =>  'WebBeerController#home',
      'variedadCerveza' => 'WebBeerController#mostrarCervezas',
      'proceso' => 'WebBeerController#mostrarProceso',
      'eliminarCerveza' => 'AdminController#eliminarCerveza',
      'login' =>  'LoginController#index',
      'logout' =>  'LoginController#destroy',
      'verificarUsuario' =>  'LoginController#verify',
      'adminList'=>  'AdminController#mostrarCervezas',
      'nuevaCerveza' =>  'AdminController#addCerveza',
      'mostrarEstilo' =>  'AdminController#mostrarEstilos',
      'nuevoEstilo'  =>  'AdminController#addEstilo',

  ];
}

 ?>
