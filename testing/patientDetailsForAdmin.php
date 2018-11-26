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
	//$stmtForPatientReportTable = mysqli_stmt_init($connection);
	$sqlForPatientTable = " SELECT * FROM patient WHERE pt_id = $id ";
	$sqlForPatientContactTable = " SELECT * FROM patient_contact WHERE pt_id = $id ";
	//$sqlForPatientReportTable = " SELECT * FROM report WHERE report_no in ( SELECT report_no FROM attend_info WHERE pt_id = $id ) ";
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
	/*//prepare statement
	if(mysqli_stmt_prepare($stmtForPatientReportTable, $sqlForPatientReportTable)){
		//executing statement
		if(!mysqli_stmt_execute($stmtForPatientReportTable)){
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForPatientReportTable));
			echo "</pre>";
		}
		$resultSetForPatientReport = mysqli_stmt_get_result($stmtForPatientReportTable);
		$outputForPatientReport = array();
		while ($row3 = mysqli_fetch_assoc($resultSetForPatientReport)){
			$outputForPatientReport[] = $row3;
		}
		//binding statement
		//mysqli_stmt_bind_result($stmtForPatientReportTable, $report_no, $dateNotCompatible, $sugar_lvl, $bp, $weight, $health_note, $medicine);
		//$date = (string) $dateNotCompatible;
	}*/
	//close
	mysqli_stmt_close($stmtForPatientTable);
	mysqli_stmt_close($stmtForPatientContactTable);
	//mysqli_stmt_close($stmtForReportTable);
	mysqli_close($connection);
	echo json_encode($finalObject);
?>