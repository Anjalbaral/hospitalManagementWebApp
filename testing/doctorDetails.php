<?php
	include 'includeConnectDatabase.php';
	$id = $_REQUEST["DID"];
	$uname = trim($_REQUEST["DUN"]," ");
	// $id = 12;
	// $uname = "duname5";
	$stmtForDoctorTable = mysqli_stmt_init($connection);
	$stmtForDoctorContactTable = mysqli_stmt_init($connection);
	$stmtForDoctorLoginTable = mysqli_stmt_init($connection);
	$stmtForDoctorOfficialInfoTable = mysqli_stmt_init($connection);

	$sqlForDoctorTable = " SELECT * FROM doctor WHERE doc_id = $id ";
	$sqlForDoctorContactTable = " SELECT * FROM doctor_contact WHERE doc_id = $id ";
	$sqlForDoctorLoginTable = " SELECT uname, email FROM doctor_login WHERE uname = '$uname' ";
	$sqlForDoctorOfficialInfoTable = " SELECT * FROM doctor_official_info WHERE doc_id = $id ";
	//prepare statement
	if(mysqli_stmt_prepare($stmtForDoctorTable, $sqlForDoctorTable)){
		//executing statement
		if(!mysqli_stmt_execute($stmtForDoctorTable)){
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForDoctorTable));
			echo "</pre>";
		}
		$resultSetForDoctor = mysqli_stmt_get_result($stmtForDoctorTable);
		while ($row1 = mysqli_fetch_assoc($resultSetForDoctor)){
			$finalObject[] = $row1;
		}
	}
	//prepare statement
	if(mysqli_stmt_prepare($stmtForDoctorContactTable, $sqlForDoctorContactTable)){
		//executing statement
		if(!mysqli_stmt_execute($stmtForDoctorContactTable)){
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForDoctorContactTable));
			echo "</pre>";
		}
		$resultSetForDoctorContact = mysqli_stmt_get_result($stmtForDoctorContactTable);
		while ($row2 = mysqli_fetch_assoc($resultSetForDoctorContact)){
			$finalObject[] = $row2;
		}
	}
	//prepare statement
	if(mysqli_stmt_prepare($stmtForDoctorLoginTable, $sqlForDoctorLoginTable)){
		//executing statement
		if(!mysqli_stmt_execute($stmtForDoctorLoginTable)){
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForDoctorLoginTable));
			echo "</pre>";
		}
		$resultSetForDoctorLogin = mysqli_stmt_get_result($stmtForDoctorLoginTable);
		while ($row3 = mysqli_fetch_assoc($resultSetForDoctorLogin)){
			$finalObject[] = $row3;
		}
	}
	//prepare statement
	if(mysqli_stmt_prepare($stmtForDoctorOfficialInfoTable, $sqlForDoctorOfficialInfoTable)){
		//executing statement
		if(!mysqli_stmt_execute($stmtForDoctorOfficialInfoTable)){
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForDoctorOfficialInfoTable));
			echo "</pre>";
		}
		$resultSetForDoctorOfficialInfo = mysqli_stmt_get_result($stmtForDoctorOfficialInfoTable);
		while ($row4 = mysqli_fetch_assoc($resultSetForDoctorOfficialInfo)){
			$finalObject[] = $row4;
		}
	}
	//close
	mysqli_stmt_close($stmtForDoctorTable);
	mysqli_stmt_close($stmtForDoctorContactTable);
	mysqli_stmt_close($stmtForDoctorLoginTable);
	mysqli_stmt_close($stmtForDoctorOfficialInfoTable);
	mysqli_close($connection);
	//print_r($finalObject);
	echo json_encode($finalObject);
?>