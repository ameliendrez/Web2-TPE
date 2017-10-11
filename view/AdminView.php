<?php
  class AdminView extends View
  {
    function __construct()
    {
      parent::__construct();
      $this->smarty->assign('session', 'out');
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
      $this->smarty->display('templates/admin/agregarCerveza.tpl');
    }

    public function mostrarUpdateCerveza($id)
    {
      $this->smarty->assign('id', $id);
      $this->smarty->display('templates/admin/updateCerveza.tpl');
    }

    public function mostrarAddEstilo()
    {
      $this->smarty->display('templates/admin/agregarEstilo.tpl');
    }
  }

 ?>
