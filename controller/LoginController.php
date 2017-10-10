<?php

include_once 'view/LoginView.php';
include_once 'model/LoginModel.php';

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
      //$password = password_hash('123456', PASSWORD_DEFAULT); // Esto sirve para guardar el hash de la contraseña
    }

    public function verify()
    {
      $userName = $_POST['usuario'];
      $password = $_POST['password'];
      if(!empty($userName) && !empty($password)) {
        $user = $this->model->getUser($userName);
        if(!empty($user) && password_verify($password, $user[0]['contraseña'])){
          session_start();
          $_SESSION['usuario']=$userName;
          $_SESSION['LAST_ACTIVITY'] = time(); // Comienza el contador
          header('Location: '. HOME .'adminList');
        }
        else{
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
  }
?>
