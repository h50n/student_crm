<html>
	<head>
		



	</head>
	<body>

	<?php 
			include_once 'classes.php';
			include_once 'includes.php';
	?>
		<h1>Register to Become a User</h1>

		<div id="register_form" class="form-inline">
			<form action = "register.php" method = "post" >
				First Name <input type="text" name="first_name" class="form-control" placeholder="First Name"></br>
				Last Name <input type="text" name="last_name" class="form-control" placeholder="Last Name"></br>
				Username <input type="text" name="username" class="form-control" placeholder="Username"></br>
				Password <input type="password" name="password" class="form-control" placeholder="Password"></br>
				E-mail <input type= "text" name="email" class="form-control" placeholder="E-mail"></br>
				<input type = "submit" value = "login" class="btn btn-defult">
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