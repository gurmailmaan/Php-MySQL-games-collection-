<?php 

include("../includes/mysql_connect.php");
$id = $_GET['id'];
$sql = "DELETE FROM fav_games WHERE games_id = '$id'";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

header("Location:edit.php");






?>