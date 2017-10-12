<?php
  class BeerStyleModel extends Model
  {
    function getEstilos() {
      $sentencia = $this->db->prepare( "SELECT * FROM estilocerveza");
      $sentencia->execute();
      $estilos = $sentencia->fetchAll();
      return $estilos;
    }

    function guardarEstilo($nombre, $descripcion)
    {
      $sentencia = $this->db->prepare("INSERT INTO estilocerveza(nombre, descripcion) VALUES (?, ?)");
      $sentencia->execute([$nombre, $descripcion]);
    }

    function borrarEstilo($id_estilo) {
      $sentencia = $this->db->prepare("DELETE FROM estilocerveza WHERE id_estilo=?");
      return $sentencia->execute([$id_estilo]);
    }


    function Update($id_estilo, $nombre, $descripcion)
    {
      $estilo = $this->getID($estilo);

      $sentencia = $this->db->prepare("UPDATE `estilocerveza` SET `nombre` = ?, `descripcion` = ?  WHERE `estilocerveza`.id_estilo = ?");
      return $sentencia->execute([$nombre, $descripcion, $id_estilo]);
    }
  }
?>
