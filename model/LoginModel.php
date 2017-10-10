<?php
  class LoginModel extends Model
  {
    function getUser($userName)
    {
      $sentencia = $this->db->prepare("select * from loginusuario where usuario = ?");
      $sentencia->execute([$userName]);
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
  }
?>
