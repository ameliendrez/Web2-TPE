<?php


class BeerStyleModel
{
  private $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;'
  .'dbname=db_tpe;charset=utf8'
  , 'root', '');
  }

  function getEstilos() {
    $sentencia = $this->db->prepare( "select * from estilocerveza");
    $sentencia->execute();
    $estilos = $sentencia->fetchAll();
    return $estilos;
  }

  function guardarEstilo($nombre, $descripcion) {
    $sentencia = $this->db->prepare("INSERT INTO estilocerveza(nombre, descripcion) VALUES (?, ?)");
    $sentencia->execute(array($nombre, $descripcion));
  }



}


 ?>
