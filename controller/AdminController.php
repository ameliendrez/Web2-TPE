<?php
  require_once 'view/AdminView.php';
  require_once 'model/BeerModel.php';
  require_once 'model/BeerStyleModel.php';
  require_once 'model/LoginModel.php';

  class AdminController extends SecuredController
  {
    protected $styleModel;
    protected $loginModel;

    function __construct()
    {
      parent::__construct();

      if ($this->esAdministrador()){
        $this->view = new AdminView();
        $this->model = new BeerModel();
        $this->styleModel = new BeerStyleModel();
        $this->loginModel = new LoginModel();
      }
      else{
        header('Location: '. HOME);
      }
    }

    public function mostrarEstilos()
    {
      $estilos = $this->styleModel->getEstilos();
      $this->view->mostrarEstilos($estilos);
    }

    public function createEstilo()
    {
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "" ;
      $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";

      if(!empty($_POST['nombre']) && !empty($_POST['descripcion'])) {

          $this->styleModel->guardarEstilo($nombre, $descripcion);
          header('Location: '. HOME . 'mostrarEstilo');
      }
       else {
         $this->view->mostrarErrorEstilo("Todos los campos deben estar completos", $nombre, $descripcion);
       }
    }

    public function destroyEstilo($params)
    {
      $id_estilo = $params[':id'];
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
      $nombre = isset($_POST['nombre']) ? $_POST['nombre']: "";
      $estilo = isset($_POST['estilo']) ? $_POST['estilo']: "";
      $alc = isset($_POST['alc']) ? $_POST['alc']: "";
      $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
      $imagenes = $_FILES['imagenes'];

      if (!empty($_POST['nombre']) && !empty($_POST['estilo']) && !empty($_POST['alc']) && !empty($_POST['descripcion'])) {

          $this->model->guardarCerveza($nombre, $estilo, $alc, $descripcion, $imagenes);

          header('Location: '. HOME . 'adminList');
      }
       else {
         $this->view->mostrarErrorCerveza("Todos los campos deben estar completos", $nombre, $estilo, $alc, $descripcion);
       }
    }

    public function eliminarCerveza($params)
    {
      $id_cerveza = $params[':id'];
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
      $id = $id_cerveza[':id'];
      $estilos = $this->styleModel->getEstilos();
      $cerveza = $this->model->getCerveza($id);
      $this->view->mostrarUpdateCerveza($id, $estilos, $cerveza);
    }


    public function mostrarUpdateEstilo($id_estilo) {

      $id = $id_estilo[':id'];
      $estilo = $this->styleModel->getEstilo($id);
      $this->view->mostrarUpdateEstilos($id, $estilo);
    }


    public function modificarCerveza() {
      $nombre = $_POST['nombre'];
      $estilo = isset($_POST['estilo']) ? $_POST['estilo']: "";
      $alc = isset($_POST['alc']) ? $_POST['alc']: 1;
      $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
      $id = isset($_POST['id']) ? $_POST['id']: -1;
      $imagenes = $_FILES['imagenes'];

      if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
        $this->model->Update($id, $nombre, $estilo, $alc, $descripcion, $imagenes);
        header('Location: '. HOME . 'adminList');
        }
    }

    public function modificarEstilo() {
      $nombre = $_POST['nombre'];
      $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
      $id = isset($_POST['id']) ? $_POST['id']: -1;

      if(isset($_POST['nombre']) && !empty($_POST['nombre'])) {
        $this->styleModel->Update($id, $nombre, $descripcion);
        header('Location: '. HOME . 'mostrarEstilo');
        }
    }

    public function mostrarUsuario() {
      $usuarios = $this->loginModel->getUsuarios();
      $this->view->mostrarUsuario($usuarios);
    }

    public function eliminarUsuario($params) {
      $id_usuario = $params[':id'];
      $user = $this->loginModel->getUserById($id_usuario);
      if ($user[0]['esAdmin'] == 0){
        $this->loginModel->borrarUsuario($id_usuario);
        header('Location: '. HOME .'mostrarUsuario');
      }
      else{
        header('Location: '. HOME .'mostrarUsuario');
      }
    }

    public function cambiarPermiso($params) {

      $id_usuario = $params[':id'];
      if ($params[':permiso'] == 0) {$set = 1;}
      else {$set = 0;}
      $this->loginModel->cambiarPermiso($set, $id_usuario);
      header('Location: '. HOME .'mostrarUsuario');
    }

    public function mostrarImagenes($params) {

      $id_cerveza = $params[':id'];
      $imagenes = $this->model->getImagenes($id_cerveza);
      $cerveza = $this->model->getCerveza($id_cerveza);
      if (empty($imagenes)) {
        $this->view->mostrarError('No hay imagenes disponibles para esta cerveza', $cerveza);
      }
      else {
        $this->view->mostrarImagenes($imagenes, $cerveza);
      }
    }

    public function eliminarImagen($params) {
      $id_imagen = $params[':id'];
      $id_cerveza = $params[':idcerveza'];
      $this->loginModel->borrarImagen($id_imagen);
      header('Location: '. HOME .'imagenesCerveza'. '/' . $id_cerveza);
    }

  }
?>
