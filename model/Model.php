<?php
include_once 'config/db-config.php';

 function buildDDBBfromFile() {
  try {
    $connection = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD);
    $connection->exec('CREATE DATABASE IF NOT EXISTS '.DB_NAME);
    $connection->exec('USE '. DB_NAME);
    $queries = loadSQLSchema();
    $connection->exec($queries);


  } catch (PDOException $e) {
    echo $e;
  }

}

  function loadSQLSchema()
  {
    $file = fopen(DB_FILE, "r");
    $getSentencias = "";
    while(! feof($file))
    {
      $getSentencias .= fgets($file);
    }

    fclose($file);
    return $getSentencias;
  }

  class Model
  {

    protected $db;

    function __construct()
    {
      try {
        $this->db = new PDO('mysql:host='.DB_HOST.';'
        .'dbname='.DB_NAME.';charset=utf8'
        , DB_USER, DB_PASSWORD);
      }
      catch (PDOException $e)
      {
        buildDDBBfromFile(DB_NAME, DB_FILE);
      }
    }

    function getID($estilo)
    {
      $getID = $this->db->prepare( "SELECT * FROM `estilocerveza` WHERE nombre = ?");
      $getID->execute([$estilo]);
      $arrayEstilo = $getID->fetchAll();
      $idestilo = $arrayEstilo[0];
      return $idestilo['id_estilo'];
    }
    function getNombreCerveza($cerveza)
    {
      $getNombre = $this->db->prepare( "SELECT * FROM `cervezavw` WHERE id_cerveza = ?");
      $getNombre->execute([$cerveza[0]]);
      $arrayCerveza = $getNombre->fetchAll();
      $nombreCerveza = $arrayCerveza[0];
      return $nombreCerveza['nombreCerveza'];
    }
  }
?>
