<?php
  class BeerStyleModel extends Model
  {
    function getEstilo($id_estilo)
    {
      $sentencia = $this->db->prepare( "SELECT * FROM estilocerveza WHERE id_estilo=?");
      $sentencia->execute([$id_estilo]);
      return $estilo = $sentencia->fetch();
    }

    function getEstilos() {
      $sentencia = $this->db->prepare( "SELECT * FROM estilocerveza ORDER BY nombre_estilo ASC");
      $sentencia->execute();
      return $sentencia->fetchAll();
    }

    function guardarEstilo($nombre, $descripcion)
    {
      $sentencia = $this->db->prepare("INSERT INTO estilocerveza(nombre_estilo, descripcion) VALUES (?, ?)");
      $sentencia->execute([$nombre, $descripcion]);
    }

    function borrarEstilo($id_estilo) {
      $sentencia = $this->db->prepare("DELETE FROM estilocerveza WHERE id_estilo=?");
      return $sentencia->execute([$id_estilo]);
    }


    function Update($id_estilo, $nombre, $descripcion)
    {
      $sentencia = $this->db->prepare("UPDATE `estilocerveza` SET `nombre_estilo` = ?, `descripcion` = ?  WHERE `estilocerveza`.id_estilo = ?");
      return $sentencia->execute([$nombre, $descripcion, $id_estilo]);
    }
  }
?>
