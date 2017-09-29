<?php


class BeerModel
{
  private $db;

  function __construct()
  {
  //   $this->db = new PDO('mysql:host=localhost;'
  // .'dbname=db_tpe;charset=utf8' // Guarda con esto... por que en mi maquina no existe la BBDD db_tpe... habria que ver como crear una auttomaticamente
  // , 'root', '');
  }

  function getCervezas() {
    $sentencia = $this->db->prepare( "select * from cerveza");
    $sentencia->execute();
    $cervezas = $sentencia->fetchAll();
    return $cervezas;
  }

  function guardarCerveza($nombre, $ibu, $alc,  $descripcion) {
    $sentencia = $this->db->prepare("INSERT INTO cerveza(nombre, ibu, alc, descripcion) VALUES (?, ?, ?, ?)");
    $sentencia->execute(array($nombre, $ibu, $alc, $descripcion));
  }



}


 ?>
