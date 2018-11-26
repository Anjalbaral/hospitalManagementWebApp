<?php
	header("Content-Type: application/json; charset=UTF-8");
	include 'includeConnectDatabase.php';
	$id = $_REQUEST["PID"];
	//$patientIDObject = json_decode($_GET["PID"]);
	//var_dump($patientIDObject);
	//$patientIDObject = json_decode($_POST["PID"], false);
	//$id = $patientIDObject["patientID"];
	//$id = 1;
	
	$stmtForPatientTable = mysqli_stmt_init($connection);
	$stmtForPatientContactTable = mysqli_stmt_init($connection);
	$stmtForAttendInfoTable = mysqli_stmt_init($connection);

	$sqlForPatientTable = " SELECT * FROM patient WHERE pt_id = $id ";
	$sqlForPatientContactTable = " SELECT * FROM patient_contact WHERE pt_id = $id ";
	$sqlForAttendInfoTable = " SELECT * FROM attend_info WHERE pt_id = $id ";
	//prepare statement
	if(mysqli_stmt_prepare($stmtForPatientTable, $sqlForPatientTable)){
		//executing statement
		if(!mysqli_stmt_execute($stmtForPatientTable)){
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForPatientTable));
			echo "</pre>";
		}
		$resultSetForPatient = mysqli_stmt_get_result($stmtForPatientTable);
		while ($row1 = mysqli_fetch_assoc($resultSetForPatient)){
			$finalObject[] = $row1;
		}
		//binding statement
		//mysqli_stmt_bind_result($stmtForPatientTable, $fname, $mname, $lname, $dobNotCompatible, $blood_grp, $problem, $status, $sex, $ward_no, $room_no, $bed_no);
		//$dob = (string) $dobNotCompatible;
	}
	//prepare statement
	if(mysqli_stmt_prepare($stmtForPatientContactTable, $sqlForPatientContactTable)){
		//executing statement
		if(!mysqli_stmt_execute($stmtForPatientContactTable)){
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForPatientContactTable));
			echo "</pre>";
		}
		$resultSetForPatientContact = mysqli_stmt_get_result($stmtForPatientContactTable);
		while ($row2 = mysqli_fetch_assoc($resultSetForPatientContact)){
			$finalObject[] = $row2;
		}
		//binding statement
		//mysqli_stmt_bind_result($stmtForPatientContactTable, $phone, $city, $ward, $district);
	}
	//prepare statement
	if(mysqli_stmt_prepare($stmtForAttendInfoTable, $sqlForAttendInfoTable)){
		//executing statement
		if(!mysqli_stmt_execute($stmtForAttendInfoTable)){
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForAttendInfoTable));
			echo "</pre>";
		}
		$resultSetForAttendInfo = mysqli_stmt_get_result($stmtForAttendInfoTable);
		while ($row3 = mysqli_fetch_assoc($resultSetForAttendInfo)){
			$finalObject[] = $row3;
		}
		//binding statement
		//mysqli_stmt_bind_result($stmtForPatientReportTable, $report_no, $dateNotCompatible, $sugar_lvl, $bp, $weight, $health_note, $medicine);
		//$date = (string) $dateNotCompatible;
	}
	//close
	mysqli_stmt_close($stmtForPatientTable);
	mysqli_stmt_close($stmtForPatientContactTable);
	mysqli_stmt_close($stmtForAttendInfoTable);
	mysqli_close($connection);
	echo json_encode($finalObject);
?>