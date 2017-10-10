<?php
  class WebBeerView extends View
  {
    function __construct()
    {
      parent::__construct();
      $this->smarty->assign('session', 'in');
    }

    function mostrarIndex()
    {
      // $password = password_hash('admin1605', PASSWORD_DEFAULT); // Esto sirve para guardar el hash de la contraseña
      // echo ($password);

      return $this->smarty->display('templates/index.tpl');
    }
    function mostrarHome()
    {
      return $this->smarty->display('templates/home.tpl');
    }
    function mostrarEstilos($estilos)
    {
      $this->smarty->assign('estilos', $estilos);
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
