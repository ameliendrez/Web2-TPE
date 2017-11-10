<?php
  include_once 'view/LoginView.php';
  include_once 'view/WebBeerView.php';
  include_once 'view/AdminView.php';
  include_once 'model/LoginModel.php';

  class SecuredController extends Controller
  {
    protected $beerView;
    protected $adminView;
    protected $session;


    function __construct()
    {

      if (!$this->connect()) {

          header('Location: '. LOGIN);
          die();

      }

    }

    function setSession(){


      if ($this->estaLogueado()) {
        $session = 'out';
      }
      else{
        $session = 'in';
      }

      return $session;
    }

    public function connect()
    {
      session_start();
      if(isset($_SESSION['usuario'])){

        if (time() - $_SESSION['LAST_ACTIVITY'] > 5000) {
        //logout(); // destruye la sesión, y vuelve al login
        header('Location: '. LOGOUT); // aca utilizamos la redireccion
        die();
        }
        $_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
        return true;
      }
      else {
        return false;
      }
    }

    public function estaLogueado()
    {
      if(isset($_SESSION['usuario'])) {

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
