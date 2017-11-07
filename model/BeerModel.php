<?php
  class BeerModel extends Model
  {
    function getCerveza($id_cerveza)
    {
      $sentencia = $this->db->prepare(
        "SELECT cerveza.nombre_cerveza, cerveza.alc, cerveza.descripcion, estilocerveza.nombre_estilo
         FROM cerveza INNER JOIN estilocerveza ON cerveza.id_estilo = estilocerveza.id_estilo WHERE `id_cerveza` = ?");
      $sentencia->execute([$getCerveza]);
      $cerveza = $sentencia->fetch();
      return $cerveza;
    }

    function getCervezas()
    {
      $sentencia = $this->db->prepare(
        "SELECT cerveza.nombre_cerveza, cerveza.alc, cerveza.descripcion, estilocerveza.nombre_estilo
       FROM cerveza INNER JOIN estilocerveza ON cerveza.id_estilo = estilocerveza.id_estilo");
      $sentencia->execute();
      $cervezas = $sentencia->fetchAll();
      return $cervezas;
    }

    function getCervezasByEstilo($estilo)
    {
      $sentencia = $this->db->prepare( "SELECT cerveza.nombre_cerveza, cerveza.alc, cerveza.descripcion, estilocerveza.nombre_estilo
     FROM cerveza INNER JOIN estilocerveza ON cerveza.id_estilo = estilocerveza.id_estiloWHERE `estilocerveza.nombre_estilo` = ?");
      $sentencia->execute([$estilo]);
      $cervezas = $sentencia->fetchAll();
      return $cervezas;
    }

    function getCervezasOrdenadas()
    {
      $sentencia = $this->db->prepare( "SELECT cerveza.nombre_cerveza, cerveza.alc, cerveza.descripcion, estilocerveza.nombre_estilo
     FROM cerveza INNER JOIN estilocerveza ON cerveza.id_estilo = estilocerveza.id_estilo ORDER BY estilocerveza.nombre_estilo ASC");
      $sentencia->execute();
      $cervezasOrdenadas = $sentencia->fetchAll();
      return $cervezasOrdenadas;
    }

    function guardarCerveza($nombre, $estilo, $alc, $descripcion)
    {
      //$nroestilo = $this->getID($estilo);
      $sentencia = $this->db->prepare("INSERT INTO `cerveza` (`id_estilo`, `nombre`, `%alc`, `descripcion`) VALUES (?, ?, ?, ?)");
      $sentencia->execute([$estilo, $nombre, $alc, $descripcion]);
    }

    function borrarCerveza($id_cerveza)
    {
      $sentencia = $this->db->prepare("DELETE FROM cerveza WHERE id_cerveza = ?");
      return $sentencia->execute([$id_cerveza]);
    }


    function Update($id_cerveza, $nombre, $estilo, $alc, $descripcion)
    {
      //$estilo = $this->getID($estilo);
      $sentencia = $this->db->prepare("UPDATE `cerveza` SET `id_estilo` = ?, `nombre` = ?, `%alc` = ?, `descripcion` = ?  WHERE `cerveza`.id_cerveza = ?");
      return $sentencia->execute([$estilo, $nombre, $alc, $descripcion, $id_cerveza]);
    }
  }

?>
