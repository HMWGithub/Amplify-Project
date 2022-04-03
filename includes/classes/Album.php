<?php
  class Album {
    private $connection;
    private $id;

    private $title;
    private $artistID;
    private $genre;
    private $artworkPath;

    public function __construct($connection, $id){
      $this->connection = $connection;
      $this->id = $id;

      $query = mysqli_query($this->connection, "SELECT * FROM albums WHERE id='$this->id'");
      $album = mysqli_fetch_array($query);

      $this->title = $album['title'];
      $this->artistID = $album['artist'];
      $this->genre = $album['genre'];
      $this->artworkPath = $album['artworkPath'];
    }

    public function getTitle(){
      return $this->title;
    }
    public function getArtist(){
      return new Artist($this->connection, $this->artistID);
    }
    public function getGenre(){
      return $this->genre;
    }
    public function getArtworkPath(){
      return $this->artworkPath;
    }
    public function getNumberOfSongs(){
      $query = mysqli_query($this->connection, "SELECT id FROM songs WHERE album='$this->id'");
      return mysqli_num_rows($query);
    }
  }
?>