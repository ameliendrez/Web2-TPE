<?php
  class Model
  {

    public function buildDDBBfromFile($dbname, $dbfile) {
      try {
        $this->connection = new PDO('mysql:host=localhost', "root", "");
        $this->connection->exec('CREATE DATABASE IF NOT EXISTS '.$dbname);
        $this->connection->exec('USE '.$dbname);
        $queries = $this->loadSQLSchema($dbfile);
        $i = 0;
        while ($i < count($queries) && strlen($this->_connection->errorInfo() [2] ) == 0) {
          $this->_connection->exec($queries[$i]);
          echo $queries[$i];
          $i++;
        }

      } catch (PDOException $e) {
        echo $e;
      }

    }

    protected $db;

    function __construct()
    {
      try {

        $this->db = new PDO('mysql:host=localhost;'
        .'dbname=db_tpe;charset=utf8'
        , 'root', '');
      } catch (PDOException $e) {
        buildDDBBfromFile('db_tpe', 'db_tpe.sql');
      }

    }


  }

?>
