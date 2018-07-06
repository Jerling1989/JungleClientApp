<?php
	// INCLUDE NECCESSARY FILES AND SCRIPTS
	include('includes/header.php');
	include('includes/form_handlers/edit_client_handler.php');
	include('includes/form_handlers/add_task_handler.php');

	// CHECK IF USERNAME IS SET FOR URL
	if(isset($_GET['profile_username'])) {
		// USERNAME VARIABLE
		$username = $_GET['profile_username'];
		// DATABASE QUERY
		$client_details_query = mysqli_query($connection, "SELECT * FROM clients WHERE username='$username'");
		// STORE QUERY RESULTS IN ARRAY
		$client = mysqli_fetch_array($client_details_query);

	}
?>

	<br />

	<!-- CLIENT INFO PANEL -->
	<div class="client-info col-md-12">
		<div class="row">
			<!-- LEFT SIDE INFO -->
			<div class="col-md-4">
				<img src="<?php echo $client['profile_pic'] ?>">
				<h5>ID: <?php echo $client['id']; ?></h5>
				<h5>Name: <?php echo $client['first_name'] . ' ' . $client['last_name']; ?></h5>
				<h5>Company: <?php echo $client['company_name']; ?></h5>
				<!-- FACEBOOK -->
				<a target="_blank" href="<?php echo $client['facebook']; ?>">
					<i class="fab fa-facebook fa-lg"></i>
				</a>
				<!-- TWITTER -->
				<a target="_blank" href="<?php echo $client['twitter']; ?>">
					<i class="fab fa-twitter-square fa-lg"></i>
				</a>
				<!-- INSTAGRAM -->
				<a target="_blank" href="<?php echo $client['instagram']; ?>">
					<i class="fab fa-instagram fa-lg"></i>
				</a>
				<!-- LINKEDIN -->
				<a target="_blank" href="<?php echo $client['linkedin']; ?>">
					<i class="fab fa-linkedin fa-lg"></i>
				</a>
				<!-- YOUTUBE -->
				<a target="_blank" href="<?php echo $client['youtube']; ?>">
					<i class="fab fa-youtube-square fa-lg"></i>
				</a>
				<!-- PINTEREST -->
				<a target="_blank" href="<?php echo $client['pinterest']; ?>">
					<i class="fab fa-pinterest-p fa-lg"></i>
				</a>
			</div>
			<!-- RIGHT SIDE INFO -->
			<div class="col-md-8">
				<h5>Website: <a target="_blank" href="http://<?php echo $client['website']; ?>"><?php echo $client['website']; ?></a></h5>
				<h5>Email: <?php echo $client['email']; ?></h5>
				<h5>Phone: <?php echo $client['phone_number']; ?></h5>
				<h5>Street: <?php echo $client['street_address']; ?></h5>
				<h5>City: <?php echo $client['city']; ?></h5>
				<h5>State: <?php echo $client['state']; ?></h5>
				<h5>Services: <?php echo $client['services']; ?></h5>
			</div>
		</div>

		<br />
		<!-- BUTTON TO TOGGLE CLIENT INFO FORM DIV -->
		<button type="button" class="btn btn-outline-light btn-sm" data-toggle="collapse" data-target="#edit_client" aria-expanded="false" aria-controls="edit_client">Edit</button>
		
		<!-- COLLAPSIBLE FORM DIV -->
		<div class="collapse" id="edit_client">
		  <div class="card card-body">
		    <form class="" action="" method="POST">
					<!-- FIRST NAME -->
				  <div class="row">
				    <div class="col-6 col-md-3 form-group">
				    	<label for="first_name">First Name</label>
				      <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php echo $client['first_name']; ?>" />
				    </div>
				    <!-- LAST NAME -->
				    <div class="col-6 col-md-3 form-group">
				    	<label for="last_name">Last Name</label>
				      <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo $client['last_name']; ?>" />
				    </div>
				    <!-- COMPANY -->
				    <div class="col-6 col-md-3 form-group">
				    	<label for="company">Company</label>
				      <input type="text" class="form-control" name="company" placeholder="Company"  value="<?php echo $client['company_name']; ?>" />
				    </div>
				    <!-- WEBSITE -->
				    <div class="col-6 col-md-3 form-group">
				    	<label for="website">Website</label>
				      <input type="text" class="form-control" name="website" placeholder="www.example.com" value="<?php echo $client['website']; ?>" />
				    </div>
				  </div>
					<!-- STREET -->
				  <div class="row">
				    <div class="col-12 col-md-4 form-group">
				    	<label for="street">Street</label>
				      <input type="text" class="form-control" name="street" placeholder="42 Wallaby Way" value="<?php echo $client['street_address']; ?>" />
				    </div>
				    <!-- CITY -->
				    <div class="col-12 col-md-4 form-group">
				    	<label for="city">City</label>
				      <input type="text" class="form-control" name="city" placeholder="Dallas" value="<?php echo $client['city']; ?>" />
				    </div>
				    <!-- STATE -->
				    <div class="col-12 col-md-4 form-group">
				    	<label for="state">State</label>
				      <input type="text" class="form-control" name="state" placeholder="Texas" value="<?php echo $client['state']; ?>" />
				    </div>
				  </div>
					<!-- EMAIL -->
				  <div class="row">
				    <div class="col-6 col-md-4 form-group">
				    	<label for="email">Email</label>
				      <input type="email" class="form-control" name="email" placeholder="contact@example.com" value="<?php echo $client['email']; ?>" />
				    </div>
				    <!-- PHONE -->
				    <div class="col-6 col-md-4 form-group">
				    	<label for="phone">Phone</label>
				      <input type="text" class="form-control" name="phone" placeholder="(855) 555-1246" value="<?php echo $client['phone_number']; ?>" />
				    </div>
				    <!-- SERVICES -->
				    <div class="col-12 col-md-4 form-group">
				    	<label for="services">Services</label>
				      <input type="text" class="form-control" name="services" placeholder="Ex. Google Adwords, SEO, Facebook..." value="<?php echo $client['services']; ?>" />
				    </div>				    
				  </div>

					
				  <div class="row">
				  	<!-- FACEBOOK -->
				  	<div class="col-6 col-md-2 form-group">
				  		<label for="facebook">Facebook</label>
				      <input type="text" class="form-control" name="facebook" placeholder="https://www.facebook.com/example" value="<?php echo $client['facebook']; ?>" />
				    </div>
				    <!-- TWITTER -->
				    <div class="col-6 col-md-2 form-group">
				    	<label for="twitter">Twitter</label>
				      <input type="text" class="form-control" name="twitter" placeholder="https://twitter.com/example" value="<?php echo $client['twitter']; ?>" />
				    </div>
				    <!-- INSTAGRAM -->
				    <div class="col-6 col-md-2 form-group">
				    	<label for="instagram">Instagram</label>
				      <input type="text" class="form-control" name="instagram" placeholder="https://instagram.com/example" value="<?php echo $client['instagram']; ?>" />
				    </div>
				    <!-- LINKEDIN -->
				    <div class="col-6 col-md-2 form-group">
				    	<label for="linkedin">LinkedIn</label>
				      <input type="text" class="form-control" name="linkedin" placeholder="https://linkedin.com/in/example" value="<?php echo $client['linkedin']; ?>" />
				    </div>
				    <!-- YOUTUBE -->
				    <div class="col-6 col-md-2 form-group">
				    	<label for="youtube">YouTube</label>
				      <input type="text" class="form-control" name="youtube" placeholder="https://youtube.com/example" value="<?php echo $client['youtube']; ?>" />
				    </div>
				    <!-- PINTEREST -->
				    <div class="col-6 col-md-2 form-group">
				    	<label for="pinterest">Pinterest</label>
				      <input type="text" class="form-control" name="pinterest" placeholder="https://pinterest.com/example" value="<?php echo $client['pinterest']; ?>" />
				    </div>
				  </div>
					<br />
					
					<!-- FORM SUBMIT BUTTON -->
				  <div class="row">
				  	<div class="col-12">
				  		<input type="submit" class="btn btn-outline-light btn-block" name="edit_client" value="Submit" />
				  	</div>
			    </div>

				</form>
				<!-- END FORM -->
		  </div>
		</div>
		<!-- COLLAPSIBLE FORM DIV -->
	</div>
	<!-- END CLIENT INFO PANEL -->

	<br />
	
	<!-- TASK MANAGER DIV -->
	<div class="add_new_task">
		<!-- NEW TASK FORM -->
		<form action="" method="POST">
			<div class="row">
				<div class="col-8 col-sm-10">
					<input type="text" class="form-control" name="task_name" placeholder="Add New Task" required />
				</div>
				<div class="col-4 col-sm-2">
					<input type="submit" class="btn btn-outline-light btn-block" name="add_task" value="Add" />
				</div>
			</div>
		</form>
		<!-- END NEW TASK FORM -->
		<br />

		<!-- TASK DATA DIV -->
		<div class="row">
			<?php
	  		$str = '';
	  		// DATABAD QUERY
				$data_query = mysqli_query($connection, "SELECT * FROM tasks WHERE client_for='$username' ORDER BY id DESC");

				if (mysqli_num_rows($data_query) > 0) {
					// LOOP THROUGH QUERY RESULTS ARRAY
					while ($row = mysqli_fetch_array($data_query)) {
						// CREATE POST VARIABLES
						$task_name = $row['task_name'];
						$created_by = $row['created_by'];
						$created_at = $row['created_at'];
						$pending_by = $row['pending_by'];
						$pending_at = $row['pending_at'];
						$completed_by = $row['completed_by'];
						$completed_at = $row['completed_at'];

						// IF TASK IS MARKED AS COMPLETED
						if($completed_by != '') {
							$str = "<div class='card text-white bg-success col-12 col-sm-6 col-lg-3 task-cards'>
											  <div class='card-body'>
											    <h5 class='card-title'>$task_name</h5>
											    <p class='card-text'>Completed by $completed_by at $completed_at</p>
											    <form action='' method='POST'>
														<input type='submit' class='btn btn-danger btn-block' name='remove_task' value='Remove Task' />
														<input type='hidden' name='task_name' value='$task_name' />
													</form>
											  </div>
											</div>";

							// IF TASK IS MARKED AS PENDING
						} else if($pending_by != '') {
							$str = "<div class='card text-white bg-warning col-12 col-sm-6 col-lg-3 task-cards'>
											  <div class='card-body'>
											    <h5 class='card-title'>$task_name</h5>
											    <p class='card-text'>Pending by $pending_by at $pending_at</p>
											    <form action='' method='POST'>
														<input type='submit' class='btn btn-success btn-block' name='mark_complete' value='Mark Complete' />
														<input type='hidden' name='task_name' value='$task_name' />
													</form>
											  </div>
											</div>";

							// IF TASK IS MARKED AS CREATED
						} else {
							$str = "<div class='card text-white bg-danger col-12 col-sm-6 col-lg-3 task-cards'>
											  <div class='card-body'>
											    <h5 class='card-title'>$task_name</h5>
											    <p class='card-text'>Created by $created_by at $created_at</p>
											    <form action='' method='POST'>
														<input type='submit' class='btn btn-warning btn-block' name='mark_pending' value='Mark Pending' />
														<input type='hidden' name='task_name' value='$task_name' />
													</form>
											  </div>
											</div>";
						}
						// RETURN TASK CARD
						echo $str;
					}
				}
	  	?>
		</div>
	</div>
	<!-- END TASK MANAGER DIV -->

	<br /><br />

<!-- PHP SCRIPT TO CHANGE PROFILE PIC -->
<?php

	$profile_id = $username;
	$imgSrc = "";
	$result_path = "";
	$msg = "";

	/***********************************************************
		0 - REMOVE THE TEMP IMAGE IF IT EXISTS
	***********************************************************/
	if (!isset($_POST['x']) && !isset($_FILES['image']['name']) ){
		// DELECT USERS TEMP IMAGE
		$temppath = 'assets/img/profile_pics/'.$profile_id.'_temp.jpeg';
		if (file_exists ($temppath)){ @unlink($temppath); }
	} 

	if(isset($_FILES['image']['name'])){	
	/***********************************************************
		1 - UPLOAD ORIGINAL IMAGE TO SERVER
	***********************************************************/	
		// GET NAME | SIZE | TEMP LOCATION
		$ImageName = $_FILES['image']['name'];
		$ImageSize = $_FILES['image']['size'];
		$ImageTempName = $_FILES['image']['tmp_name'];
		// GET FILE EXTENSTION
		$ImageType = @explode('/', $_FILES['image']['type']);
		$type = $ImageType[1]; // FILE TYPE	
		// SET UPLOAD DIRECTORY
		$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/assets/img/profile_pics';
		// SET FILE NAME
		$file_temp_name = $profile_id.'_original.'.md5(time()).'n'.$type; // TEMP FILE NAME
		$fullpath = $uploaddir."/".$file_temp_name; // TEMP FILE PATH
		// $PROFILE_ID.'_TEMP.'.$TYPE; // FOR THE FINAL RESIZED IMAGE
		$file_name = $profile_id.'_temp.jpeg'; 
		$fullpath_2 = $uploaddir."/".$file_name; // FOR THE FINAL RESIZED IMAGE
		// MOVE THE FILE TO CORRECT LOCATION
		$move = move_uploaded_file($ImageTempName ,$fullpath) ; 
		chmod($fullpath, 0777);  
		// CHECK FOR VALID UPLOAD
		if (!$move) { 
			die ('File didnt upload');
		} else { 
			$imgSrc= "assets/img/profile_pics/".$file_name; // THE IMAGE TO DISPLAY IN CROP AREA
			$msg= "Upload Complete!"; // MESSAGE TO PAGE
			$src = $file_name; // THE FILE NAME TO POST FROM CROPPING FORM TO THE RESIZE
		} 

	/***********************************************************
		2  - RESIZE THE IMAGE TO FIT IN CROPPING AREA
	***********************************************************/		
		// GET THE UPLOADED IMAGE SIZE
		clearstatcache();				
		$original_size = getimagesize($fullpath);
		$original_width = $original_size[0];
		$original_height = $original_size[1];	
		// SPECIFY THE NEW SIZE
		$main_width = 500; // SET THE WIDTH OF THE IMAGE
		$main_height = $original_height / ($original_width / $main_width); // SET HEIGHT IN RATIO
		// CREATE NEW IMAGE USING CORRECT PHP FUNCTION
		if($_FILES["image"]["type"] == "image/gif"){
			$src2 = imagecreatefromgif($fullpath);
		}elseif($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/pjpeg"){
			$src2 = imagecreatefromjpeg($fullpath);
		}elseif($_FILES["image"]["type"] == "image/png"){ 
			$src2 = imagecreatefrompng($fullpath);
		}else{ 
			$msg .= "There was an error uploading the file. Please upload a .jpg, .gif or .png file. <br />";
		}
		// CREATE THE NEW RESIZED IMAGE
		$main = imagecreatetruecolor($main_width,$main_height);
		imagecopyresampled($main,$src2,0, 0, 0, 0,$main_width,$main_height,$original_width,$original_height);
		// UPLOAD NEW VERSION
		$main_temp = $fullpath_2;
		imagejpeg($main, $main_temp, 90);
		chmod($main_temp,0777);
		// FREE UP MEMORY
		imagedestroy($src2);
		imagedestroy($main);
		//imagedestroy($fullpath);
		@ unlink($fullpath); // DELETE THE ORIGINAL UPLOAD
										
	}//ADD Image 	

	/***********************************************************
		3- CROPPING & CONVERTING THE IMAGE TO JPG
	***********************************************************/
	if (isset($_POST['x'])) {
		// THE FILE TYPE POSTED
		$type = $_POST['type'];	
		// THE IMAGE SRC
		$src = 'assets/img/profile_pics/'.$_POST['src'];	
		$finalname = $profile_id.md5(time());	
		
		if($type == 'jpg' || $type == 'jpeg' || $type == 'JPG' || $type == 'JPEG'){	
			// THE TARGET DIMENSIONS 150X150
			$targ_w = $targ_h = 150;
			// QUALITY OF THE OUTPUT
			$jpeg_quality = 90;
			// CREATE A CROPPED COPY OF THE IMAGE
			$img_r = imagecreatefromjpeg($src);
			$dst_r = imagecreatetruecolor( $targ_w, $targ_h );
			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
			$targ_w,$targ_h,$_POST['w'],$_POST['h']);
			// SAVE THE NEW CROPPED VERSION
			imagejpeg($dst_r, "assets/img/profile_pics/".$finalname."n.jpeg", 90); 	
				 		
		} else if ($type == 'png' || $type == 'PNG') {
			// THE TARGET DIMENSIONS 150X150
			$targ_w = $targ_h = 150;
			// QUALITY OF THE OUTPUT
			$jpeg_quality = 90;
			// CREATE A CROPPED COPY OF THE IMAGE
			$img_r = imagecreatefrompng($src);
			$dst_r = imagecreatetruecolor( $targ_w, $targ_h );		
			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
			$targ_w,$targ_h,$_POST['w'],$_POST['h']);
			// SAVE THE NEW CROPPED VERSION
			imagejpeg($dst_r, "assets/img/profile_pics/".$finalname."n.jpeg", 90); 	
							
		} else if ($type == 'gif' || $type == 'GIF') {
			// THE TARGET DIMENSIONS 150X150
			$targ_w = $targ_h = 150;
			// QUALITY OF THE OUTPUT
			$jpeg_quality = 90;
			// CREATE A CROPPED COPY OF THE IMAGE
			$img_r = imagecreatefromgif($src);
			$dst_r = imagecreatetruecolor( $targ_w, $targ_h );		
			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
			$targ_w,$targ_h,$_POST['w'],$_POST['h']);
			// SAVE THE NEW CROPPED VERSION
			imagejpeg($dst_r, "assets/img/profile_pics/".$finalname."n.jpeg", 90); 	
		}
			// FREE UP MEMORY
			imagedestroy($img_r); // FREE UP MEMORY
			imagedestroy($dst_r); // FREE UP MEMORY
			@ unlink($src); // DELETE THE ORIGINAL UPLOAD					
			
			// RETURN CROPPED IMAGE TO PAGE
			$result_path ="assets/img/profile_pics/".$finalname."n.jpeg";

			// INSERT IMAGE INTO DATABASE
			$insert_pic_query = mysqli_query($connection, "UPDATE clients SET profile_pic='$result_path' WHERE username='$profile_id'");
			header("Location: ".$profile_id);
															
	}// END IF
	?>

	<div id="Overlay" style=" width:100%; height:100%; border:0px #990000 solid; position:absolute; top:0px; left:0px; z-index:2000; display:none;"></div>

	<!-- UPLOAD NEW PROFILE PIC PANEL -->
	<div class="" id="upload-pic-panel">
		<!-- UPLOAD NEW PROFILE PIC TITLE -->
		<div class="col-md-12 text-center">
			<h2>Change Client Profile Picture</h2>
		</div>
		<br />
		<!-- UPLOAD INSTRUCTIONS AND FORM -->
		<div id="formExample">
			<!-- INSTRUCTIONS -->
			<p>Upload a new picture for the client's profile.</p>
			<p>First click the "Choose a file..." button and select an image from your device.</p>
			<p>After you have selected an image, hitting the "Submit" button will allow you the crop the image before setting it as the new profile picture.</p>
			<br />
	    <p><b> <?=$msg?> </b></p>
			<!-- UPLOAD NEW PIC FORM -->
	    <form action="" method="post" enctype="multipart/form-data">
	    	<!-- CHOOSE IMAGE BUTTON -->
        <input type="file" id="image" name="image" class="inputfile" data-multiple-caption="{count} files selected" multiple />
        <label id="uploadImageTwo" for="image" class="text-center">
					Choose a file...
					<br />
					<small><span style="color: #FFFFFF;"></span></small>
				</label>
        <br /><br />
        <!-- CROP AND SUBMIT BUTTON -->
        <input class="btn btn-success" type="submit" value="Submit" />
        <br /><br />
	    </form>
		  <!-- END UPLOAD NEW PIC FORM -->
		</div>
		<!-- END UPLOAD INSTRUCTIONS AND FORM -->

	    <?php
	    // IF AN IMAGE HAD BEEN UPLOADED DISPLAY CROPPING AREA
	    if ($imgSrc) { ?>
		    <script>
		    	$('#Overlay').show();
				$('#formExample').hide();
		    </script>

				<!-- CROPPING CONTAINER DIV -->
		    <div id="CroppingContainer">  
		    	<!-- CROPPING AREA -->
	        <div id="CroppingArea">	
            <img src="<?=$imgSrc?>" border="0" id="jcrop_target" />
	        </div>  
					<!-- MAKE PROFILE PIC BUTTON -->
	        <div id="CropImageForm" class="text-center">  
            <form action="" method="post" onsubmit="return checkCoords();">
              <input type="hidden" id="x" name="x" />
              <input type="hidden" id="y" name="y" />
              <input type="hidden" id="w" name="w" />
              <input type="hidden" id="h" name="h" />
              <input type="hidden" value="jpeg" name="type" /> <?php // $type ?> 
              <input type="hidden" value="<?=$src?>" name="src" />
              <input type="submit" class="btn btn-success" value="Make Profile Pic" />
            </form>
	        </div>
					<!-- CANCEL BUTTON -->
	        <div id="CropImageForm2" class="text-center" style="" >  
            <form action="" method="post" onsubmit="return cancelCrop($username);">
              <input type="submit" class="btn btn-danger" value="Cancel Crop" />
            </form>
	        </div>              
		    </div>
		    <!-- END CROPPING CONTAINER DIV -->
			<?php 
			} ?>
	</div>
	<!-- END UPLOAD NEW PROFILE PIC PANEL -->
	 
<?php if($result_path) { ?>
     
<img src="<?=$result_path?>" style="position:relative; width:150px; height:150px;" />
	 
<?php } ?>
 
<br /><br />

</div>
<!-- END WRAPPER DIV -->
</body>
</html>