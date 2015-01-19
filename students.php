<html>
	<head>
		


	</head>
	<body>
		<?php 
			
			include_once 'classes.php';
			$database = new Database;
			$database -> connect();

		?>	

		<div id = "table">

				<!--update link in table will echo the data of the student via get into the update, delete, etc pages-->
				<!-- it will dynamically create the links -->
				<?


				//$database->student_table();
				//$student_table = $database->array_query;

				$data = $database->student_table();

		/*		
				printf("%s (%s)\n",$row['first_name'],$row['last_name']);

				$test_array = array(
					array('mark','runner' , '100m'),
					array('rhian','student' , 'science'),
					array('chris','grinder' , 'grindermania'),
					);

				var_dump($test_array);

				echo "</br></br></br></br>";
*/
				var_dump($data);


				// foreach ($data as $row) {
    //                 echo '<tr>';
    //                 echo '<td>'. $row['first_name'] . '</td>';
    //                 echo '<td>'. $row['last_name'] . '</td>';
    //                 echo '</tr>';
    //        }
?>


<div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Mobile Number</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

		             foreach ($database->student_table() as $row) {
		                    echo '<tr>';
		                    echo '<td>'. $row['last_name'] . '</td>';
		                    echo '<td>'. $row['first_name'] . '</td>';
		                    echo '<td>'. $row['phone'] . '</td>';
		                    echo '</tr>';
		           }
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
<?php



				// $query = "SELECT * FROM example"; 
	 
				// $result = mysql_query($query) or die(mysql_error());


				/// while($row = mysql_fetch_array($result)){
				// 		echo $row['name']. " - ". $row['age'];
				// 		echo "<br />";
				// 		}				

/*
			while ($row = $database->student_table()) {
					echo $row['first_name'] . "   ";
					echo $row['last_name'] . "   ";
				}*/
				?>
						
		</div>

		<div id = "pagination">
			
					<!-- save this till I have sorted out the main stuff -->
		</div>

		<div id="validation_message">
			<!-- does this need to be initiated after the php has been triggered doe?-->
			
			<?php echo $validation_message ?>
			
		</div>

	</body>




</html>