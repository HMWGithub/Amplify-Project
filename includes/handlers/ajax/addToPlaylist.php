<?php
  include("../../config.php");

  if(isset($_POST['playlistId']) && isset($_POST['songId'])){
    $playlistId = $_POST['playlistId'];
    $songId = $_POST['songId'];

    $orderIdQuery = mysqli_query($connection, "SELECT IFNULL(MAX(playlistOrder) + 1, 1) as playlistOrder FROM playlistsongs WHERE playlistId='$playlistId' LIMIT 1");
    $row = mysqli_fetch_array($orderIdQuery);
    $order = $row['playlistOrder'];

    $query = mysqli_query($connection, "INSERT INTO playlistsongs VALUES('', '$songId', '$playlistId', '$order')");
  } else {
    echo "PlaylistId or songId parameters not passed into addToPlaylist.php";
  }
?>