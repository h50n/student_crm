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
			
		</div>

		<div id = "pagination">
			

		</div>

		<div id="validation_message">
			<!-- does this need to be initiated after the php has been triggered doe?-->
			
			<?php echo $validation_message ?>
			
		</div>

	</body>




</html>