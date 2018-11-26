<?php
	include 'includeConnectDatabase.php';
	$id = $_REQUEST["SID"];
	$uname = trim($_REQUEST["SUN"]," ");
	$stmtForStaffTable = mysqli_stmt_init($connection);
	$stmtForStaffContactTable = mysqli_stmt_init($connection);
	$stmtForStaffLoginTable = mysqli_stmt_init($connection);
	$stmtForStaffOfficialInfoTable = mysqli_stmt_init($connection);

	$sqlForStaffTable = " SELECT * FROM staff WHERE staff_id = $id ";
	$sqlForStaffContactTable = " SELECT * FROM staff_contact WHERE staff_id = $id ";
	$sqlForStaffLoginTable = " SELECT uname, email FROM staff_login WHERE uname = '$uname' ";
	$sqlForStaffOfficialInfoTable = " SELECT * FROM staff_official_info WHERE staff_id = $id ";
	//prepare statement
	if(mysqli_stmt_prepare($stmtForStaffTable, $sqlForStaffTable)){
		//executing statement
		if(!mysqli_stmt_execute($stmtForStaffTable)){
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForStaffTable));
			echo "</pre>";
		}
		$resultSetForStaff = mysqli_stmt_get_result($stmtForStaffTable);
		while ($row1 = mysqli_fetch_assoc($resultSetForStaff)){
			$finalObject[] = $row1;
		}
	}
	//prepare statement
	if(mysqli_stmt_prepare($stmtForStaffContactTable, $sqlForStaffContactTable)){
		//executing statement
		if(!mysqli_stmt_execute($stmtForStaffContactTable)){
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForStaffContactTable));
			echo "</pre>";
		}
		$resultSetForStaffContact = mysqli_stmt_get_result($stmtForStaffContactTable);
		while ($row2 = mysqli_fetch_assoc($resultSetForStaffContact)){
			$finalObject[] = $row2;
		}
	}
	//prepare statement
	if(mysqli_stmt_prepare($stmtForStaffLoginTable, $sqlForStaffLoginTable)){
		//executing statement
		if(!mysqli_stmt_execute($stmtForStaffLoginTable)){
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForStaffLoginTable));
			echo "</pre>";
		}
		$resultSetForStaffLogin = mysqli_stmt_get_result($stmtForStaffLoginTable);
		while ($row3 = mysqli_fetch_assoc($resultSetForStaffLogin)){
			$finalObject[] = $row3;
		}
	}
	//prepare statement
	if(mysqli_stmt_prepare($stmtForStaffOfficialInfoTable, $sqlForStaffOfficialInfoTable)){
		//executing statement
		if(!mysqli_stmt_execute($stmtForStaffOfficialInfoTable)){
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForStaffOfficialInfoTable));
			echo "</pre>";
		}
		$resultSetForStaffOfficialInfo = mysqli_stmt_get_result($stmtForStaffOfficialInfoTable);
		while ($row4 = mysqli_fetch_assoc($resultSetForStaffOfficialInfo)){
			$finalObject[] = $row4;
		}
	}
	//close
	mysqli_stmt_close($stmtForStaffTable);
	mysqli_stmt_close($stmtForStaffContactTable);
	mysqli_stmt_close($stmtForStaffLoginTable);
	mysqli_stmt_close($stmtForStaffOfficialInfoTable);
	mysqli_close($connection);
	echo json_encode($finalObject);
?>