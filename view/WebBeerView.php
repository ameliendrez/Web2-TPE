<?php
  class WebBeerView extends View
  {
    protected $estadoSession;

    function __construct()
    {
      parent::__construct();
      if ($this->estadoSession == '') {
        $this->estadoSession = $this->SetSession('in');
      }
    }

    public function SetSession($session)
    {
        $this->estadoSession = $session;
        $this->smarty->assign('session', $this->estadoSession);
    }

    function mostrarIndex()
    {
      return $this->smarty->display('templates/index.tpl');
    }
    function mostrarHome()
    {
      return $this->smarty->display('templates/home.tpl');
    }
    function mostrarVariedadCervezas($estilos, $cervezas)
    {
      $this->smarty->assign('estilos', $estilos);
      $this->smarty->assign('cervezas', $cervezas);
      return $this->smarty->display('templates/estilos.tpl');
    }

    function obtenerCerveza($cerveza, $imagenes)
    {
      $this->smarty->assign('cerveza', $cerveza);
      $this->smarty->assign('imagenes', $imagenes);
      return $this->smarty->display('templates/datosCerveza.tpl');
    }

    function obtenerCervezas($cervezas)
    {
      $this->smarty->assign('cervezas', $cervezas);
      return $this->smarty->display('templates/tablaCerveza.tpl');
    }

    function obtenerCervezasPorEstilo($cervezas)
    {
      $this->smarty->assign('cervezas', $cervezas);
      return $this->smarty->display('templates/tablaCerveza.tpl');
    }

    function mostrarEstilos($estilos)
    {
      $this->smarty->assign('estilos', $estilos);
      $this->smarty->display('templates/mostrarEstilos.tpl');
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
