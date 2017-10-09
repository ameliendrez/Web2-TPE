<?php
include_once 'model/db-config.php';

 function buildDDBBfromFile($dbname, $dbfile) {
  try {
    $connection = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD);
    $connection->exec('CREATE DATABASE IF NOT EXISTS '.$dbname);
    $connection->exec('USE '. $dbname);
    $queries = loadSQLSchema($dbfile);
    $i = 0;
    while ($i < count($queries)) {
      $_connection->exec($queries[$i]);
      echo $queries[$i];
      $i++;
    }

  } catch (PDOException $e) {
    echo $e;
  }

}

  function loadSQLSchema($dbfile) {

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
      } catch (PDOException $e) {
        buildDDBBfromFile('db', 'database/db_tpe.sql');
      }

    }


  }

?>
