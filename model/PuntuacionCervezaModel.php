<?php


class PuntuacionCervezaModel extends Model
{

  function setPuntuacion($id_cerveza, $puntuacion)
  {
    $sentencia = $this->db->prepare(
      "INSERT INTO puntajecerveza(id_cerveza, puntaje) VALUES(?, ?)");
    $sentencia->execute([$id_cerveza, $puntuacion]);
  }

  function getPromedio($id_cerveza)
  {
    $sentencia = $this->db->prepare(
      "SELECT SUM(puntajecerveza.puntaje) FROM `puntajecerveza` WHERE `id_cerveza` = ?");
    $sentencia->execute([$id_cerveza]);
    $cantidadPuntajes = $this->countPuntajes($id_cerveza);

    if ($cantidadPuntajes == 1) {
       $puntaje = $sentencia->fetch();
       return $puntaje[0];
    }
    else if($cantidadPuntajes == 0) {
      return "-";
    }
    else{
      $puntajes = $sentencia->fetch();
      return $puntajes[0]/$cantidadPuntajes;
    }
  }

  function countPuntajes($id_cerveza)
  {
    $sentencia = $this->db->prepare("SELECT COUNT(*) FROM `puntajecerveza` WHERE `id_cerveza` = ?");
    $sentencia->execute([$id_cerveza]);
    $cantidad = $sentencia->fetch();
    return $cantidad[0];
  }
}


 ?>
