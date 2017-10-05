<?php


 function buildDDBBfromFile($dbname, $dbfile) {
  try {
    $connection = new PDO('mysql:host=localhost', "root", "");
    $connection->exec('CREATE DATABASE IF NOT EXISTS '.$dbname);
    $connection->exec('USE '.$dbname);
    $queries = $this->loadSQLSchema($dbfile);
    $i = 0;
    while ($i < count($queries) && strlen($_connection->errorInfo() [2] ) == 0) {
      $_connection->exec($queries[$i]);
      echo $queries[$i];
      $i++;
    }

  } catch (PDOException $e) {
    echo $e;
  }

}

  class Model
  {



    protected $db;

    function __construct()
    {
      try {

        $this->db = new PDO('mysql:host=localhost;'
        .'dbname=db_tpePRUEBA;charset=utf8'
        , 'root', '');
      } catch (PDOException $e) {
        buildDDBBfromFile('db_tpePRUEBA', 'database/db_tpe.sql');
      }

    }


  }

?>
