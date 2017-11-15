<?php
  class AdminView extends View
  {
    protected $estadoSession = 'out';

    function __construct()
    {
      parent::__construct();
      $this->smarty->assign('session', $this->estadoSession);
    }

    function mostrarCervezas($cervezas)
    {

      $this->smarty->assign('cervezas', $cervezas);
      $this->smarty->display('templates/Admin/index.tpl');
    }

    function mostrarEstilos($estilos)
    {
      $this->smarty->assign('estilos', $estilos);
      $this->smarty->display('templates/Admin/estilos.tpl');
    }

    public function mostrarAddCerveza($estilos)
    {
      $this->smarty->assign('estilos', $estilos);
      $this->smarty->display('templates/Admin/agregarCerveza.tpl');
    }

    public function mostrarUpdateCerveza($id, $estilos, $cerveza)
    {
      $this->smarty->assign('estilos', $estilos);
      $this->smarty->assign('id', $id);
      $this->smarty->assign('cerveza', $cerveza);
      $this->smarty->display('templates/Admin/updateCerveza.tpl');
    }

    public function mostrarUpdateEstilos($id, $estilo)
    {
      $this->smarty->assign('id', $id);
      $this->smarty->assign('estilo', $estilo);
      $this->smarty->display('templates/Admin/updateEstilos.tpl');
    }

    public function mostrarAddEstilo()
    {
      $this->smarty->display('templates/Admin/agregarEstilo.tpl');
    }

    public function mostrarUsuario($usuarios)
    {
      $this->smarty->assign('usuarios', $usuarios);
      $this->smarty->display('templates/Admin/usuarios.tpl');
    }

    public function mostrarImagenes($imagenes, $cerveza)
    {
      $this->smarty->assign('imagenes', $imagenes);
      $this->smarty->assign('cerveza', $cerveza);
      $this->smarty->display('templates/Admin/imagenesCerveza.tpl');
    }

    function mostrarError($error='', $cerveza)
    {
      $this->smarty->assign('error', $error);
      $this->smarty->assign('cerveza', $cerveza);
      $this->smarty->display('templates/admin/agregarEstilo.tpl');
    }
  }

 ?>
