<?php
  class WebBeerView extends View
  {
    function mostrarIndex()
    {
      return $this->smarty->display('templates/index.tpl');
    }
    function mostrarHome()
    {
      return $this->smarty->display('templates/home.tpl');
    }
    function mostrarEstilos()
    {
      return $this->smarty->display('templates/estilos.tpl');
    }
    function mostrarProcesos()
    {
      return $this->smarty->display('templates/proceso.tpl');
    }
    function mostrarPedidos()
    {
      return $this->smarty->display('templates/pedidos.tpl');
    }
  }
 ?>
