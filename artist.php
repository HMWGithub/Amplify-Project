<?php include("includes/includedFiles.php"); ?>
<?php 
  if (isset($_GET['id'])){
    $artistId = $_GET['id'];
  } else {
    header("Location: index.php");
  }

  $artist = new Artist($connection, $artistId);
?>

<div class="entityInfo borderBottom">
  <div class="artistInfo">
    <h1 class="artistName"><?php echo $artist->getName(); ?></h1>
    <div class="headerButtons">
      <button class="button green" onclick="playFirstSong()">
        PLAY
      </button>
    </div>
  </div>
</div>

<div class="tracklistContainer borderBottom">
  <h2>SONGS</h2>
  <ul class="tracklist">
    <?php
      $songIDArray = $artist->getSongIDs();
      $i = 1;
      foreach ($songIDArray as $songID) {
        $albumSong = new Song($connection, $songID);
        $albumArtist = $albumSong->getArtist();

        if($i > 5){
          break;
        }

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

<div class="gridViewContainer">
  <h2>ALBUMS</h2>
  <?php 
    $albumQuery = mysqli_query($connection, "SELECT * FROM albums WHERE artist='$artistId'");

    while($row = mysqli_fetch_array($albumQuery)){
      echo "<div class='gridViewItem'>
              <span role='link' tabindex='0' onclick='openPage(\"album.php?id=". $row['id'] ."\")'>
                <img src='" . $row['artworkPath'] . "'>
                <div class='gridViewInfo'>
                  ". $row['title'] ."
                </div>
              </span>
            </div>";
    }
  ?>
</div>

<nav class="optionsMenu">
  <input type="hidden" class="songId">
  <?php echo Playlist::getPlaylistDropdown($connection, $userLoggedIn->getUsername()); ?>
</nav>