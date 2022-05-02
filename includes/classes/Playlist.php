<?php
  class Playlist {
    private $connection;
    private $id;
    private $name;
    private $owner;
    
    public function __construct($connection, $data){
      if(!is_array($data)){
        // Data is an ID (string)
        $query = mysqli_query($connection, "SELECT * FROM playlists WHERE id='$data'");
        $data = mysqli_fetch_array($query);
      }
      $this->connection = $connection;
      $this->id = $data['id'];
      $this->name = $data['name'];
      $this->owner = $data['owner'];
    }

    public function getId(){
      return $this->id;
    }

    public function getName(){
      return $this->name;
    }

    public function getOwner(){
      return $this->owner;
    }

    public function getNumberOfSongs(){
      $query = mysqli_query($this->connection, "SELECT songId FROM playlistsongs WHERE playlistId='$this->id'");

      return mysqli_num_rows($query);
    }
    
    public function getSongIDs(){
      $query = mysqli_query($this->connection, "SELECT songId FROM playlistsongs WHERE playlistId='$this->id' ORDER BY playlistOrder ASC");
      $array = array();

      while($row = mysqli_fetch_array($query)){
        array_push($array, $row['songId']);
      }

      return $array;
    }
  }
?>