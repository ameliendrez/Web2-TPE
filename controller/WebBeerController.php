<?php

include_once 'view/CerveceriaView.php';
include_once 'model/CerveceriaModel.php';
include_once 'model/PalabrasProhibidasModel.php';

define('HOME', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');
define('LOGIN', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/login');



class WebBeerController
{
  private $view;
  private $model;

  function __construct()
  {

    $this->view = new CerveceriaView();
    $this->model = new CerveceriaModel();
  }




}


 ?>
