<?php
  class LoginView extends View
  {
    function mostrarLogin()
    {
      $this->smarty->display('templates/Login/index.tpl');
    }

    function mostrarError($error='')
    {
      $this->smarty->assign('error', $error);
      $this->smarty->display('templates/Login/index.tpl');
    }
  }
?>
