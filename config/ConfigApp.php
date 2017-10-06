<?php
class ConfigApp{

  public static $ACTION = "action";
  public static $PARAMS = "params";
  public static $ACTIONS = [

      '' =>  'WebBeerController#index',
      'home' =>  'WebBeerController#home', //home es la accion... index es el método que se va a ejecutar
      'variedadCerveza' => 'WebBeerController#mostrarEstilo',
      'proceso' => 'WebBeerController#mostrarProceso',
      'pedidos' => 'WebBeerController#mostrarPedido',
      'eliminarCerveza' => 'WebBeerController#eliminarCerveza'

      // 'login' =>  'LoginController#index',
      // 'verificarUsuario' =>  'LoginController#verify'





  ];
}

 ?>
