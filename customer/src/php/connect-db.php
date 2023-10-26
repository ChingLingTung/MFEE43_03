<?php
  class DatabaseConnector {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    public $conn;

    function __construct($dbname) {
      $this->servername = "localhost";
      $this->username = "123456";
      $this->password = "";
      $this->dbname = $dbname;

      $this->connect_db();
    }

    function connect_db() {
      // Create connection
      $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      // Check connection
      if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
      }
    }

    function disconnect_db() {
      $this->conn->close();
    }

    function exec_sql($sql) {
      return $this->conn->query($sql);
    }
  }
?>