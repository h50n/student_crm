<html>
	<head>
		


	</head>
	<body>

	<?php 
			include_once 'classes.php';
			include_once 'includes.php';
	?>

		<h1>Create a New Student</h1>
		</br>

		<div id="register_form" class="form-inline">
			<form action = "create_student.php" method = "post" >
				First Name <input type="text" name="first_name" class="form-control" placeholder="First Name"></br>
				Last Name <input type="text" name="last_name" class="form-control"placeholder="Last Name"></br>
				Phone <input type="text" name="phone"  class="form-control" placeholder="Phone"></br>
				Address <input type="text" name="address" class="form-control" placeholder="Address"></br>
				E-mail <input type= "text" name="email" class="form-control" placeholder="E-Mail"></br>
				<input type = "submit" class = "btn btn-default">
			</form>
		</div>


		<?php 

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			$first_name = 	$_POST["first_name"];
			$last_name	= 	$_POST["last_name"];	
			$phone  	= 	$_POST["phone"];
			$address 	= 	$_POST["address"];
			$email  	= 	$_POST["email"];

			$database 	=	new Database;
			$database 	-> 	connect();
			$database 	->	create_student_validation($first_name, $last_name, $phone, $email, $address);

			// this should only run if all things are correct

			if ($database->create_student_validation($first_name, $last_name, $phone, $email, $address) == false){
				
				$validation_message = $database->create_student_validation($first_name, $last_name, $phone, $email, $address);

			} else {

				$database -> create_student($first_name, $last_name, $phone, $email, $address);
			}

			// if true do the normal query


			//if false run the loop to echo the errors into validation message	
		}
	
		?>


		<div id="validation_message">
			<!-- does this need to be initiated after the php has been triggered doe?-->
			<?php if (isset($validation_message)) { 
					var_dump($validation_message);
					//make while loop echo out all the contents of the error

						while ($row = $validation_message) {
							var_dump($row);
							
						}


				} ?>

			
		</div>

	</body>




</html>