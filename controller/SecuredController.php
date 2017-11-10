<?php
  include_once 'view/LoginView.php';
  include_once 'model/LoginModel.php';

  class SecuredController extends Controller
  {
    function __construct()
    {
      session_start();
      if(isset($_SESSION['usuario'])){

        if (time() - $_SESSION['LAST_ACTIVITY'] > 5000) {
        //logout(); // destruye la sesión, y vuelve al login
        header('Location: '. LOGOUT); // aca utilizamos la redireccion
        die();
        }
        $_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
      }

      else{
        header('Location: '. LOGIN);
        die();
      }
    }

    public function estaLogueado()
    {
      if(!isset($_SESSION['usuario'])) {
        return true;
      }
      else {
        return false;
      }
    }

    public function esAdministrador()
    {
      if ($_SESSION['permisos'] == 1) {
      return true;
      }
      else{
        return false;
      }
    }
  }
?>
