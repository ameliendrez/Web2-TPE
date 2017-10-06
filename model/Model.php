<?php


 function buildDDBBfromFile($dbname, $dbfile) {
  try {
    echo "entra";
    $connection = new PDO('mysql:host=localhost', "root", "");
    $connection->exec('CREATE DATABASE IF NOT EXISTS '.$dbname);
    $connection->exec('USE '.$dbname);
    $queries = loadSQLSchema($dbfile);
    $i = 0;
    echo "entra" . count($queries);
    while ($i < count($queries)) {
      $_connection->exec($queries[$i]);
      echo $queries[$i];
      $i++;
    }

  } catch (PDOException $e) {
    echo $e;
  }

}

//  function loadSQLSchema($) {}

  class Model
  {

    protected $db;

    function __construct()
    {
      try {

        $this->db = new PDO('mysql:host=localhost;'
        .'dbname=db_tpe33;charset=utf8'
        , 'root', '');
      } catch (PDOException $e) {
        buildDDBBfromFile('db_tpe33', 'database/db_tpe.sql');
      }

    }


  }

?>
