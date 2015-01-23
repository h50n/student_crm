

<?php 

	class Database {
		//do database connneciton here

	public $db_name = "student_crm";
	public $db_host = "localhost";
	public $db_username = "root";
	public $db_password = "";
	//public $connection = mysqli_connect("localhost", "root" , "", "student_crm");
	public $connection = null;

			//make properties for all of the fields that will be inputed from the html
				//maybe I don't need to list them all here actually and I can just insert them in the () from the obejct call
			// set all property defaults as null and they will be set by the html
	
	public $first_name = "biggie";
	public $password = "pac";
	public $last_name = "smalls";
	public $login_status = null;


	public $validation_message = null;
	public $profile = null;
	public $array_query = null;
	public $user_id = null;
	public $success = null;
	public $errors	= null;

		//put all variables into brackets and insert them from the html
	public function connect() {

		//$this->connection = mysqli_connect($this->$db_host, $this->db_username , $this->db_password, $this->db_name);
		//return $this->connection;
		//$this->connection = mysqli_connect("localhost", "root" , "", "student_crm");
		$this->connection = mysqli_connect($this->db_host, $this->db_username , $this->db_password, $this->db_name);

	}



	public function test($first_name, $last_name ) {

		//mysqli_query($this->connection, "INSERT INTO `student_crm`.`users` (`first_name`, `last_name`, `password`, `email`) VALUES ( 'changes', 'tupac', 'Tes', NULL)");
		mysqli_query($this->connection, "INSERT INTO `student_crm`.`users` (`first_name`, `last_name`, `password`, `email`) VALUES ( '{$first_name}', '{$last_name}', 'Tes', NULL)");
		//mark out each query here
			//create the sql in sequel pro
			//conevert to php
			// insert here	

		}
	

	//name
	//variables
	//sql

		//all these variables will be passed throughwith a post or get request

	public function login($username, $password) {
		//check to see if the combination of username and password exist in the database
			//sort out the encryption stuff thoug

			//1 select query
		$password = md5($password);

		//if array = 0 reload
			//if arra = >0 header to page and staty session
		$login_query = mysqli_query($this->connection, "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");

		//$this->login_status = mysqli_affected_rows($this->connection);
//mysqli array ting to get the user id
		$this->array_query = mysqli_fetch_array($login_query);


		$fetch_array = mysqli_fetch_array($login_query);

		$this->user_id = $fetch_array["user_id"];
			//somehow this needs to get the user id value here 
			//in the class and not in the actual login.php
			// i could try and overwrite the class from inside the loging.php
			// google how to do this


		if (mysqli_affected_rows($this->connection)  >= 1) {
			//$this->login_status = "it worked!";
			//create session 
			//redirect to profile page
			//header("Location: profile.php/{$this->user_id}");
				//insert pofile as a get request take as the id number form the db
			$this->login_status = "it did work!";
		} else {
			$this->login_status = "it didn't work!";
			// redirect back to this page
			// show error message
		}



		// control statement that forwards to profile page and creates session if match is found

			//reloads page if no match is found
				//later add some message that wil let the user know

	}


	public function upload_picture($student_id, $filename) {
	 //add psuedo code of what each function needs to do
		//make sql version of it

		//creates the end of the image url for the picture to the corresponding student id
		$this->clean_input($filename);

		mysqli_query($this->connection,"INSERT INTO `student_images` (`student_id`, `file_location`)
VALUES
	( '{$student_id}', '{$filename}')");

	if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			// head back to the profile page of the student id;
		
		} else {
		
			echo "this didn't work";
			echo "<a href='profile.php?student_id={$student_id}'> Click here to go back to the profile page</a>";
		
		}
		
			//sort out the code to take the filename and add
			//it to the db


	}

	public function show_picture($student_id){


		//$login_query = mysqli_query($this->connection, "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");

		$query = mysqli_query($this->connection , "SELECT * FROM `student_images` WHERE `student_id` = '{$student_id}'");

		$fetch_array = mysqli_fetch_array($query);

		//$this->user_id = $fetch_array["user_id"];

		//var_dump($fetch_array);
		//var_dump($fetch_array["file_location"]);

		$file_location = $fetch_array["file_location"];

		return $file_location;

	}



	public function edit_picture($student_image_id) {
		//
		//updates the end of the image url for the picture to the corresponding student image id
		mysqli_query($this->connection,"" );

		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			echo "yeah this workd";
		
		} else {
		
			echo "nah this didn't work";
		
		}
	}


	public function delete_picture($student_image_id) {

		//deletes the entru of the image url for the picture to the corresponding student image id
		mysqli_query($this->connection,"" );


		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			echo "yeah this workd";
		
		} else {
		
			echo "nah this didn't work";
		
		}
	}



	public function clean_input($string){

		$string = trim($string);
		$string = stripslashes($string);
		$string = htmlspecialchars($string);

		// $string = trim($string)->stripslashes($string)->htmlspecialchars($string);




		return $string;

	}



	public function add_note($student_id,$note,$user) {

		$user 		= ucwords($user);
		// escape strings	
		//$student_id = mysqli_real_escape_string($this->connection, $student_id);
		//$note 		= mysqli_real_escape_string($this->connection, $note);
		//$user 		= mysqli_real_escape_string($this->connection, $user);

		$student_id = $this->clean_input($student_id);
		$note 		= $this->clean_input($note);
		$user 		= $this->clean_input($user);
		// creates a note for the corresponing student id
		mysqli_query($this->connection, "INSERT INTO `student_notes` (`student_id`, `note`, `user`) VALUES ( '{$student_id}', '{$note}', '{$user}')" );
		//is gonna be a join query

		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			return true;
		
		} 
	}


	public function delete_note($note_id,$student_id) {
		// dletes a note for the corresponidng student note id
		mysqli_query($this->connection,"DELETE FROM `student_notes` WHERE `student_note_id` IN ('{$note_id}')
" );


		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			header("Location: profile.php?student_id={$student_id}");
		
		} else {
		
			echo "Sorry, we couldn't delete your note";
		   	echo "<a href='profile.php?student_id={$student_id}'>Go back to students page</a>";
		
		}

		
	}


	public function show_notes($student_id) {

		// creates a note for the corresponing student id
			$query = mysqli_query($this->connection, "SELECT * FROM student_notes WHERE `student_id` = '{$student_id}'");

		//$this->array_query = mysqli_fetch_array($query);
			//$array_query2 = mysqli_fetch_array($query, MYSQLI_ASSOC);

			if (mysqli_affected_rows($this->connection)  >= 1 ) {

			//return $array_query2;
				return $query;
		
			} 
	}


	public function create_student($first_name,$last_name,$phone, $email, $address) {
		// reads all the details for a student of the corresponding student id

		// stuff we need to do before it gets inserted
		// uppear case nouns

		$first_name = ucwords($first_name);
		$last_name 	= ucwords($last_name);
		$address	= ucwords($address);


		// escape strings	
		$first_name = $this->clean_input($first_name);
		$last_name	= $this->clean_input($last_name);
		$phone		= $this->clean_input($phone);
		$email		= $this->clean_input($email);
		$address	= $this->clean_input($address);

		$query = mysqli_query($this->connection, "INSERT INTO `student_crm`.`students` (`first_name`, `last_name`, `phone`, `email`, `address`) VALUES ('{$first_name}', '{$last_name}', '{$phone}', '{$email}', '{$address}') " );

			//$this->array_query = mysqli_fetch_array($query);

		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			header("Location: students.php");
		
		}
	}


	 public function delete_student($student_id) {
	  // reads all the details for a student of the corresponding student id
	  //$query = mysqli_query($this->connection, "DELETE `student_crm`.`students` WHERE `first_name` ='".$first_name."'" );
		$query = mysqli_query($this->connection, "DELETE FROM `students` WHERE student_id='{$student_id}'" );
	   //$this->array_query = mysqli_fetch_array($query);

		  if (mysqli_affected_rows($this->connection)  >= 1 ) {
		   
		   header("Location: students.php");
		  
		  } else {
		  
		   echo "Sorry we were unable to delete this student.</br></br></br>";
		   echo "<a href='students.php'>Go back to students page</a>";
		  
		  }
	  
	 }




	public function student_table() {
		// reads all the details for a student of the corresponding student id

		$query = mysqli_query($this->connection, "SELECT * FROM students");

		//$this->array_query = mysqli_fetch_array($query);
		$array_query2 = mysqli_fetch_array($query, MYSQLI_ASSOC);

		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			//echo "yeah this workd";

			//return $array_query2;
			return $query;
		
		}
		
	}





	public function read_student($student_id) {
		// reads all the details for a student of the corresponding student id

		$query = mysqli_query($this->connection,"SELECT * FROM students WHERE student_id = '{$student_id}'" );

		$this->array_query = mysqli_fetch_array($query);

		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			return true;

		
		} else {
		
			return false;
		
		}
		
	}


	public function update_student($student_id, $first_name, $last_name, $phone, $email, $address) {
			//somehow intergrate a read query that sets the default to the exiting becaus
				// it may overwrite it will bullshit
		//updates all the details for each of the variables
		mysqli_query($this->connection,"UPDATE `students` SET `first_name` = '{$first_name}', `last_name` = '{$last_name}', `email` = '{$email}', `address` = '{$address}' WHERE `student_id` = {$student_id}");


		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			echo "yeah this workd";
		
		} else {
		
			echo "nah this didn't work";
		
		}
	}


	public function register_user($username, $first_name, $last_name, $password, $email) {
		// addd the details of a new user to the user database;
		
		// simple SQL insert query 



		$username 	= $this->clean_input($username);
		$first_name = $this->clean_input($first_name);
		$last_name 	= $this->clean_input($last_name);
		$password 	= $this->clean_input($password);
		$password 	= md5($password);
		$email 		= $this->clean_input($email);

		mysqli_query($this->connection,"INSERT INTO `student_crm`.`users` (`username`,`first_name`, `last_name`, `password`, `email`) VALUES ( '{$username}','{$first_name}', '{$last_name}', '{$password}', '{$email}')" );

		//header to login page
		if (mysqli_affected_rows($this->connection)  >= 1 ) {

			// header to login page
				$this->success = "this was successful";

				return  $this->success;
			// validation message says, thank you for sining up, now log in!!!
		} else {

			// releads registration page wiht 
			//validation messge that says, this didn't work please try again

		
			echo "nah this didn't work";
		
		}
	}

	// do these ones later	

	public function pagination() {

		
	}


	public function start_session() {

		
	}


	public function end_session() {

		
	}

	public function create_student_validation($first_name, $last_name, $phone, $email, $address) {

		// store all of the flopped variables inside of an array
		$errors = array();
		$success = true;

		//when empty
		if (empty($first_name)){
			$errors[] = "please enter your first name";
			$success = false;
		}

		if (empty($last_name)){
			$errors[] = "please enter your last name";
			$success = false;
		}

		if (empty($phone)){
			$errors[] = "please enter your phone number";
			$success = false;
		}

		if (empty($email)){
			$errors[] = "please enter your email address";
			$success = false;
		}

		if (empty($address)){
			$errors[] = "please enter you address";
			$success = false;
		}


		// correct format name
		if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
  			$errors[] = "please check your first name only letters and white space allowed";
  			$success = false; 
		}

		if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
  			$errors[] = "please check your last name only letters and white space allowed";
  			$success = false; 
		}
		//correct format phone
			//sort this one out later



		//correct format email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 			 $errors[] = "please check your email address, invalid email format";
 			 $success = false; 
		}

		if ($success == true ){

			return true;	

		} else {

			return $this->errors;

		}
	}

}


	
	
?>