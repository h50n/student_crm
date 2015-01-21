<html>
	<head>
		


	</head>
	<body>
		<?php 
			
			include_once 'classes.php';
			$database = new Database;
			$database -> connect();

			//variables from profile page
			$student_id = $_GET['student_id'];
			$first_name = $_GET['first_name'];
			$last_name 	= $_GET['last_name'];
			$phone 		= $_GET['phone'];
			$email 		= $_GET['email'];
			$address 	= $_GET['address'];
			//these will then be inderted into the forom under value I think



			//variables from this page

					//form goes here

			?> 


				<div id="update_form">
					<form action = "update.php" method = "post" >
						First Name<input type="text" name="first_name_updated" value = <?php echo "{$first_name}" ?> >
						Last Name<input type="text" name="last_name_updated" value = <?php echo "{$last_name}" ?> >
						Phone<input type="text" name="phone_updated" value = <?php echo "{$phone}" ?> >
						Address<input type="text" name="address_updated" value = <?php echo "{$address}" ?> >
						E-mail<input type= "text" name="email_updated" value = <?php echo "{$email}" ?> >
						<input type= "hidden" name="student_id_updated" value = <?php echo "{$student_id}" ?> >
					
						<input type = "submit">
					</form>
				</div>

			<?

			// do something to make this only trigger when update form has been submitted


			var_dump($_POST['student_id_updated']);

			if (isset($_POST['student_id_updated'])){

				$student_id = $_POST['first_name_updated'];
				$first_name = $_POST['last_name_updated'];
				$last_name 	= $_POST['phone_updated'];
				$phone 		= $_POST['address_updated'];
				$email 		= $_POST['email_updated'];
				$address 	= $_POST['student_id_updated'];

					echo "it is set!!";

				$database->update_student($student_id, $first_name, $last_name, $phone, $email, $address);

			}
			// make a form prepopulated with the data from profile to php

			// allow the user to add the new detail

			// the new detials will go in to the 1st part of the query

			// old details into second part of the query
			?>	



			<!-- is going to get the update data from the profile page -->

			<!-- does this need to be initiated after the php has been triggered doe?-->
			
			<?php echo $validation_message ?>
			
		</div>

	</body>




</html>