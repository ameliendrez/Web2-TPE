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

  function mostrarHome()
  {
    $this->smarty->display('templates/index.tpl');
  }
  function mostrarEstilos()
  {
    $this->smarty->display('templates/estilos.tpl');
  }
  function mostrarProcesos()
  {
    $this->smarty->display('templates/proceso.tpl');
  }
  function mostrarPedidos()
  {
    $this->smarty->display('templates/pedidos.tpl');
  }
  

}


 ?>
