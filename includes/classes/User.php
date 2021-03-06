<?php
  class User {
    private $connection;
    private $username;

    public function __construct($connection, $username){
      $this->connection = $connection;
      $this->username = $username;
    }

    public function getUsername(){
      return $this->username;
    }

    public function getEmail(){
      $query = mysqli_query($this->connection, "SELECT email FROM users WHERE username='$this->username'");
      $row = mysqli_fetch_array($query);

      return $row['email'];
    }

    public function getFirstAndLastName(){
      $query = mysqli_query($this->connection, "SELECT concat(firstName, ' ', lastName) AS 'name' FROM users WHERE username='$this->username'");
      $row = mysqli_fetch_array($query);

      return $row['name'];
    }
  }
?>