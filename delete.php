<html>
	<head>
		


	</head>
	<body>
		<?php 
			include_once 'classes.php';

			$student_id = $_GET['student_id'];
			$database = new Database;
			$database -> connect();
			$database -> delete_student($student_id);

		
		?>	

		

		<div id="validation_message">
			<!-- does this need to be initiated after the php has been triggered doe?-->
			
			<?php //echo $validation_message ?>
			
		</div>

	</body>




</html>