

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
		;

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


	public function upload_picture($student_id) {
	 //add psuedo code of what each function needs to do
		//make sql version of it

		//creates the end of the image url for the picture to the corresponding student id
		
		mysqli_query($this->connection,"" );

			//fix this up	
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}



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

	public function add_note($student_id) {

		// creates a note for the corresponing student id
		mysqli_query($this->connection,"" );
		//is gonna be a join query
		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			echo "yeah this workd";
		
		} else {
		
			echo "nah this didn't work";
		
		}
	}

	public function delete_note($student_note_id) {
		// dletes a note for the corresponidng student note id
		mysqli_query($this->connection,"" );


		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			echo "yeah this workd";
		
		} else {
		
			echo "nah this didn't work";
		
		}

		
	}


	public function create_student($first_name,$last_name,$phone, $email, $address) {
		// reads all the details for a student of the corresponding student id
		$query = mysqli_query($this->connection, "INSERT INTO `student_crm`.`students` (`first_name`, `last_name`, `phone`, `email`, `address`) VALUES ('{$first_name}', '{$last_name}', '{$phone}', '{$email}', '{$address}') " );

			//$this->array_query = mysqli_fetch_array($query);

		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			echo "yeah this workd";
		
		} else {
		
			echo "nah this didn't work";
		
		}
		
	}


	 public function delete_student($student_id) {
	  // reads all the details for a student of the corresponding student id
	  //$query = mysqli_query($this->connection, "DELETE `student_crm`.`students` WHERE `first_name` ='".$first_name."'" );
		$query = mysqli_query($this->connection, "DELETE FROM `students` WHERE student_id='{$student_id}'" );
	   //$this->array_query = mysqli_fetch_array($query);

		  if (mysqli_affected_rows($this->connection)  >= 1 ) {
		   
		   echo "yeah this workd";
		  
		  } else {
		  
		   echo "nah this didn't work";
		  
		  }
	  
	 }



/*	public function delete_student() {
		// reads all the details for a student of the corresponding student id
		//$first = "DELETE FROM students WHERE student_id = " . $student_id;

		$query2 = "DELETE FROM students WHERE first_name='Mark'";
 ;

		//echo $query2;

		//mysqli_query($this->connection, "DELETE FROM students WHERE student_id= {$student_id}");

		mysqli_query($this->connection, $query2);
		//$real_query = "DELETE FROM students WHERE student_id='{$student_id}'";
		//$query =  "DELETE FROM students WHERE student_id='{$student_id}'";
		//$query = mysqli_query($this->connection,"SELECT * FROM students WHERE student_id = '{$student_id}'" );

		//echo "var_dump: ";
			//var_dump($real_query);
		//$data = mysqli_fetch_array($query);

		//var_dump($data);


		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			echo "yeah this workd";
		
		} else {
		
			echo "nah this didn't work";
		
		}
		
	}*/


	public function student_table() {
		// reads all the details for a student of the corresponding student id

		$query = mysqli_query($this->connection, "SELECT * FROM students");

		//$this->array_query = mysqli_fetch_array($query);
		$array_query2 = mysqli_fetch_array($query, MYSQLI_ASSOC);

		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			//echo "yeah this workd";

			return $array_query2;
		
		} else {
		
			echo "nah this didn't work";
		
		}
		
	}





	public function read_student($student_id) {
		// reads all the details for a student of the corresponding student id

		$query = mysqli_query($this->connection,"SELECT * FROM students WHERE student_id = '{$student_id}'" );

		$this->array_query = mysqli_fetch_array($query);

		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			echo "yeah this workd";

		
		} else {
		
			echo "nah this didn't work";
		
		}
		
	}


	public function update_student($student_id, $first_name, $last_name, $phone, $email, $address) {
			//somehow intergrate a read query that sets the default to the exiting becaus
				// it may overwrite it will bullshit
		//updates all the details for each of the variables
		mysqli_query($this->connection,"UPDATE `students` SET `first_name` = '{$first_name}', `last_name` = '{$last_name}', `email` = '{$email}', `address` = '{$address}' WHERE `student_id` = '{$student_id}';");


		if (mysqli_affected_rows($this->connection)  >= 1 ) {
			
			echo "yeah this workd";
		
		} else {
		
			echo "nah this didn't work";
		
		}
	}


	public function register_user($username, $first_name, $last_name, $password, $email) {
		// addd the details of a new user to the user database;
		
		// simple SQL insert query
		mysqli_query($this->connection,"INSERT INTO `student_crm`.`users` (`username`,`first_name`, `last_name`, `password`, `email`) VALUES ( '{$user_name}','{$first_name}', '{$last_name}', '{$password}', '{$email}')" );

		//header to login page
		if (mysqli_affected_rows($this->connection)  >= 1 ) {

			// header to login page
				echo "yeah this workd";
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

}


	
	
?>