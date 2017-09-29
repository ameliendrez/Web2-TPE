<?php


class LoginModel
{
  private $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;'
  .'dbname=db_tareas;charset=utf8'
  , 'root', '');
  }

  function getUser($userName)
  {
    $sentencia = $this->db->prepare("select * from usuario where usuario = ? limit =1");
    $sentencia->execute($userName);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

}


 ?>
