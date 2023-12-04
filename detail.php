<?php
$con = mysqli_connect("localhost", "gmaan1","gur@1303", "gmaan1_dmit2025");

?>



<<?php

include ("includes/header.php");

?>


<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$result = mysqli_query($con, "SELECT * FROM fav_games WHERE games_id = '$id'");

?>

<!-- Here we write the beginning of the while loop -->
<div class="outer-container">
<div class="detail-container">
<?php while ($row = mysqli_fetch_array($result)): ?>
    <h2><b><?php echo $row['title'] ?></b></h2>

    <div class="img-container"><img src="display/<?php echo $row['filename'] ?>" alt=""><br></div>
    <div class="writer"><h3><b>Writer:</b> <?php echo $row['writer'] ?></h3></div>
    <div class="publisher"><h3><b>Publisher:</b> <?php echo $row['publisher'] ?></h3></div>
    <div class="genre"><h3><b>Genre:</b> <?php echo $row['genre'] ?></h3></div>
    <div class="mode"><h3><b>Mode:</b> <?php echo $row['mode'] ?></h3></div>
    <div class="released-year"><h3><b>Released Year:</b> <?php echo $row['released'] ?></h3></div>
    <div class="description"><h3><b>Description:</b> <?php echo $row['description'] ?></h3><br></div>
    <div class="trailer"><h3><b>Game Trailer:</b> <br><div class="video-trailer"><?php echo $row['trailer'] ?></div></h3></div>
     
</div> 
<div class="filter_container">
<h2>Genre</h2>
  <a href="index.php?displayby=genre&displayvalue=Action">Action</a> | <br>
  <a href="index.php?displayby=genre&displayvalue=Adventure">Adventure</a> | <br>
  <a href="index.php?displayby=genre&displayvalue=Battle%royale">Battle Royale</a> | <br>
  <a href="index.php?displayby=genre&displayvalue=Open%world">Open World</a> | <br>

  <h2>Publisher</h2>
  <a href="index.php?displayby=publisher&displayvalue=Ubisoft">Ubisoft</a> | <br>
  <a href="index.php?displayby=publisher&displayvalue=Rockstar%games">Rockstar Games</a> | <br>
  <a href="index.php?displayby=publisher&displayvalue=Sony%Entertainment">Sony Entertainment</a> | <br>
  <a href="index.php?displayby=publisher&displayvalue=CD%Projekt">CD Projekt</a> | <br>
  <a href="index.php?displayby=publisher&displayvalue=2k%games">2k Games</a> | <br>
  <a href="index.php?displayby=publisher&displayvalue=Activision">Activision</a> | <br>
  <a href="index.php?displayby=publisher&displayvalue=Krafton">Krafton</a> | <br>
  <a href="index.php?displayby=publisher&displayvalue=Riot%Games">Riot Games</a> | <br>
  <a href="index.php?displayby=publisher&displayvalue=Epic%Games">Epic Games</a> | <br>

  <h2>Mode</h2>
  <a href="index.php?displayby=mode&displayvalue=Single-Player">Single-Player Games</a> | <br>
  <a href="index.php?displayby=mode&displayvalue=Multi-Player">Multi-Player Games</a> | <br>


</div>
</div>

<?php endwhile; ?>  


<?php

include ("includes/footer.php");
?>