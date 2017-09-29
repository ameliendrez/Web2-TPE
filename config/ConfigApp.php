<?php
class ConfigApp{

  public static $ACTION = "action";
  public static $PARAMS = "params";
  public static $ACTIONS = [

      '' =>  'TareasController#index',
      'home' =>  'TareasController#index', //home es la accion... index es el método que se va a ejecutar
      'tareas' =>  'TareasController#index',
      'palabrasprohibidas' =>  'PalabrasProhibidasController#index',
      'agregarPalabraProhibida' =>  'PalabrasProhibidasController#create',

      'agregarTarea' =>  'TareasController#create',
      'guardarTarea' =>  'TareasController#store',
      'borrarTarea' =>  'TareasController#destroy',
      'finalizarTarea' =>  'TareasController#finish',
      'login' =>  'LoginController#index',
      'verificarUsuario' =>  'LoginController#verify'





  ];
}

 ?>
