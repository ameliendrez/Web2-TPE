<?php
  include_once 'view/WebBeerView.php';
  include_once 'model/BeerModel.php';
  include_once 'model/BeerStyleModel.php';

  class WebBeerController extends controller
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

    public function mostrarEstilo()
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

    public function eliminarCerveza($params)
    {
      $id_tarea = $params[0];
      $this->model->borrarCerveza($id_tarea);
      header('Location: '. HOME .'variedadCerveza');
    }
  }
?>
