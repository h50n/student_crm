<html>
	<head>
		


	</head>
	<body>
		<?php 
			
			$student_id = $_GET['id'];
			//$first_name = $_GET['first_name'];
			//$last_name = $_GET['last_name'];

			//var_dump($student_id);

			include_once 'classes.php';
			$database = new Database;
			$database -> connect();

			//$student_id = 17;
			$database -> delete_student($student_id);

			$db_name = "student_crm";
			$db_host = "localhost";
			$db_username = "root";
			$db_password = "";

		

		//$this->connection = mysqli_connect($this->$db_host, $this->db_username , $this->db_password, $this->db_name);
		//return $this->connection;
		//$this->connection = mysqli_connect("localhost", "root" , "", "student_crm");
		//$connection = mysqli_connect($db_host, $db_username , $db_password, $db_name);


		//$query2 = "DELETE FROM `student_crm` . `students` WHERE first_name='Mark'";

		//echo $query2;

		//mysqli_query($this->connection, "DELETE FROM students WHERE student_id= {$student_id}");

		//mysqli_query($connection, $query2);

			//var_dump($database -> delete_student($student_id));

			//put code to delete student

			// redirect to profile page or something

			// enter the id into the object via a variable

		?>	

		

		<div id="validation_message">
			<!-- does this need to be initiated after the php has been triggered doe?-->
			
			<?php echo $validation_message ?>
			
		</div>

	</body>




</html>