<?php

include_once 'view/WebBeerView.php';
include_once 'model/BeerModel.php';

define('HOME', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');
define('LOGIN', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/login');



class WebBeerController
{
  private $view;
  private $model;

  function __construct()
  {

    $this->view = new WebBeerView();
    $this->model = new BeerModel();
  }

  public function index()
  {
    $this->view->mostrarIndex();
  }
  public function home()
  {
    $this->view->mostrarHome();
  }

  public function mostrarEstilo()
  {
    $this->view->mostrarEstilos();
  }
  public function mostrarProceso()
  {
    $this->view->mostrarProcesos();
  }
  public function mostrarPedido()
  {
    $this->view->mostrarPedidos();
  }




}


 ?>
