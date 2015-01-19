<html>
	<head>
		


	</head>
	<body>

	<?php 
			include_once 'classes.php';
	?>
		<div id="register_form">
			<form action = "register.php" method = "post" >
				First Name<input type="text" name="first_name">
				Last Name<input type="text" name="last_name">
				Username<input type="text" name="username">
				Password<input type="password" name="password">
				E-mail<input type= "text" name="email">
				<input type = "submit">
			</form>
		</div>

		<?php 

		$first_name  = $_POST["first_name"];
		$last_name  = $_POST["last_name"];	
		$password  = $_POST["password"];
		$email  = $_POST["email"];	

		$database = new Database;
		$database -> connect();

		$database ->register_user($username, $first_name, $last_name, $password, $email);

	

		//then insert these directly into the method





		?>


		<div id="validation_message">
			<!-- does this need to be initiated after the php has been triggered doe?-->
			<?php echo $validation_message; ?>
			<?php var_dump($array); ?>
			
		</div>

	</body>




</html>