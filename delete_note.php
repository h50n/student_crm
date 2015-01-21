<html>
	<head>
		


	</head>
	<body>



	<?php

		include_once 'classes.php';

		//$student_note_id = $_GET["student_note_id"];
		$student_note_id 	= $_GET['student_note_id'];
		$student_id 		= $_GET['student_id'];
		
		$database = new Database;
		$database -> connect();
		$delete_note = $database->delete_note($student_note_id,$student_id);


	?>

		

		<div id="validation_message">
			<!-- does this need to be initiated after the php has been triggered doe?-->
			
			<?php //echo $validation_message ?>
			
		</div>

	</body>




</html>




<?php



?>