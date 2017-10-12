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
      $estilos = $this->styleModel->getEstilos();
      $cervezas = $this->model->getCervezas();

      $this->view->mostrarVariedadCervezas($estilos, $cervezas);
    }
    public function obtenerCerveza($cerveza)
    {
      $getCerveza = $cerveza[0];
      $cerveza = $this->model->getCerveza($getCerveza);
      $this->view->obtenerCerveza($cerveza);
    }
    public function obtenerCervezas()
    {
      $cervezas = $this->model->getCervezas();
      $this->view->obtenerCervezas($cervezas);
    }

    public function obtenerCervezasPorEstilo($estilo)
    {
      $getEstilo = $estilo[0];
      $cervezas = $this->model->getCervezasByEstilo($getEstilo);
      $this->view->obtenerCervezas($cervezas);
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
