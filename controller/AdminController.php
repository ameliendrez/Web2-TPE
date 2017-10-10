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

    public function mostrarCervezas()
    {
      $cervezas = $this->model->getCervezas();

      $this->view->mostrarCervezas($cervezas);
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
      $this->view->mostrarAddCerveza();
    }

    public function guardarCerveza()
    {
      $titulo=$_POST['titulo'];
      $descripcion=isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
      $completada =isset($_POST['completada'])  ? 1:0;

      if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
        if ($this->tienePalabrasProhibidas($titulo)) {
          $this->view->errorCrear("El titulo tiene Palabras Prohibidas", $titulo, $descripcion, $completada);
          die();
        }
        else {
          $this->model->guardarTarea($titulo, $descripcion, $completada);
          header('Location: '. HOME);
        }
      }
      else {
        $this->view->errorCrear("El campo titulo es requerido", $titulo, $descripcion, $completada);
      }
    }
  }
?>
