<?php
class ConfigApp {

  public static $ACTION = "action";
  public static $PARAMS = "params";
  public static $ACTIONS = [

      '' =>  'WebBeerController#index',
      'home' =>  'WebBeerController#home',
      'variedadCerveza' => 'WebBeerController#mostrarCervezas',
      'proceso' => 'WebBeerController#mostrarProceso',

      'obtenerCervezas' => 'WebBeerController#obtenerCervezas',
      //'obtenerCerveza' => 'WebBeerController#mostrarProceso',
      'obtenerCervezaPorEstilo' => 'WebBeerController#obtenerCervezaPorEstilo',

      'login' =>  'LoginController#index',
      'logout' =>  'LoginController#destroy',
      'verificarUsuario' =>  'LoginController#verify',
      'adminList'=>  'AdminController#mostrarCervezas',

      'nuevaCerveza' =>  'AdminController#addCerveza',
      'guardarCerveza' =>  'AdminController#createCerveza',
      'eliminarCerveza' => 'AdminController#eliminarCerveza',
      'updateCerveza' => 'AdminController#mostrarUpdateCerveza',
      'modificarCerveza'=> 'AdminController#modificarCerveza',

      'nuevoEstilo'  =>  'AdminController#addEstilo',
      'guardarEstilo' =>  'AdminController#createEstilo',
      'eliminarEstilo' => 'AdminController#destroyEstilo',
      'updateEstilo' => 'AdminController#mostrarUpdateEstilo',
      'modificarEstilo'=> 'AdminController#modificarEstilo',
      'mostrarEstilo' =>  'AdminController#mostrarEstilos'


  ];
}

 ?>
