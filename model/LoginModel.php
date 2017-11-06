<?php
  class LoginModel extends Model
  {
    function getUser($userName)
    {
      $sentencia = $this->db->prepare("select * from loginusuario where usuario = ?");
      $sentencia->execute([$userName]);
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    function createUser($username, $password, $nombre, $apellido)
    {
      $sentencia = $this->db->prepare("INSERT INTO loginusuario(usuario, password, nombre, apellido) VALUES (?, ?, ?, ?)");
      $sentencia->execute([$username, $password, $nombre, $apellido]);
    }
  }
?>
