<?php
  class WebBeerView extends View
  {
    protected $estadoSession= 'in';

    function __construct()
    {
      parent::__construct();

    }

    function mostrarIndex($session, $userAdmin)
    {
      $this->smarty->assign('session', $session);
      $this->smarty->assign('userAdmin', $userAdmin);
      return $this->smarty->display('templates/index.tpl');
    }

    public function setComentario()
    {
      return $this->smarty->display('templates/crearComentario.tpl');
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

    function obtenerCerveza($cerveza, $imagenes, $session)
    {
      $this->smarty->assign('cerveza', $cerveza);
      $this->smarty->assign('imagenes', $imagenes);
      $this->smarty->assign('session', $session);
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
