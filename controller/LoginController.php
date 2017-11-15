<?php

require_once 'view/LoginView.php';
require_once 'model/LoginModel.php';

  class LoginController extends Controller
  {
    function __construct()
    {
      $this->view = new LoginView();
      $this->model = new LoginModel();
    }

    public function index()
    {
      $this->view->mostrarLogin();
    }

    public function verify()
    {
      $userName = $_POST['usuario'];
      $password = $_POST['password'];
      $this->iniciarSesion($userName, $password);
    }

    public function iniciarSesion($userName, $password)
    {
      if (!empty($userName) && !empty($password)) {
        $user = $this->model->getUser($userName);
        if(!empty($user) && password_verify($password, $user[0]['password'])){
          session_start();
          $_SESSION['usuario'] = $userName;
          $_SESSION['idUsuario'] = $user[0]['id_usuario'];
          $_SESSION['permisos'] = $user[0]['esAdmin'];
          $_SESSION['LAST_ACTIVITY'] = time(); // Comienza el contador
          header('Location: '. HOME.'adminList');

        }
        else {
          $this->view->mostrarError('Usuario o Passwords incorrectos');
        }
      }
    }

    public function destroy()
    {
      session_start();
      session_destroy();
      header('Location: '. HOME);
    }

    public function mostrarCreateUser()
    {
      $this->view->mostrarCreateUser();
    }

    public function createUser()
    {
      $username = isset($_POST['username']) ? $_POST['username'] : "";
      $password = isset($_POST['password']) ? $_POST['password'] : "";
      $password2 = isset($_POST['password2']) ? $_POST['password2'] : "";
      $password = password_hash($password, PASSWORD_DEFAULT);
      $password2 = password_hash($password2, PASSWORD_DEFAULT);
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
      $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : "";

      if(isset($_POST['nombre']) && !empty($_POST['nombre'])) { //necesario?
        if ($password == $password2) {
          $this->model->createUser($username, $password, $nombre, $apellido);
          $this->iniciarSesion($userName, $password);
          header('Location: '. HOME);
        }
        else{
          $this->view->mostrarErrorCrear("Las contraseñas no son iguales");
        }
      }
    }
  }
?>
