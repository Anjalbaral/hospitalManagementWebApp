<?php
	$error = array();
	//checking submission
		include 'includeConnectDatabase.php' ;
	//including new report statement		
		include 'includeReportTable.php';
	//Close connection
		mysqli_close($connection);
	echo "</body>";
	echo "</html>";	
?>