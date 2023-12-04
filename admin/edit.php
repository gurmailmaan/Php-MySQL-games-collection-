<?php
	include("../includes/header.php");
?>
<div class="m-5">
<?php
		$title = "";
        $writer="";
        $writerMsg = "";
        $msgSuccess = "";
        $publisher = "";
        $publisherMsg = "";
        $released ="";
        $releasedMsg ="";
        $genre ="";
        $genreMsg="";
        $description ="";
        $descriptionMsg = "";
        $strSuccessMessage = "";
        $msg = "";
        $filename="";
        $myfile = "";
        $myfileMsg = "";
        $valid = "";
        $mode = "";
        $modeMsg = "";
      
        


	$strValidationCompany = "";
	$strValidationCity = "";
	$strValidationPhone1 = "";
	$strValidationEmail = "";

    $strSuccessMessage = "";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = "";
    }

    if(!$id){
        $result = mysqli_query($con,"SELECT games_id FROM fav_games LIMIT 1");
        while($row = mysqli_fetch_array($result)){
            $id = $row['games_id'];
        }

    }


    $sql = "SELECT * FROM fav_games WHERE games_id = '$id'";
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
    while($row = mysqli_fetch_array($result)){
        $title = $row['title'];
        $writer = $row['writer'];
        $released=$row['released'];
        $genre = $row['genre'];
        $publisher = $row['publisher'];
        $description = $row['description'];
        $mode = $row['mode'];
        // $mode = $row['mode'];
     
        

    }

    

    if(isset($_POST['mysubmit'])){

        $title = $_POST['title'];
        
        
        $writer = $_POST['writer'];
        $publisher = $_POST['publisher'];
        $mode = $_POST['mode'];
    
        $released = $_POST['released'];
        $genre = $_POST['genre'];
        $description = $_POST['description'];

        // $valid = 1;
        $msgPre = "<div class=\"alert alert-info\">";
        $msgPost = "\</div>";
    
        // User val:
        if((strlen($title) < 3) || (strlen($title) > 40)){
            $valid = 0;
            $valTitleMsg = "Please enter a Game Title from 3 to 40 characters.";
        }
    
        if((strlen($writer) < 3) || (strlen($writer) > 20)){
            $valid=0;
            $writerMsg = "Please enter a Writer Name from 3 to 20 characters.";
        }
    
            if((strlen($released) < 0) || (strlen($released) > 4)){
                $valid=0;
                $releasedMsg = "Please enter a valid Year";
            }
    
            if((strlen($genre) < 3) || (strlen($genre) > 20)){
                $valid=0;
                $genreMsg = "Please enter valid genre";
            }
    
            if((strlen($publisher) < 3) || (strlen($publisher) > 20)){
                $valid=0;
                $publisherMsg = "Please enter a Publisher Name from 3 to 20 characters.";
            }
    
    
        if((strlen($description) < 10) || (strlen($description) > 400)){
            $valid=0;
            $descriptionMsg = "Please enter a comment from 10 to 400 characters.";
        }

        $mode = trim($_POST['mode']);
        $mode = filter_var($mode,FILTER_SANITIZE_STRING);
        if(isset($mode) && $mode == ""){
            $valid = 0;
            $modeMsg = "Please select a Mode :)";
        }

    
        foreach ($_POST as $key => $value) { 
            if(!is_array($_POST)){ // WE ADD THIS SINCE IT WILL NOT WORK IF WE TRY TO PARSE AN ARRAY AS A SINGLE VALUE
              $_POST[$key] = mysqli_real_escape_string($con,$value); 
          }
         
        } 
    

    
    }

	if($valid==1){

        // UPDATE STATEMENT

        $sql = "UPDATE fav_games SET
        title = '$title',
        writer = '$writer',
        released = '$released',
        genre = '$genre',
        mode = '$mode',
        publisher = '$publisher',
        description = '$description'
        WHERE games_id = '$id'";

        mysqli_query($con,$sql) or die(mysqli_error($con));

        $msgSuccess = "Successfully Updated";

    }

    $contactLink = "";
    $allLinks = "";

    $sql = "SELECT * FROM fav_games";
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
    while($row = mysqli_fetch_array($result)){
        $title = $row['title'];
        $games_id = $row['games_id'];

    if($games_id == $id){
        $contactLink = "\n<a href=\"edit.php?id=$games_id\"><b>$title</b></a><br>\n";
    }else{
        $contactLink = "\n<a href=\"edit.php?id=$games_id\">$title</a><br>\n";
    }
        $allLinks .= $contactLink;


    }

    echo $allLinks;
    
?>
</div>
<div>
<h2>Insert Information</h2>
<form id="myform" class="cssform" name="myform" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">


	

	<div class="outer-container d-lg-flex">
		<div>
			<div class="form-group required">
				<label for="title"><b>Game Title:</b></label>
				<input type="text" id="title"  class="form-control" name="title" value="<?php echo $title; ?>">
				<?php if(isset($valTitleMsg)){echo $msgPre. $valTitleMsg. $msgPost;} ?>
			</div>

			<div class="form-group required">
					<label for="writer"><b>Writer:</b></label>
					<input type="text" class="form-control" id="writer" name="writer" value="<?php if($writer){echo $writer;} ?>">
					<?php if($writerMsg){echo $msgPre.$writerMsg.$msgPost;} ?>
			</div>

			<div class="form-group">
					<label for="publisher"><b>Publisher:</b></label>
					<input type="text" class="form-control" id="publisher" name="publisher" value="<?php if($publisher){echo $publisher;}?>">
					<?php if($publisherMsg){echo $msgPre.$publisherMsg.$msgPost;} ?>
			</div>

			<div class="form-group">
					<label for="genre"><b>Genre:</b></label>
					<input type="text" class="form-control" id="genre" name="genre" value="<?php if($genre){echo $genre;}?>">
					<?php if($genreMsg){echo $msgPre.$genreMsg.$msgPost;} ?>
			</div>

			<div class="form-group">
					<label for="released"><b>Released Year:</b></label>
					<input type="text" class="form-control" id="released" name="released" value="<?php if($released){echo $released;}?>">
					<?php if($releasedMsg){echo $msgPre.$releasedMsg.$msgPost;} ?>
			</div>

			<div class="form-group">
		    <label for="mode"><b>Mode:</b></label>
			  <select class="form-control" name="mode">
	            <option value="">...select Mode...</option>
	            
	            <option value="Single-Player" <?php if((isset($mode) && $mode == "Single-Player")){echo "selected";}?>>Single-Player</option>
	            <option value="Multi-Player" <?php if((isset($mode) && $mode == "Multi-Player")){echo "selected";}?>>Multi-Player</option>
				</select>
                <?php if($modeMsg){echo $msgPre.$modeMsg.$msgPost;} ?>
          </div>

			<div class="form-group">
				<label for="description"><b>Description:</b></label>
				<textarea class="form-control" id="description" name="description"><?php if($description){echo $description;} ?></textarea>
				<?php if($descriptionMsg){echo $msgPre.$descriptionMsg.$msgPost;} ?>
			</div> 
			

			<div class="form-group">
				<label for="submit">&nbsp;</label>
				<input type="submit" name="mysubmit" class="btn btn-info" value="Submit">
			</div>
            <a href="delete.php?id=<?php echo $id ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
		</div>


	</div>
</form>
</div>


<?php

if($strSuccessMessage){
	echo $msgPre.$strSuccessMessage.$msgPost;
}
?>


<?php
	include("../includes/footer.php");
?>