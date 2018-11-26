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
		if(mysqli_connect_errno()){
			$error['databaseConnectionError'] = 'DataBase is unable to be connected.';
			die();
		}
		//Initializing statement
		$stmtForPatientTable = mysqli_stmt_init($connection);
		$stmtForPatientContactTable = mysqli_stmt_init($connection);
		$stmtForRetrivingPatientID = mysqli_stmt_init($connection);
		$stmtForPDA = mysqli_stmt_init($connection);
		//preparing statement
		if(mysqli_stmt_prepare($stmtForPatientTable,'INSERT INTO patient (fname , mname , lname , dob , problem , status , sex , ward_no , room_no , bed_no) VALUES (?,?,?,?,?,?,?,?,?,?)')){
			mysqli_stmt_bind_param($stmtForPatientTable,"ssssssssii",$firstName,$middleName,$lastName,$dob,$problemOption,$conditionOption,$gender,$wardNo,$roomNo,$bedNo);
			//patient table
			$firstName = $_POST["firstName"];
			$middleName = $_POST["middleName"];
			$lastName = $_POST["lastName"];
			$dob = $_POST["dob"];
			//$bloodGroup = $_POST["bloodGroup"];		
			$problemOption = $_POST["problemOption"];
			$conditionOption = $_POST["conditionOption"];
			$gender =$_POST["gender"];
			$wardNo = $_POST["wardNo"];
			$roomNo = $_POST["roomNo"];
			$bedNo = $_POST["bedNo"];
			
			if(!mysqli_stmt_execute($stmtForPatientTable)){
				$error['stmtExecutionErrorForPatientTable'] = 'Records not inserted successfully in patient table.';
				echo "{$error['stmtExecutionErrorForPatientTable']}";
				echo "<pre>";
				print_r(mysqli_stmt_errno($stmtForPatientTable));
				echo "</pre>";
				die();
			}
		}	

		if(mysqli_stmt_prepare($stmtForRetrivingPatientID,'SELECT max(pt_id) FROM patient')){
			if(!mysqli_stmt_execute($stmtForRetrivingPatientID)){
				$error['stmtExecutionErrorForRetrivingPatientID'] = 'Records not selected successfully from patient table.';
				echo "{$error['stmtExecutionErrorForRetrivingPatientID']}";
				die();
			}
			
			mysqli_stmt_bind_result($stmtForRetrivingPatientID,$id);
			while(mysqli_stmt_fetch($stmtForRetrivingPatientID)){
				$patientID = $id;
			}
		}

		if(mysqli_stmt_prepare($stmtForPatientContactTable,'INSERT INTO patient_contact (pt_id , phone , city , ward , district) VALUES (?,?,?,?,?)')){
			mysqli_stmt_bind_param($stmtForPatientContactTable,"sssis",$patientID,$phone,$city,$ward,$district);
			//patient-contact table
			$phone = $_POST["phone"];
			$district = $_POST["district"];
			$city = $_POST["city"];
			$ward = $_POST["ward"];
			
			if(!mysqli_stmt_execute($stmtForPatientContactTable)){
				$error['stmtExecutionErrorForPatientContactTable'] = 'Records not inserted successfully in patient_contact table.';
				echo "{$error['stmtExecutionErrorForPatientContactTable']}";
				die();
			}
		}

		if(mysqli_stmt_prepare($stmtForPDA,'INSERT INTO patient_doctor_assignment (staff_id ,pt_id , doc_id) VALUES (?,?,?)')){
			mysqli_stmt_bind_param($stmtForPDA,"iii",$staffID,$patientID,$doctorID);
			//patient-doctor-assignment table
			$staffID = $_SESSION['receptionistId'];
			$doctorID = $_POST['doctorOption'];
			
			if(!mysqli_stmt_execute($stmtForPDA)){
				$error['stmtExecutionErrorForPDA'] = 'Records not inserted successfully in patient_doctor_assignment table.';
				echo "{$error['stmtExecutionErrorForPDA']}";
				die();
			}
		}
		//Close statement
		mysqli_stmt_close($stmtForPatientTable);
		mysqli_stmt_close($stmtForRetrivingPatientID);
		mysqli_stmt_close($stmtForPatientContactTable);
		mysqli_stmt_close($stmtForPDA);
		//Close connection
		mysqli_close($connection);
		$_SESSION['newAdmission']="Success";
		header("Location:../HospitalManagementProject/receptionistPANEL.php");
	}
 	else{
		$error['submitError'] = 'Please submit the form first.';
	}
	//$prevRoom = mysqli_real_escape_string($connection,$_POST["prevRoom"]);
	//$prevBed = mysqli_real_escape_string($connection,$_POST["prevBed"]);
	//$newRoom = mysqli_real_escape_string($connection,$_POST["newRoom"]);
	//$newBed = mysqli_real_escape_string($connection,$_POST["newBed"]);
	
?>