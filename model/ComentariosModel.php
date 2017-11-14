<?php

/**
 *
 */
 class ComentariosModel extends Model
  {
    function getAllComentarios()
    {
      $sentencia = $this->db->prepare(
        "SELECT comentarioscerveza.comentario, comentarioscerveza.id_comentario, loginusuario.usuario, cerveza.nombre_cerveza
         FROM comentarioscerveza LEFT JOIN cerveza ON comentarioscerveza.id_cerveza = cerveza.id_cerveza INNER JOIN loginusuario ON comentarioscerveza.id_usuario = loginusuario.id_usuario");
      $sentencia->execute([]);
      return $comentarios = $sentencia->fetchAll();
    }

    function getComentarios($id_cerveza)
    {
      $sentencia = $this->db->prepare(
        "SELECT comentarioscerveza.comentario, comentarioscerveza.id_comentario, loginusuario.usuario, cerveza.nombre_cerveza
         FROM comentarioscerveza LEFT JOIN cerveza ON comentarioscerveza.id_cerveza = cerveza.id_cerveza INNER JOIN loginusuario ON comentarioscerveza.id_usuario = loginusuario.id_usuario
         WHERE comentarioscerveza.id_cerveza = ?");
      $sentencia->execute([$id_cerveza]);


      return $comentarios = $sentencia->fetchAll();
    }

    function getComentario($id_comentario)
    {
      $sentencia = $this->db->prepare("SELECT * FROM `comentarioscerveza` WHERE `comentarioscerveza`.`id_comentario` = ?");
       $sentencia->execute([$id_comentario]);
       return $comentarios = $sentencia->fetch();
    }

    function borrarComentario($id_comentario)
    {
      $sentencia = $this->db->prepare("DELETE FROM `comentarioscerveza` WHERE `comentarioscerveza`.`id_comentario` = ?");
      return $sentencia->execute([$id_comentario]);
    }

    function crearComentario($comentario, $id_cerveza, $id_usuario){
      $sentencia = $this->db->prepare('INSERT INTO comentarioscerveza(comentario, id_cerveza, id_usuario) VALUES(?, ?, ?)');
      $sentencia->execute([$comentario, $id_cerveza, $id_usuario]);
      $id = $this->db->lastInsertId();
      return $this->getComentarios($id_cerveza);
    }
  }
?>
