<?php 
  include("includes/config.php");

  if (isset($_SESSION['userLoggedIn'])){
    $userLoggedIn = $_SESSION['userLoggedIn'];
  } else {
    header("Location: register.php");
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amplify</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <div id="mainContainer">
    <div id="topContainer">
      <div id="navBarContainer">
        <nav class="navBar">
          <a href="index.php" class="logo">
            <img src="assets/images/icons/logo.png" alt="logo">
          </a>
          <div class="group">
            <div class="navItem">
              <a href="search.php" class="navItemLink">Search
                <img src="assets/images/icons/search.png" class="icon" alt="search">
              </a>
            </div>
          </div>
          <div class="group">
            <div class="navItem">
              <a href="browse.php" class="navItemLink">Browse</a>
            </div>
            <div class="navItem">
              <a href="yourMusic.php" class="navItemLink">Your Music</a>
            </div>
            <div class="navItem">
              <a href="profile.php" class="navItemLink">Harrison Max-Wilson</a>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div id="nowPlayingBarContainer">
      <div id="nowPlayingBar">
        <div id="nowPlayingLeft">
          <div class="content">
            <span class="albumLink">
              <img class="albumArtwork" src="https://i1.sndcdn.com/artworks-000145625906-5btpug-t500x500.jpg" alt="album link">
            </span>
            <div class="trackInfo">
              <span class="trackName">
                <span>Succulent Chinese Meal</span>
              </span>
              <span class="artistName">
                <span>Kylan Hendrickson</span>
              </span>
            </div>
          </div>
        </div>
        <div id="nowPlayingCenter">
          <div class="content playerControls">
            <div class="buttons">
              <button class="controlButton shuffle" title="Shuffle">
                <img src="assets/images/icons/shuffle.png" alt="Shuffle">
              </button>
              <button class="controlButton previous" title="Previous">
                <img src="assets/images/icons/previous.png" alt="previous">
              </button>
              <button class="controlButton play" title="Play">
                <img src="assets/images/icons/play.png" alt="play">
              </button>
              <button class="controlButton pause" title="Pause" hidden>
                <img src="assets/images/icons/pause.png" alt="pause">
              </button>
              <button class="controlButton next" title="Next">
                <img src="assets/images/icons/next.png" alt="next">
              </button>
              <button class="controlButton repeat" title="Repeat">
                <img src="assets/images/icons/repeat.png" alt="repeat">
              </button>
            </div>
            <div class="playbackBar">
              <span class="progressTime current">0.00</span>
              <div class="progressBar">
                <div class="progressBarBg">
                  <div class="progress"></div>
                </div>
              </div>
              <span class="progressTime remaining">0.00</span>
            </div>
          </div>
        </div>
        <div id="nowPlayingRight">
          <div class="volumeBar">
            <button class="controlButton volume" title="Volume">
              <img src="assets/images/icons/volume.png" alt="volume">
            </button>
            <div class="progressBar">
              <div class="progressBarBg">
                <div class="progress"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>