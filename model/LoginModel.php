<?php
  class LoginModel extends Model
  {
    function getUser($userName)
    {
      $sentencia = $this->db->prepare("SELECT * FROM loginusuario WHERE usuario = ?");
      $sentencia->execute([$userName]);
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    function getUserById($id)
    {
      $sentencia = $this->db->prepare("SELECT * FROM loginusuario WHERE id_usuario = ?");
      $sentencia->execute([$id]);
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    function createUser($username, $password, $nombre, $apellido)
    {
      $sentencia = $this->db->prepare("INSERT INTO loginusuario(usuario, password, nombre, apellido) VALUES (?, ?, ?, ?)");
      $sentencia->execute([$username, $password, $nombre, $apellido]);
    }

    function getUsuarios() {
      $sentencia = $this->db->prepare("SELECT * FROM loginusuario ORDER BY esAdmin DESC");
      $sentencia->execute();
      return $sentencia->fetchAll();
    }

    function borrarUsuario($id_usuario) {
      $sentencia = $this->db->prepare("DELETE FROM loginusuario WHERE id_usuario = ?");
      return $sentencia->execute([$id_usuario]);
    }

    function cambiarPermiso($set, $id_usuario) {
      $sentencia = $this->db->prepare("UPDATE loginusuario SET esAdmin = ? WHERE id_usuario = ?");
      return $sentencia->execute([$set, $id_usuario]);
    }

    function borrarImagen($id_imagen) {
      $sentencia = $this->db->prepare("DELETE FROM imagen WHERE id_imagen = ?");
      return $sentencia->execute([$id_imagen]);
    }
  }
?>
