<html>
	<head>
		


	</head>
	<body>
		<?php 
			
			include_once 'classes.php';
			$database = new Database;
			$database -> connect();

		?>	
		<p>
			Enter your email address and we will send you your password.
		</p>

		<div id="forgot_form">	

			<form action = "forgot.php" method = "post" >
				email<input type="text" name="email">
				<input type = "submit">
			</form>

			<a href="register.php"> Sign up</a>
			<a href="forgot.php"> Forgot password?</a>

		</div>
		<div id="validation_message">
			<!-- does this need to be initiated after the php has been triggered doe?-->
			
			<?php echo $validation_message ?>
			
		</div>

	</body>




</html>