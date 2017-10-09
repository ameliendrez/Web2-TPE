<?php
  class BeerModel extends Model
  {
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

    function getCervezasPorEstilo($id) {
      $sentencia = $this->db->prepare( "select * from <cerveza><estilocerveza> where <estilocerveza.id_estilo> = <cerveza.id_estilo> and <estilocerveza.id_estilo == $id>");
      $sentencia->execute();
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
