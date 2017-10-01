<?php
  include_once 'view/WebBeerView.php';
  include_once 'model/BeerModel.php';

  class WebBeerController extends controller
  {
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
