<?php
  require_once 'view/WebBeerView.php';
  require_once 'model/BeerModel.php';
  require_once 'model/BeerStyleModel.php';

  class WebBeerController extends SecuredController
  {
    protected $styleModel;

    function __construct()
    {
      $this->connect();
      $this->view = new WebBeerView();
      $this->model = new BeerModel();
      $this->styleModel = new BeerStyleModel();
    }

    public function index()
    {
      $session = $this->setSession();
      $userAdmin = ($this->esAdministrador()) ? 'esAdmin':'esUser';
      $this->view->mostrarIndex($session, $userAdmin);
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

      $id_cerveza = $cerveza[':id'];
      $cerveza = $this->model->getCerveza($id_cerveza);
      $imagenes = $this->model->getImagenes($id_cerveza);
      $session = $this->setSession();
      $id_user = $this->getIdUsuario();
      $this->view->obtenerCerveza($cerveza, $imagenes, $session, $id_user);
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
      $getEstilo = $estilo[':estilo'];
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
