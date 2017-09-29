<?php
include_once 'libs/Smarty.class.php';


class LoginView
{

private $smarty;
  function __construct()
  {
    $this->smarty = new smarty();
    $this->smarty->assign('titulo', 'LOGIN');

  }

  function mostrarLogin($error='')
  {
    $this->smarty->display('templates/Login/index.tpl');
  }

  function mostrarError($error)
  {
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/Login/index.tpl');
  }


}


 ?>
