<?php
class ConfigApp{

  public static $ACTION = "action";
  public static $PARAMS = "params";
  public static $ACTIONS = [

      '' =>  'WebBeerController#index',
      'home' =>  'WebBeerController#index', //home es la accion... index es el método que se va a ejecutar
      'tareas' =>  'WebBeerController#index'

      // 'agregarTarea' =>  'TareasController#create',
      // 'guardarTarea' =>  'TareasController#store',
      // 'borrarTarea' =>  'TareasController#destroy',
      // 'finalizarTarea' =>  'TareasController#finish',
      // 'login' =>  'LoginController#index',
      // 'verificarUsuario' =>  'LoginController#verify'





  ];
}

 ?>
