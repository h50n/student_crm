<html>
	<head>
		


	</head>
	<body>

	<?php 
			include_once 'classes.php';
	?>
		<div id="register_form">
			<form action = "create_student.php" method = "post" >
				First Name<input type="text" name="first_name">
				Last Name<input type="text" name="last_name">
				Phone<input type="text" name="phone">
				Address<input type="text" name="text">
				E-mail<input type= "text" name="email">
				<input type = "submit">
			</form>
		</div>

		<?php 

		$first_name = $_POST["first_name"];
		$last_name	= $_POST["last_name"];	
		$phone  	= $_POST["phone"];
		$address 	= $_POST["address"];
		$email  	= $_POST["email"];	

		$database = new Database;
		$database -> connect();

		$database ->create_student($first_name, $last_name, $phone, $email, $address);

	

		//then insert these directly into the method





		?>


		<div id="validation_message">
			<!-- does this need to be initiated after the php has been triggered doe?-->
			<?php echo $validation_message; ?>
			<?php var_dump($array); ?>
			
		</div>

	</body>




</html>