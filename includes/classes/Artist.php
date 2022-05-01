<?php
  class Artist {
    private $connection;
    private $id;

    public function __construct($connection, $id){
      $this->connection = $connection;
      $this->id = $id;
    }

    public function getId() {
      return $this->id;
    }

    public function getName(){
      $query = mysqli_query($this->connection, "SELECT name FROM artists WHERE id='$this->id'");
      $artist = mysqli_fetch_array($query);
      return $artist['name'];
    }
    
    public function getSongIDs(){
      $query = mysqli_query($this->connection, "SELECT id FROM songs WHERE artist='$this->id' ORDER BY plays ASC");
      $array = array();

      while($row = mysqli_fetch_array($query)){
        array_push($array, $row['id']);
      }

      return $array;
    }
  }
?>