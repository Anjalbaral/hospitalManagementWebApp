<?php
	ob_start();
	session_start();
	$error = array();

	

//checking submission
	if(isset($_POST["submit"])){
//Variables to connect with database
		$dbHost = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName = "hospitalmanagerworkingcopy5";
//Connecting to database
		$connection = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName);
// Remove all illegal characters from email
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

// Validate e-mail
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		    $_SESSION['emailValidation'] = "Invalid email address";
		    header("Location:../HospitalManagementProject/newStaff.php");
		}
		if(mysqli_connect_errno()){
			$error['databaseConnectionError'] = 'DataBase is unable to be connected.';
			echo "{$error['databaseConnectionError']}";
			die();
		}
//choosing php code
		if($_POST["jobTitle"] == "receptionist"){
			echo "jobTitle receptionist";
			include 'includeNewStaffv2.php';
			header("Location: ../HospitalManagementProject/newStaff.php");
		}
		elseif ($_POST["jobTitle"] == "doctor") {
			echo "jobTitle doctor";
			include 'includeNewDoctorv2.php';
			header("Location: ../HospitalManagementProject/newStaff.php");
		}
		elseif ($_POST["jobTitle"] == "admin") {
			echo "jobTitle admin";
			include 'includeNewAdmin.php';
			header("Location: ../HospitalManagementProject/newStaff.php");
		}
		else{
			echo "Code error";
		}
//Close connection
		mysqli_close($connection);
	}
 	else{
		$error['submitError'] = 'Please submit the form first.';
		echo "{$error['submitError']}";
	}
	
?>
