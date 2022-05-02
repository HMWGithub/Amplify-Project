<?php include("includes/includedFiles.php"); ?>
<?php 
  if (isset($_GET['id'])){
    $albumID = $_GET['id'];
  } else {
    header("Location: index.php");
  }

  $album = new Album($connection, $albumID);
  $artist = $album->getArtist();
?>

<div class="entityInfo">
  <div class="leftSection">
    <img src="<?php echo $album->getArtworkPath(); ?>" alt="album art">
  </div>
  <div class="rightSection">
    <h2><?php echo $album->getTitle();?></h2>
    <span role="link" tabindex="0" onclick="openPage('artist.php?id=$artistId')">By <?php echo $artist->getName(); ?></span>
    <p><?php echo $album->getNumberOfSongs(); ?> song(s)</p>
  </div>
</div>

<div class="tracklistContainer">
  <ul class="tracklist">
    <?php
      $songIDArray = $album->getSongIDs();
      $i = 1;
      foreach ($songIDArray as $songID) {
        $albumSong = new Song($connection, $songID);
        $albumArtist = $albumSong->getArtist();

        echo "<li class='tracklistRow'>
                <div class='trackCount'>
                  <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"". $albumSong->getID() ."\", tempPlaylist, true);'>
                  <span class='trackNumber'>". $i ."</span>
                </div>
                <div class='trackInfo'>
                  <span class='trackName'>". $albumSong->getTitle() ."</span>
                  <span class='artistName'>". $albumArtist->getName() ."</span>
                </div>
                <div class='trackOptions'>
                  <input type='hidden' class='songId' value='". $albumSong->getID() ."'>
                  <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
                </div>
                <div class='trackDuration'>
                  <span class='duration'>". $albumSong->getDuration() ."</span>
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