<?php
  include_once 'view/WebBeerView.php';
  include_once 'model/BeerModel.php';
  include_once 'model/BeerStyleModel.php';

  class WebBeerController extends Controller
  {
    function __construct()
    {
      $this->view = new WebBeerView();
      $this->model = new BeerModel();
      $this->styleModel = new BeerStyleModel();
    }

    public function index()
    {
      $this->view->mostrarIndex();
    }

    public function home()
    {
      $this->view->mostrarHome();
    }

    public function mostrarCervezas()
    {
      $estilos = $this->model->getCervezas();

      $this->view->mostrarEstilos($estilos);
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
