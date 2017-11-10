<?php
  include_once 'view/WebBeerView.php';
  include_once 'model/BeerModel.php';
  include_once 'model/BeerStyleModel.php';
  include_once 'model/ImageModel.php';

  class WebBeerController extends Controller
  {
    protected $view;
    protected $model;
    protected $styleModel;
    protected $imageModel;

    function __construct()
    {
      $this->view = new WebBeerView();
      $this->model = new BeerModel();
      $this->styleModel = new BeerStyleModel();
      $this->imageModel = new ImageModel();
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
      $id_cerveza = $cerveza[0];
      $cerveza = $this->model->getCerveza($id_cerveza);
      $imagenes = $this->imageModel->getImagenes($id_cerveza);
      $this->view->obtenerCerveza($cerveza, $imagenes);
    }
    public function obtenerCervezas()
    {
      $cervezas = $this->model->getCervezas();
      $this->view->obtenerCervezas($cervezas);
    }
    public function obtenerCervezasOrdenadas()
    {
      $cervezasOrdenadas = $this->model->getCervezasOrdenadas();
      $this->view->obtenerCervezas($cervezasOrdenadas);
    }

    public function obtenerCervezasPorEstilo($estilo)
    {
      $getEstilo = $estilo[0];
      $cervezas = $this->model->getCervezasByEstilo($getEstilo);
      $this->view->obtenerCervezas($cervezas);
    }

    public function getEstilos()
    {
      $estilos = $this->styleModel->getEstilos();
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
