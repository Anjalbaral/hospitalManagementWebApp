<?php
	include 'basicHtml.html';
	$error = array();
	//checking submission
		include 'includeConnectDatabase.php' ;
	//including new report statement		
		include 'includeStaffTable.php';
	//Close connection
		mysqli_close($connection);
	echo "</body>";
	echo "</html>";	
?>