<?php
  class BeerModel extends Model
  {
    function getCerveza($getCerveza)
    {

      $sentencia = $this->db->prepare( "SELECT * FROM cervezaVW WHERE `nombreCerveza`=?");
      $sentencia->execute([$getCerveza]);
      $cerveza = $sentencia->fetch();
      return $cerveza;
    }

    function getCervezas()
    {
      $sentencia = $this->db->prepare( "SELECT * FROM cervezaVW");
      $sentencia->execute();
      $cervezas = $sentencia->fetchAll();
      return $cervezas;
    }

    function getCervezasByEstilo($estilo)
    {
      $sentencia = $this->db->prepare( "SELECT * FROM cervezaVW WHERE `estilo` = ?");
      $sentencia->execute([$estilo]);
      $cervezas = $sentencia->fetchAll();
      return $cervezas;
    }

    function guardarCerveza($nombre, $estilo, $alc, $descripcion)
    {
      $nroestilo = $this->getID($estilo);
      $sentencia = $this->db->prepare("INSERT INTO `cerveza` (`id_estilo`, `nombre`, `%alc`, `descripcion`) VALUES (?, ?, ?, ?)");
      $sentencia->execute([$nroestilo, $nombre, $alc, $descripcion]);
    }

    function borrarCerveza($id_cerveza)
    {
      $sentencia = $this->db->prepare("DELETE FROM cerveza WHERE id_cerveza=?");
      return $sentencia->execute([$id_cerveza]);
    }


    function Update($id_cerveza, $nombre, $estilo, $alc, $descripcion)
    {
      $estilo = $this->getID($estilo);
      $sentencia = $this->db->prepare("UPDATE `cerveza` SET `id_estilo` = ?, `nombre` = ?, `%alc` = ?, `descripcion` = ?  WHERE `cerveza`.id_cerveza = ?");
      return $sentencia->execute([$estilo, $nombre, $alc, $descripcion, $id_cerveza]);
    }
  }

?>
