<html>
	<head>
		


	</head>
	<body>

	<?php 
			include_once 'classes.php';
	?>

		<h1>Create a New Student</h1>
		</br>

		<div id="register_form">
			<form action = "create_student.php" method = "post" >
				First Name <input type="text" name="first_name"></br>
				Last Name <input type="text" name="last_name"></br>
				Phone <input type="text" name="phone"></br>
				Address <input type="text" name="address"></br>
				E-mail <input type= "text" name="email"></br>
				<input type = "submit">
			</form>
		</div>


		<?php 

		if (isset($_POST["first_name"])) {
			
			$first_name = 	$_POST["first_name"];
			$last_name	= 	$_POST["last_name"];	
			$phone  	= 	$_POST["phone"];
			$address 	= 	$_POST["address"];
			$email  	= 	$_POST["email"];

			$database 	=	new Database;
			$database 	-> 	connect();
			$database 	-> 	create_student($first_name, $last_name, $phone, $email, $address);	
		}
	
		?>


		<div id="validation_message">
			<!-- does this need to be initiated after the php has been triggered doe?-->
			<?php if (isset($validation_message)) { echo $validation_message; } ?>

			
		</div>

	</body>




</html>