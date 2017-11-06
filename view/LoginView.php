<?php
  class LoginView extends View
  {
    function mostrarLogin()
    {
    return $this->smarty->display('templates/Login/index.tpl');
    }

    function mostrarError($error='')
    {
      $this->smarty->assign('error', $error);
      return $this->smarty->display('templates/Login/index.tpl');
    }
    function mostrarCreateUser()
    {
    return $this->smarty->display('templates/Login/logincrear.tpl');
    }
  }
?>
