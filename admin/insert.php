<?php

session_start();
if(!isset($_SESSION['your-random-session-sjfgetwrcvdjdzzz'])){
	header("Location:login.php?refer=insert");
}
?>
<?php
	include("../includes/header.php");

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
	$mode ="";
	$modeMsg = "";
	$trailer = "";
	$trailerMsg = "";

	$valid = 1;
	$msgPre = "<div class=\"alert alert-info\">";
	$msgPost = "</div>";

if(isset($_POST['mysubmit'])){

	$title = mysqli_real_escape_string($con, trim($_POST['title']));
	
	
	$writer = $_POST['writer'];
    $publisher = $_POST['publisher'];
	$mode = $_POST['mode'];
	$trailer = $POST['trailer'];
	$released = $_POST['released'];
	$genre = $_POST['genre'];
	$description = $_POST['description'];

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


	if($_FILES['myfile']['type'] != "image/jpeg"){
        $valid = 0;
        $myfileMsg = "<p>Not a JPG image</p>";
    }

    if($_FILES['myfile']['size'] > (8000 * 1024)){ 
        $valid = 0;
        $myfileMsg = "<p>File is too large</p>";
    }

	foreach ($_POST as $key => $value) { 
		if(!is_array($_POST)){ // WE ADD THIS SINCE IT WILL NOT WORK IF WE TRY TO PARSE AN ARRAY AS A SINGLE VALUE
		  $_POST[$key] = mysqli_real_escape_string($con,$value); 
	  }
	 
	} 

	function createThumbnail($file, $folder, $newwidth){

		list($width, $height) = getimagesize($file);
		$imgRatio = $width/$height;
		$newheight = $newwidth/ $imgRatio; 
	
		//echo "<p>$newwidth | $newheight";
	
		$thumb = imagecreatetruecolor($newwidth, $newheight);
	
		$source = imagecreatefromjpeg($file);
	
		imagecopyresampled($thumb, $source, 0,0,0,0, $newwidth, $newheight, $width, $height );
		$newFileName = $folder . basename($_FILES['myfile']['name']);
		imagejpeg($thumb, $newFileName, 80); 
		imagedestroy($thumb);
		imagedestroy($source);
	}

}


?>


<div>
<h2>Insert Information</h2>
<form id="myform" class="cssform" name="myform" method="post" enctype="multipart/form-data" 	action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">


	

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

		<!-- </div>
		<div> -->

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
					<label for="trailer"><b>Trailer :</b></label>
					<input type="text" class="form-control" id="trailer" name="trailer" value="<?php if($trailer){echo $trailer;}?>">
					<?php if($trailerMsg){echo $msgPre.$gtrailerMsg.$msgPost;} ?>
			</div>

			<div class="form-group">
				<label for="description"><b>Description:</b></label>
				<textarea class="form-control" id="description" name="description"><?php if($description){echo $description;} ?></textarea>
				<?php if($descriptionMsg){echo $msgPre.$descriptionMsg.$msgPost;} ?>
			</div> 
			<div class="form-group">
			<input type="file" name="myfile" class="mb-4" > <br>
			<?php if($myfileMsg){echo $msgPre.$myfileMsg.$msgPost;} ?>
			</div> 
			

			<div class="form-group">
				<label for="submit">&nbsp;</label>
				<input type="submit" name="mysubmit" class="btn btn-info" value="Submit">
			</div>
		</div>


	</div>
</form>
</div>


<?php
if(isset($_POST['mysubmit'])){
if($valid == 1){

$strSuccessMessage =  "Successfully inserted new Game";


function createSquareImageCopy($file, $folder, $newWidth){
   
    //echo "$filename, $folder, $newWidth";
    //exit();

    $thumb_width = $newWidth;
    $thumb_height = $newWidth;// tweak this for ratio

    list($width, $height) = getimagesize($file);

    $original_aspect = $width / $height;
    $thumb_aspect = $thumb_width / $thumb_height;

    if($original_aspect >= $thumb_aspect) {
       // If image is wider than thumbnail (in aspect ratio sense)
       $new_height = $thumb_height;
       $new_width = $width / ($height / $thumb_height);
    } else {
       // If the thumbnail is wider than the image
       $new_width = $thumb_width;
       $new_height = $height / ($width / $thumb_width);
    }

    $source = imagecreatefromjpeg($file);
    $thumb = imagecreatetruecolor($thumb_width, $thumb_height);

    // Resize and crop
    imagecopyresampled($thumb,
                       $source,0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                       0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                       0, 0,
                       $new_width, $new_height,
                       $width, $height);
   
    $newFileName = $folder. "/" .basename($file);
    imagejpeg($thumb, $newFileName, 80);

    echo "<p><img src=\"$newFileName\" /></p>"; // if you want to see the image
}


//NO VALIDATION ERRORS: GO AHEAD AND SEND THE MAIL OR ENTER INTO A DB

if(move_uploaded_file($_FILES['myfile']['tmp_name'], "../originals/". $_FILES['myfile']['name'])){

	$thisFile = "../originals/" . basename($_FILES['myfile']['name']);
		createSquareImageCopy($thisFile, "../thumbs/", 250);
		//createThumbnail($thisFile, "thumbs/", 250);
		createThumbnail($thisFile, "../display/", 1000);

		$filename = $_FILES['myfile']['name'] ;

	}else{
		echo "<h3>ERROR</h3>"; 
}


$sql = "INSERT INTO fav_games (title, writer, publisher, released, genre, description, filename, mode, trailer)
VALUES ('$title', '$writer','$publisher', '$released', '$genre', '$description', '$filename', '$mode', '$trailer')"; 
mysqli_query($con,$sql) or die (mysqli_error($con));


}

}

?>


<?php

if($strSuccessMessage){
	echo $msgPre.$strSuccessMessage.$msgPost;
}
?>


<?php
	include("../includes/footer.php");
?>