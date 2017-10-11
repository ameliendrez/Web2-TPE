<?php
  include_once 'view/AdminView.php';
  include_once 'model/BeerModel.php';
  include_once 'model/BeerStyleModel.php';


  class AdminController extends SecuredController
  {
    private $styleModel;
    function __construct()
    {
      parent::__construct();
      $this->view = new AdminView();
      $this->model = new BeerModel();
      $this->styleModel = new BeerStyleModel();

    }

    public function mostrarEstilos()
    {
      $estilos = $this->styleModel->getEstilos();

      $this->view->mostrarEstilos($estilos);
    }

    public function createEstilo()
    {

      $nombre = $_POST['nombre'];
      $descripcion=isset($_POST['descripcion']) ? $_POST['descripcion'] : "";

      if(isset($_POST['nombre']) && !empty($_POST['nombre'])){

          $this->styleModel->guardarEstilo($nombre, $descripcion);
          header('Location: '. HOME . 'mostrarEstilo');

      }
      // else {
      //   $this->view->errorCrear("El campo nombre es requerido", $nombre, $descripcion);
      // }
    }

    public function destroyEstilo($params)
    {
      $id_estilo = $params[0];
      $this->styleModel->borrarEstilo($id_estilo);
      header('Location: '. HOME .'mostrarEstilo');
    }

    public function mostrarCervezas()
    {
      $cervezas = $this->model->getCervezas();

      $this->view->mostrarCervezas($cervezas);
    }

    public function createCerveza()
    {
      $nombre = $_POST['nombre'];
      $estilo = isset($_POST['estilo']) ? $_POST['estilo']: "";
      $alc = isset($_POST['alc']) ? $_POST['alc']: 1;
      $descripcion=isset($_POST['descripcion']) ? $_POST['descripcion'] : "";

      if(isset($_POST['nombre']) && !empty($_POST['nombre'])){

          $this->model->guardarCerveza($nombre, $estilo, $alc, $descripcion);

          header('Location: '. HOME . 'adminList');

      }
      // else {
      //   $this->view->errorCrear("El campo nombre es requerido", $nombre, $estilo, $alc, $descripcion);
      // }
    }

    public function eliminarCerveza($params)
    {
      $id_cerveza = $params[0];
      $this->model->borrarCerveza($id_cerveza);
      header('Location: '. HOME .'adminList');
    }


    public function addEstilo()
    {
      $this->view->mostrarAddEstilo();
    }

    public function addCerveza()
    {
      $estilos = $this->styleModel->getEstilos();
      $this->view->mostrarAddCerveza($estilos);
    }

    public function mostrarUpdateCerveza($id_cerveza) {
      $id = $id_cerveza[0];
      $estilos = $this->styleModel->getEstilos();

      $this->view->mostrarUpdateCerveza($id, $estilos);
    }


    public function mostrarUpdateEstilo($id_estilo) {
      $id = $id_estilo[0];
      $estilos = $this->styleModel->getEstilos();

      $this->view->mostrarUpdateEstilos($id, $estilos);
    }


    public function modificarCerveza() {
      $id = $_POST['nombre'];

      $nombre = $_POST['nombre'];
      $estilo = isset($_POST['estilo']) ? $_POST['estilo']: "";
      $alc = isset($_POST['alc']) ? $_POST['alc']: 1;
      $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
      $id = isset($_POST['id']) ? $_POST['id']: -1;

      if(isset($_POST['nombre']) && !empty($_POST['nombre'])){

          $this->model->Update($id, $nombre, $estilo, $alc, $descripcion);

          header('Location: '. HOME . 'adminList');
        }
    }


        public function modificarEstilo() {
          $nombre = $_POST['nombre'];
          $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
          $id = isset($_POST['id']) ? $_POST['id']: -1;

          if(isset($_POST['nombre']) && !empty($_POST['nombre'])){

              $this->styleModel->Update($id, $nombre, $descripcion);

              header('Location: '. HOME . 'mostrarEstilo');
            }
        }

  }
?>