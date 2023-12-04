<?php
$con = mysqli_connect("localhost", "gmaan1","gur@1303", "gmaan1_dmit2025");

$searchterm = "";
?>

<?php 

if(isset($_POST['searchterm']) && strlen($_POST['searchterm']) > 2):
$searchterm = $_POST['searchterm'];

$sql = "SELECT * FROM fav_games WHERE
    title LIKE '%$searchterm%'
    OR genre LIKE '%$searchterm%'
    OR released LIKE '%$searchterm%'
    OR writer LIKE '%$searchterm%'
    OR publisher LIKE '%$searchterm%'
";

$result = mysqli_query($con, $sql);
?>

<?php while ($row = mysqli_fetch_array($result)): ?>

<p><a href="detail.php?games_id=<?php echo $row['games_id']?>"><?php echo $row['title'] ?></a></p> 

<?php endwhile; ?>       

<?php endif; ?>


<html>

<head>
<style>
    body{
        display:flex;
        flex-wrap:wrap;
    }

    div{
        width: 260px;
        margin:10px;
    }

</style>
</head>

<body>
<div class="jumbotron clearfix">
        <h1><?php echo APP_NAME ?></h1>
        
      </div>
<?php
$sql = "SELECT * FROM fav_games";  

$displayby = "";
$displayvalue = "";

if(isset($_GET['displayby'])){
$displayby = $_GET['displayby'];
}

if(isset($_GET['displayvalue'])){
$displayvalue = $_GET['displayvalue'];
}

if($displayby && $displayvalue){
	$sql = "SELECT * FROM fav_games WHERE $displayby LIKE '%$displayvalue%'";
}

$result = mysqli_query($con, $sql) or die(mysqli_error($con)); 
?>

<?php
//////////////////////////// pagination

if($displayby != "" && $displayvalue != ""){
	$getcount = mysqli_query($con, "SELECT COUNT(*) FROM fav_games WHERE $displayby LIKE '%$displayvalue%'");
}else{
  $getcount = mysqli_query($con, "SELECT COUNT(*) FROM fav_games");
}
$postnum = mysqli_result($getcount,0);
$limit = 6;
if($postnum > $limit){
$tagend = round($postnum % $limit,0);
$splits = round(($postnum
-
$tagend)/$limit,0);
if($tagend == 0){
	$num_pages = $splits;
}else{
	$num_pages = $splits + 1;
}
if(isset($_GET['pg'])){
	$pg = $_GET['pg'];
}else{
	$pg = 1;
}
$startpos = ($pg*$limit)-$limit;
$limstring = "LIMIT $startpos,$limit";
}else{
$limstring = "LIMIT 0,$limit";
}
// MySQLi upgrade: we need this for mysql_result() equivalent
function mysqli_result($res, $row, $field=0) {
	$res->data_seek($row);
	$datarow = $res->fetch_array();
	return $datarow[$field];
}

if($displayby != "" && $displayvalue != ""){
	$result = mysqli_query($con, "SELECT * FROM fav_games WHERE $displayby LIKE '%$displayvalue%' $limstring");
}else{
  $result = mysqli_query($con, "SELECT * FROM fav_games $limstring");
}

?>

<!-- Here we write the beginning of the while loop -->
<div class="outer-container">
<div class="loop_container">
<?php while ($row = mysqli_fetch_array($result)): ?>
    
<div><a href="detail.php?id=<?php echo $row['games_id']?>"> <img src="thumbs/<?php echo $row['filename'] ?>" alt=""> <br><?php echo $row['title'] ?></a></div>

<?php endwhile; ?>  
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
<ul class="pagination">
<?php 
if(strlen($_SERVER['QUERY_STRING']) > 20){

  if($postnum > $limit){
  echo "<strong>Pages:</strong> &nbsp;&nbsp;&nbsp;";
  $n = $pg + 1;
  $p = $pg - 1;
  $thisroot = $_SERVER['REQUEST_URI'];
  $thisroot = remove_url_query($thisroot,'pg');
  if($pg > 1){
    echo "<li class=\"page-item \"><a class=\"page-link\" href=\"$thisroot&pg=$p\">prev</a></li>";
  }
  for($i=1; $i<=$num_pages; $i++){
  if($i!= $pg){
    echo "<li class=\"page-item \"><a class=\"page-link\" href=\"$thisroot&pg=$i\">$i</a></li>";
  }else{
    echo "<li class=\"page-item active\"><a class=\"page-link\" >$i</a></li>";
  }
  }
  if($pg < $num_pages){
    echo "<li class=\"page-item \"><a class=\"page-link\" href=\"$thisroot&pg=$n\">next</a></li>";
  }
    // echo "<li class=\"page-item active\"><a class=\"page-link\" ></a></li>";
}}else{
  if($postnum > $limit){
    echo "<strong>Pages:</strong> &nbsp;&nbsp;&nbsp;";
    $n = $pg + 1;
    $p = $pg - 1;
    $thisroot = $_SERVER['PHP_SELF'];
    if($pg > 1){
      echo "<li class=\"page-item\"><a class=\"page-link\" href=\"$thisroot?pg=$p\">prev</a></li>";
    }
    for($i=1; $i<=$num_pages; $i++){
    if($i!= $pg){
      echo "<li class=\"page-item\"><a class=\"page-link\" href=\"$thisroot?pg=$i\">$i</a></li>";
    }else{
      echo "<li class=\"page-item active\"><a class=\"page-link\" >$i</a></li>";
    }
    }
    if($pg < $num_pages){
      echo "<li class=\"page-item\"><a class=\"page-link\" href=\"$thisroot?pg=$n\">next</a></li>";
    }
    // echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"#\">$i</a></li>";
  }
}

function remove_url_query($url, $key) {
  $url = preg_replace('/(?:&|(\?))' . $key . '=[^&]*(?(1)&|)?/i', "$1", $url);
  $url = rtrim($url, '?');
  $url = rtrim($url, '&');
  return $url;
}

?>
</ul>

<!-- <iframe width="885" height="498" src="https://www.youtube.com/embed/QkkoHAzjnUs" title="Grand Theft Auto V Trailer" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

</body>
</html>