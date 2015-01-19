<html>
	<head>
		


	</head>
	<body>
	<?php

		include_once 'classes.php';
		$test_submit = new Database;
		$test_submit -> connect();


	?>
		<div id="login_form">
			<form action = "login.php" method = "post" >
				Username<input type="text" name="username">
				Password<input type= "password" name="password">
				<input type = "submit">
			</form>

			<a href="signup.php"> Sign up</a>
			<a href="forgot.php"> Forgot password?</a>
		</div>

			<?php

				$username = $_POST["username"];
				$password = $_POST["password"];

				echo "</br></br></br>";
				var_dump($username);
				var_dump($password);

				// test with test method

				$test_submit -> login($username, $password);
				echo $test_submit ->login_status;

				//call login instantation

				echo "hello World </br></br>";

			?>

		<div id="validation_message">
			<!-- does this need to be initiated after the php has been triggered doe?-->
			<?php echo $test_submit->validation_message; ?></div> 
			<?php 

				$new_variable = $test_submit->array_query;

				var_dump($new_variable);
				 echo "</br></br></br>";

				var_dump($test_submit->user_id) ;
				echo "</br></br></br>";
				var_dump($new_variable["user_id"]);

				//extract the id from the database and put it into the login page header
					// save it as a variable somewhere
					// insert that variable in the header string
					//


			?>

		</div>

	</body>




</html>





<?php 




//save variables into object
	// add is set control statement to make i only submit on submit button click

// $username = $_POST["username"];
// $password = $_POST["password"];

// echo "</br></br></br>";
// var_dump($username);
// var_dump($password);

// // test with test method

// $test_submit -> login($username, $password);
// echo $test_submit ->login_status;

// //call login instantation

// echo "hello World </br></br>";

	//include_once 'classes.php';

//include_once 'classes.php';

//$connect = new connection();

//$connect->make_query();

	// $db_name = "student_crm";
	// $db_host = "localhost";
	// $db_username = "root";
	// $db_password = "";
	
	//$connection = mysqli_connect($db_host, $db_username , $db_password, $db_name);

	//select db
		//$db = mysqli_select_db($connection, $db_name);
			//add db stuff

	//insert test data query
		//mysqli query
		//mysqli_query($connection, "INSERT INTO `student_crm`.`users` (`first_name`, `last_name`, `password`, `email`) VALUES ( 'Test', 'Test 2', 'Tes', NULL)");
			//insert into users

	//close connection

		// echo "querying";

		// $testing = new Database;

		 //$testing->connect();
		 //$testing->test();



?>