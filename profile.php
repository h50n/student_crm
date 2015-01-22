<html>
	<head>
		


	</head>
	<body>



	<?php

		include_once 'classes.php';
		include_once 'includes.php';

		$database = new Database;
		$database -> connect();

		$student_id = $_GET['student_id']; 
		$database->read_student($student_id);

		$contact_details = $database->array_query;



	?>
		<h1><?php echo $contact_details["first_name"] . " " . $contact_details["last_name"] ?></h1></br>
		<div id ="contact_details">
			Student ID: <?php echo $contact_details["student_id"] ?></br></br>
			First Name: <?php echo $contact_details["first_name"] ?></br></br>
			Last Name:	<?php echo $contact_details["last_name"] ?></br></br>
			Address: 	<?php echo $contact_details["address"] ?></br></br>
			e-mail: 	<?php echo $contact_details["email"] ?></br></br>
			phone:		<?php echo $contact_details["phone"] ?></br></br>
		</div>

		<div id ="upload_image">

			<form action="upload.php" method="post" enctype="multipart/form-data">
			    Select image to upload:
			    <input type="file" name="fileToUpload" id="fileToUpload">
			    <input type="submit" value="Upload Image" name="submit">
			    <input type ="hidden" name = "student_id" value="<?php echo $student_id ?>" >
			</form>
		</div>

		<?php 
			$first_name = $contact_details["first_name"];
			$last_name 	= $contact_details["last_name"];
			//$student_id = $contact_details["student_id"];

		?>
		<div id="show_image">
			

			<?php $profile_picture = $database->show_picture($student_id); 
			
			if(isset($profile_picture)){

				echo "<img src='uploads/{$profile_picture}'>";
			}

			?>
		</div>

		<div id ="buttons">
			<!-- call button and delete buttons / links will go here-->
				<?php echo "<a href='delete.php?student_id={$student_id}'>Delete Student</a></br></br>" ; ?>
			<!-- a link that goes to the delete page conting the id variable-->
		</div>

		<div id = "add_note">
		           <!-- comment sectiion-->
		         Add a comment!</br></br>    
	           	<form action = <?php echo "profile.php?student_id={$student_id}" ?> method = "post" id="note_form" >
					<input type= "hidden" name="student_id" value = "<?php echo $student_id; ?>" >
					User:</br><input type= "text" name="user" ></br>
					Note:</br><textarea rows="4" cols="50" name="note" form="note_form"></textarea>
					</br><input type = "submit"></br></br>
				</form>

                 <?php
                 		//all these bits are going to go into the query

                 if(isset($_POST['note'])) {

                 	//make validation such thats all fields must be entered to submit

		             $note 			= $_POST['note'];
		             $student_id 	= $_POST['student_id'];
		             $user 			= $_POST['user'];
		             $database->add_note($student_id,$note,$user);

             	}
                 

                  	$student_id 	= $_GET['student_id'];

       

                 $result = $database->show_notes($student_id);

                 if($result != null){

               		while($row = mysqli_fetch_array($result)) {

               			$note 			= $row['note'];
               			$user 			= $row['user'];
               			$student_id 	= $row['student_id'];
               			$date_created 	= $row['date_created'];
               			$date_created 	= $row['date_created'];
               			$student_note_id = $row['student_note_id'];


               			echo $user . " said on " . $date_created . ": ";
               			echo "</br></br>";
               			echo $note ;
               			echo "</br></br>";
               			echo "<a href = 'delete_note.php?student_note_id={$student_note_id}&student_id={$student_id}'>Delete</a>";
               			echo "</br></br>";

               		}
               	}

                 ?>
		</div>

		<div id="validation_message">
			<!-- does this need to be initiated after the php has been triggered doe?-->
			
			<?php if(isset($validation_message)){ echo $validation_message; } ?>

	
			
		</div>

	</body>




</html>




