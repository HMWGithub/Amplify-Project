<?php include("includes/includedFiles.php"); ?>
<?php 
  if (isset($_GET['id'])){
    $playlistID = $_GET['id'];
  } else {
    header("Location: index.php");
  }

  $playlist = new Playlist($connection, $playlistID);
  $owner = new User($connection, $playlist->getOwner());
?>

<div class="entityInfo">
  <div class="leftSection">
    <div class="playlistImage">
      <img src="assets/images/icons/playlist.png" alt="playlist art">
    </div>
  </div>
  <div class="rightSection">
    <h2><?php echo $playlist->getName();?></h2>
    <span>By <?php echo $playlist->getOwner(); ?></span>
    <p><?php echo $playlist->getNumberOfSongs(); ?> song(s)</p>
    <button class="button" onclick="deletePlaylist('<?php echo $playlistID; ?>')">
      DELETE PLAYLIST
    </button>
  </div>
</div>

<div class="tracklistContainer">
  <ul class="tracklist">
    <?php
      $songIDArray = $playlist->getSongIDs();
      $i = 1;
      foreach ($songIDArray as $songID) {
        $playlistSong = new Song($connection, $songID);
        $songArtist = $playlistSong->getArtist();

        echo "<li class='tracklistRow'>
                <div class='trackCount'>
                  <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"". $playlistSong->getID() ."\", tempPlaylist, true);'>
                  <span class='trackNumber'>". $i ."</span>
                </div>
                <div class='trackInfo'>
                  <span class='trackName'>". $playlistSong->getTitle() ."</span>
                  <span class='artistName'>". $songArtist->getName() ."</span>
                </div>
                <div class='trackOptions'>
                  <input type='hidden' class='songId' value='". $playlistSong->getID() ."'>
                  <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
                </div>
                <div class='trackDuration'>
                  <span class='duration'>". $playlistSong->getDuration() ."</span>
                </div>
              </li>";
        
        $i++;
      }
    ?>
    <script>
      var tempSongIds = '<?php echo json_encode($songIDArray); ?>';
      tempPlaylist = JSON.parse(tempSongIds);
    </script>
  </ul>
</div>

<nav class="optionsMenu">
  <input type="hidden" class="songId">
  <?php echo Playlist::getPlaylistDropdown($connection, $userLoggedIn->getUsername()); ?>
</nav>