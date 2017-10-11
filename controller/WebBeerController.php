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
    public function obtenerCervezas()
    {
      $this->view->obtenerCervezas();
    }

    public function obtenerCervezaPorEstilo()
    {
      print_r($_POST['estilos']);
      $estilo = $_POST['estilos'];
      $cervezas = $this->model->getCervezasByEstilo($estilo);
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
