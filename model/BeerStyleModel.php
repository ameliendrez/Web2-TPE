<?php
  class BeerStyleModel extends Model
  {
    function getEstilos() {
      $sentencia = $this->db->prepare( "select * from cerveza");
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
