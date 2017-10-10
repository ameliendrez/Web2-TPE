<?php
  class BeerModel extends Model
  {
    function getCervezas() {
      $sentencia = $this->db->prepare( "select * from cervezaVW");
      $sentencia->execute();
      $cervezas = $sentencia->fetchAll();
      return $cervezas;
    }

    function guardarCerveza($nombre, $ibu, $alc,  $descripcion) {
      $sentencia = $this->db->prepare("INSERT INTO cerveza(nombre, ibu, alc, descripcion) VALUES (?, ?, ?, ?)");
      $sentencia->execute(array($nombre, $ibu, $alc, $descripcion));
    }

    function getCervezasPorEstilo($id) {
      $sentencia = $this->db->prepare( "select estilocerveza.* from cerveza, estilocerveza where cerveza.id_estilo = estilocerveza.id_estilo and cerveza.id_estilo = ?");
      $sentencia->execute([$id]);
      $cervezasEstilo = $sentencia->fetchAll();
      return $cervezasEstilo;
    }

    function borrarCerveza($id_cerveza)
    {
      $sentencia = $this->db->prepare("delete from cerveza where id_cerveza=?");
      return $sentencia->execute([$id_cerveza]);
    }
  }
?>
