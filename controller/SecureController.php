<?php

include_once 'view/LoginView.php';
include_once 'model/LoginModel.php';


class SecureController
{
  private $view;
  private $model;

  function __construct()
  {
    if(!isset($SESSION['usuario'])){
      header('Location: '. LOGIN );
      die();
    }
  }

  public function index()
  {
    $this->view->mostrarLogin();
  }

  // Corregir cuando suban el video

  // public function verify()
  // {
  //   $userName = $_POST['usuario'];
  //   $password = $_POST['password'];
  //
  //   if(!empty($userName) && !empty($password)) {
  //     $user = $this->model->getUser($userName);
  //     if(!empty($user) && password_verify($password, $user[0]['password'])){
  //       session_start();
  //       $_SESSION['usuario'=$userName];
  //       header('Location: '. HOME);
  //     }
  //     else{
  //       $this->view->mostrarError('Usuario o Passwords incorrectos');
  //     }
  //
  //   }
  // }



}


 ?>
