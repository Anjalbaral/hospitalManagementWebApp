<?php
	$error = array();
	//checking submission
		include 'includeConnectDatabase.php' ;
	//including new report statement		
		include 'includePatientTable(1).php';
	//Close connection
		mysqli_close($connection);
	echo "</body>";
	echo "</html>";	
?>