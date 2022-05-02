<?php
  class Playlist {
    private $connection;
    private $id;
    private $name;
    private $owner;
    
    public function __construct($connection, $data){
      $this->connection = $connection;
      $this->id = $data['id'];
      $this->name = $data['name'];
      $this->owner = $data['owner'];
    }

    public function getName(){
      return $this->name;
    }

    public function getOwner(){
      return $this->owner;
    }

    public function getId(){
      return $this->id;
    }
  }
?>