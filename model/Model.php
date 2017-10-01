<?php
  class Model
  {
    protected $db;

    function __construct()
    {
    //   $this->db = new PDO('mysql:host=localhost;'
    // .'dbname=db_tpe;charset=utf8' // Guarda con esto... por que en mi maquina no existe la BBDD db_tpe... habria que ver como crear una auttomaticamente
    // , 'root', '');

    $this->db = new PDO('mysql:host=localhost;'
  .'dbname=db_tareas;charset=utf8'
  , 'root', '');
    }
  }

?>
