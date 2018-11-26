<?php
	header("Content-Type: application/json; charset=UTF-8");
	include 'includeConnectDatabase.php';
	$prid = $_REQUEST["PRID"];
	//$prid = 1;
	$stmtForAttendInfoTable = mysqli_stmt_init($connection);
	$stmtForPatientTable = mysqli_stmt_init($connection);
	$stmtForPatientContactTable = mysqli_stmt_init($connection);
	$stmtForReportTable = mysqli_stmt_init($connection);
	$sqlForAttendInfoTable = " SELECT * FROM attend_info WHERE report_no = $prid ";
	$sqlForReportTable = " SELECT * FROM report WHERE report_no = $prid ";
	$ptid = "0";
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
			global $ptid ;  
			$ptid= $row3["pt_id"];
			$finalObject[] = $row3;
		}
		//binding statement
		//mysqli_stmt_bind_result($stmtForPatientReportTable, $report_no, $dateNotCompatible, $sugar_lvl, $bp, $weight, $health_note, $medicine);
		//$date = (string) $dateNotCompatible;
	}

	//prepare statement
	if(mysqli_stmt_prepare($stmtForReportTable, $sqlForReportTable)){
		//executing statement
		if(!mysqli_stmt_execute($stmtForReportTable)){
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForReportTable));
			echo "</pre>";
		}
		$resultSetForReport = mysqli_stmt_get_result($stmtForReportTable);
		while ($row4 = mysqli_fetch_assoc($resultSetForReport)){
			$finalObject[] = $row4;
		}
	}

	$sqlForPatientTable = " SELECT * FROM patient WHERE pt_id = $ptid ";
	$sqlForPatientContactTable = " SELECT * FROM patient_contact WHERE pt_id = $ptid ";
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
	
	//close
	mysqli_stmt_close($stmtForPatientTable);
	mysqli_stmt_close($stmtForPatientContactTable);
	mysqli_stmt_close($stmtForReportTable);
	mysqli_stmt_close($stmtForAttendInfoTable);
	mysqli_close($connection);
	//print_r($finalObject);
	echo json_encode($finalObject);
?>