<?php
class ConfigApp {

  public static $ACTION = "action";
  public static $PARAMS = "params";
  public static $ACTIONS = [

      '' =>  'WebBeerController#index',
      'home' =>  'WebBeerController#home',
      'variedadCerveza' => 'WebBeerController#mostrarCervezas',
      'getCervezasOrdenadas' => 'WebBeerController#obtenerCervezasOrdenadas',
      'proceso' => 'WebBeerController#mostrarProceso',

      'obtenerCervezas' => 'WebBeerController#obtenerCervezas',
      'obtenerCerveza' => 'WebBeerController#obtenerCerveza',
      'obtenerCervezasPorEstilo' => 'WebBeerController#obtenerCervezasPorEstilo',
      'getEstilos' => 'WebBeerController#getEstilos',

      'login' =>  'LoginController#index',
      'logout' =>  'LoginController#destroy',
      'verificarUsuario' =>  'LoginController#verify',
      'createUser' =>  'LoginController#createUser',
      'mostrarCreateUser' =>  'LoginController#mostrarCreateUser',

      'adminList'=>  'AdminController#mostrarCervezas',
      'nuevaCerveza' =>  'AdminController#addCerveza',
      'guardarCerveza' =>  'AdminController#createCerveza',
      'eliminarCerveza' => 'AdminController#eliminarCerveza',
      'updateCerveza' => 'AdminController#mostrarUpdateCerveza',
      'modificarCerveza'=> 'AdminController#modificarCerveza',
      'mostrarUsuario'=> 'AdminController#mostrarUsuario',
      'eliminarUsuario'=> 'AdminController#eliminarUsuario',
      'cambiarPermiso'=> 'AdminController#cambiarPermiso',

      'nuevoEstilo'  =>  'AdminController#addEstilo',
      'guardarEstilo' =>  'AdminController#createEstilo',
      'eliminarEstilo' => 'AdminController#destroyEstilo',
      'updateEstilo' => 'AdminController#mostrarUpdateEstilo',
      'modificarEstilo'=> 'AdminController#modificarEstilo',
      'mostrarEstilo' =>  'AdminController#mostrarEstilos'


  ];
}

 ?>
