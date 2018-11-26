<?php
	ob_start();
	session_start();
	$error = array();
//checking submission
	//var_dump($_POST["submit"]);
	if(isset($_POST["submit"])){
		include 'includeConnectDatabase.php' ;
//including new report statement		
		include 'includeNewReport.php';
//Close connection
		mysqli_close($connection);
	}
 	else{
		$error['submitError'] = 'Please submit the form first.';
		echo "{$error['submitError']}";
		//print_r(mysqli_errno($connection));
	}
	ob_flush();
?>
