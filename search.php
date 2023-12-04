<?php

include ("includes/header.php");
$searchterm = "";
?>

<h1>Search</h1>
        
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
  


    

    <!-- Here we write the beginning of the while loop -->
    <?php while ($row = mysqli_fetch_array($result)): ?>

    <p><a href="detail.php?id=<?php echo $row['games_id']?>"><?php echo $row['title'] ?></a></p> 

    <?php endwhile; ?>       
 
<?php endif; ?>



<form action="<?php echo BASE_URL ?>search.php" method="post">

    <div class="form-group required">
		<!-- <label for="searchterm">Searchterm:</label> -->
		<input type="text" id="company"  class="form-control" name="searchterm" value="<?php echo $searchterm; ?>">
		
	</div>

    <div class="form-group">
		<label for="submit">&nbsp;</label>
		<input type="submit" name="mysubmit" class="btn btn-info" value="Search">
	</div>

</form>






<?php

include ("includes/footer.php");
?>