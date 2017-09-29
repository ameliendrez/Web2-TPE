<?php
include_once 'libs/Smarty.class.php';


class WebBeerView
{

private $smarty;
  function __construct()
  {
    $this->smarty = new smarty();
    $this->smarty->assign('titulo', 'WEB BEER');

  }

  // function mostrarTareas($tareas)
  // {
  //   $this->smarty->assign('tareas', $tareas);
  //   $this->smarty->display('templates/index.tpl');
  // }
  //
  // function mostrarCrearTareas()
  // {
  //   $this->asignarTareasForm();
  //   $this->smarty->display('templates/formCrear.tpl');
  // }


}


 ?>
