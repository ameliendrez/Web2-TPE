<?php
class ImageModel extends Model
{
    function getImagenes($id_cerveza) {
      $sentencia = $this->db->prepare("SELECT * FROM imagen WHERE id_cerveza = ? ");
      $sentencia->execute([$id_cerveza]);
      return $sentencia->fetchAll();
    }

    function borrarImagen($id_imagen) {
      $sentencia = $this->db->prepare("DELETE * FROM imagen WHERE id_imagen = ? ");
      $sentencia = $this->db->execute([$id_imagen]);
    }
}
 ?>
