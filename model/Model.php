<?php
include_once 'model/db-config.php';

 function buildDDBBfromFile($dbname, $dbfile) {
  try {
    $connection = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD);
    $connection->exec('CREATE DATABASE IF NOT EXISTS '.$dbname);
    $connection->exec('USE '. $dbname);
    $queries = loadSQLSchema($dbfile);
    //foreach ($queries as $query) {}
    $connection->exec($queries);


  } catch (PDOException $e) {
    echo $e;
  }

}

  function loadSQLSchema($dbfile) {
    $file = fopen($dbfile, "r");
    $line = fgets($file);
    $getTablas = "";
    while(! feof($file))
    {
      $line = fgets($file);
      $getTablas .= $line;
    }

    fclose($file);
    return $getTablas;
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
        buildDDBBfromFile(DB_NAME, 'database/db_tpe.sql');
      }

    }


  }

?>
