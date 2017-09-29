<?php


class TareasModel
{
  private $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;'
  .'dbname=db_tareas;charset=utf8'
  , 'root', '');
  }

  function getTareas()
  {
    $sentencia = $this->db->prepare("select * from tarea");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function guardarTarea($titulo, $descripcion, $completada)
  {
    $sentencia = $this->db->prepare('INSERT INTO tarea(Titulo,Descripcion,Completada) VALUES(?,?,?)');
    $sentencia->execute([$titulo, $descripcion, $completada]);
  }

  function borrarTarea($id_tarea)
  {
    $sentencia = $this->db->prepare("delete from tarea where IDTarea=?");
    $sentencia->execute([$id_tarea]);
  }

  function finalizarTarea($id_tarea)
  {
    $sentencia = $this->db->prepare("UPDATE tarea SET Completada=1 where IDTarea=?");
    $sentencia->execute([$id_tarea]);

  }


}


 ?>
