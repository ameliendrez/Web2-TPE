<?php
  class BeerModel extends Model
  {
    function getCervezas() {
      $sentencia = $this->db->prepare( "SELECT * FROM cervezaVW");
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
      $sentencia->execute([$estilo, $nombre, $alc, $descripcion]);
    }

    function getCervezasPorEstilo($id) {
      $sentencia = $this->db->prepare( "select estilocerveza.* from cerveza, estilocerveza where cerveza.id_estilo = estilocerveza.id_estilo and cerveza.id_estilo = ?");
      $sentencia->execute([$id]);
      $cervezasEstilo = $sentencia->fetchAll();
      return $cervezasEstilo;
    }

    function borrarCerveza($id_cerveza)
    {
      $sentencia = $this->db->prepare("DELETE FROM cerveza WHERE id_cerveza=?");
      return $sentencia->execute([$id_cerveza]);
    }


    function Update($id_cerveza, $nombre, $estilo, $alc, $descripcion)
    {
      $getID = $this->db->prepare( "SELECT * FROM `estilocerveza` WHERE nombre = ?");
      $getID->execute([$estilo]);
      $arrayEstilo = $getID->fetchAll();
      $idestilo = $arrayEstilo[0];
      $estilo = $idestilo['id_estilo'];


      $sentencia = $this->db->prepare("UPDATE `cervezavw` SET (`nombreCerveza`, `estilo`, `porcentajeALC`, `descripcion`) VALUES (?, ?, ?, ?)  WHERE `cervezavw`.id_cerveza=?");
      return $sentencia->execute([$nombre, $estilo, $alc, $descripcion, $id_cerveza]);
    }
  }

?>
