<html>
	<head>
		


	</head>
	<body>

	<?php 
			include_once 'classes.php';
	?>
		<h1>Register to Become a User</h1>

		<div id="register_form">
			<form action = "register.php" method = "post" >
				First Name<input type="text" name="first_name"></br>
				Last Name<input type="text" name="last_name"></br>
				Username<input type="text" name="username"></br>
				Password<input type="password" name="password"></br>
				E-mail<input type= "text" name="email"></br>
				<input type = "submit" value = "login">
			</form>
		</div>

		<?php 

		if (isset($_POST["first_name"])) {

		$first_name = $_POST["first_name"];
		$last_name	= $_POST["last_name"];	
		$password  	= $_POST["password"];
		$email  	= $_POST["email"];

		$database = new Database;
		$database -> connect();
		$database ->register_user($username, $first_name, $last_name, $password, $email);

		}

		//then insert these directly into the method





		?>


		<div id="validation_message">
			<!-- does this need to be initiated after the php has been triggered doe?-->
			<?php //echo $validation_message; ?>

			
		</div>

	</body>




</html>