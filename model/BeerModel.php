<?php
  class BeerModel extends Model
  {
    function getCerveza($id_cerveza)
    {
      $sentencia = $this->db->prepare(
        "SELECT cerveza.id_cerveza, cerveza.nombre_cerveza, cerveza.alc, cerveza.descripcion, estilocerveza.nombre_estilo
         FROM cerveza INNER JOIN estilocerveza ON cerveza.id_estilo = estilocerveza.id_estilo WHERE cerveza.id_cerveza = ?");
      $sentencia->execute([$id_cerveza]);
      return $cerveza = $sentencia->fetch();
    }

    function getCervezas()
    {
      $sentencia = $this->db->prepare(
        "SELECT cerveza.id_cerveza, cerveza.nombre_cerveza, cerveza.alc, cerveza.descripcion, estilocerveza.nombre_estilo
         FROM cerveza INNER JOIN estilocerveza ON cerveza.id_estilo = estilocerveza.id_estilo");
      $sentencia->execute();
      return $cervezas = $sentencia->fetchAll();
    }

    function getCervezasByEstilo($estilo)
    {
      $sentencia = $this->db->prepare(
        "SELECT cerveza.id_cerveza, cerveza.nombre_cerveza, cerveza.alc, cerveza.descripcion, estilocerveza.nombre_estilo
        FROM cerveza INNER JOIN estilocerveza ON cerveza.id_estilo = estilocerveza.id_estilo WHERE estilocerveza.nombre_estilo = ?");
      $sentencia->execute([$estilo]);
      return $cervezas = $sentencia->fetchAll();
    }

    function getCervezasOrdenadas()
    {
      $sentencia = $this->db->prepare(
        "SELECT cerveza.id_cerveza, cerveza.nombre_cerveza, cerveza.alc, cerveza.descripcion, estilocerveza.nombre_estilo
        FROM cerveza INNER JOIN estilocerveza ON cerveza.id_estilo = estilocerveza.id_estilo ORDER BY estilocerveza.nombre_estilo ASC");
      $sentencia->execute();
      return $cervezasOrdenadas = $sentencia->fetchAll();
    }

    function guardarCerveza($nombre, $estilo, $alc, $descripcion, $imagenes)
    {
      $sentencia = $this->db->prepare("INSERT INTO `cerveza` (`id_estilo`, `nombre_cerveza`, `alc`, `descripcion`) VALUES (?, ?, ?, ?)");
      $sentencia->execute([$estilo, $nombre, $alc, $descripcion]);
      $id_cerveza = $this->db->lastInsertId();
      $this->guardarImagenes($imagenes, $id_cerveza);
    }

    function guardarImagenes($imagenes, $id_cerveza) {
      $size = sizeOf($imagenes['name']);
      $rutaImagen = "";
      for ($i = 0; $i < $size; $i++) {
        $rutaImagen = 'images/' . uniqid() . $imagenes['name'][$i];
        $temp = $imagenes['tmp_name'][$i];
        move_uploaded_file($temp, $rutaImagen);
        $sentencia = $this->db->prepare("INSERT INTO imagen (id_cerveza, ruta) VALUES (?, ?)");
        $sentencia->execute([$id_cerveza, $rutaImagen]);
      }
    }

    function borrarCerveza($id_cerveza)
    {
      $sentencia = $this->db->prepare("DELETE FROM `cerveza` WHERE `cerveza`.`id_cerveza` = ?");
      return $sentencia->execute([$id_cerveza]);
    }

    function Update($id_cerveza, $nombre, $estilo, $alc, $descripcion)
    {
      $sentencia = $this->db->prepare("UPDATE `cerveza` SET `id_estilo` = ?, `nombre_cerveza` = ?, alc = ?, `descripcion` = ?  WHERE `cerveza`.`id_cerveza` = ?");
      return $sentencia->execute([$estilo, $nombre, $alc, $descripcion, $id_cerveza]);
    }
  }

?>
