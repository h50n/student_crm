<html>
	<head>
		


	</head>
	<body>
		<?php 
			
			include_once 'classes.php';
			include_once 'includes.php';
			
			$database = new Database;
			$database -> connect();
			$result = $database->student_table();

			?>

		<div class="table-responsive" id = "table">

		<div class="container">
            <div class="row">
                <h3>Students</h3>
            </div>
            <div class="row">
           	<?php echo "<a href='create_student.php'>Add new student</a></br></br>" ?>
                <table class="table">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Phone</th>
                      <th>E-mail</th>
                      <th>Address</th>
                      <th>Date Created</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                
		             while($row = mysqli_fetch_array($result)) {

		             	// comment gets the student id from here
		             	$student_id = 	$row["student_id"];

		             	$first_name = 	$row["first_name"];
		             	$last_name 	= 	$row["last_name"];
		             	$phone 		= 	$row["phone"];
		             	$email 		= 	$row["email"];
		             	$address 	= 	$row["address"];

	                  	$read 		= 	"<a href= 'profile.php?student_id={$student_id}' >Read</a>";
	                  	$delete 	= 	"<a href= 'delete.php?student_id={$student_id}' >Delete</a>" ;
	                  	$update		=	"<a href= 'update.php?student_id={$student_id}&first_name={$first_name}&last_name={$last_name}&phone={$phone}&email={$email}&address={$address}' >Update</a>" ;
                  	 	
		                    echo '<tr>';
		                    echo '<td>'. $row["first_name"] . '</td>';
		                    echo '<td>'. $row["last_name"] . '</td>';
		                    echo '<td>'. $row["phone"] . '</td>';
		                    echo '<td>'. $row["email"] . '</td>';
		                    echo '<td>'. $row["address"] . '</td>';
		       				echo '<td>'. $row["date_created"] . '</td>';
		       				echo '<td>' . ' ' . $read . ' ' . $update .' ' . $delete . ' ' . '</td>';
		                    echo '</tr>';
		           				}
							?>
		              </tbody>
           			</table>
        		</div>
    			</div> <!-- /container -->
				<?php

		           echo "</br></br>";	
		           echo "<a href='create_student.php'>Add new student</a>";
		           ?>

						
		</div>

		<div id = "pagination">
			
					<!-- save this till I have sorted out the main stuff -->
		</div>

		<div id="validation_message">
			<!-- does this need to be initiated after the php has been triggered doe?-->
			
			<?php //echo $validation_message ?>
			
		</div>

	</body>




</html>