<?php
  class BeerModel extends Model
  {
    function getCervezas() {
      $sentencia = $this->db->prepare( "select * from cervezaVW");
      $sentencia->execute();
      $cervezas = $sentencia->fetchAll();
      return $cervezas;
    }

    function getIdEstilo() {
      $sentencia = $this->db->prepare( "SELECT `id_estilo` FROM `estilocerveza` WHERE 'nombre' = $estilo");
      $sentencia->execute();
      $idEstilo = $sentencia->fetchAll();
      return $idEstilo;
    }

    function guardarCerveza($nombre, $estilo, $alc, $descripcion) {
      $getID = $this->db->prepare( "SELECT * FROM `estilocerveza` WHERE nombre = ?");
      $getID->execute([$estilo]);
      $arrayEstilo = $getID->fetchAll();
      $idestilo = $arrayEstilo[0];
      $estilo = $idestilo['id_estilo'];
      $sentencia = $this->db->prepare("INSERT INTO `cerveza` (`id_estilo`, `nombre`, `%alc`, `descripcion`) VALUES (?, ?, ?, ?)");
      $sentencia->execute(array($estilo, $nombre, $alc, $descripcion));
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


    function Update($id_cerveza)
    {
      //`id_estilo`=[value-2],
      $sentencia = $this->db->prepare("UPDATE `cerveza` SET `nombre`=[value-3],`%alc`=[value-4],`descripcion`=[value-5] WHERE id_cerveza=?");
      return $sentencia->execute([$id_cerveza]);
    }
  }

?>
