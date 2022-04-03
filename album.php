<?php include("includes/header.php"); ?>
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
    <span>By <?php echo $artist->getName(); ?></span>
    <p><?php echo $album->getNumberOfSongs(); ?> song(s)</p>
  </div>
</div>

<?php include("includes/footer.php"); ?>