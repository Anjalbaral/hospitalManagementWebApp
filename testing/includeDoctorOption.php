<?php
	$stmtForDoctorOption = mysqli_stmt_init($connection);
	$sqlForDoctorOption = " SELECT d.doc_id, CONCAT(d.fname,\" \",d.mname,\" \",d.lname,\" (\" , doi.doc_specialist,\")\") AS namewithspeciality FROM doctor AS d INNER JOIN doctor_official_info AS doi ON d.doc_id = doi.doc_id ORDER BY doi.doc_specialist ASC , d.fname ASC , d.mname ASC , d.lname ASC ";
	if(mysqli_stmt_prepare($stmtForDoctorOption, $sqlForDoctorOption)){
		//executing statement
		if(!mysqli_stmt_execute($stmtForDoctorOption)){
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForDoctorOption));
			echo "</pre>";
		}
		$resultSetForDoctorOption = mysqli_stmt_get_result($stmtForDoctorOption);
		while ($row = mysqli_fetch_assoc($resultSetForDoctorOption)){
			$finalObject[] = $row;
		}
	}
	//close
	mysqli_stmt_close($stmtForDoctorOption);
	mysqli_close($connection);
	echo json_encode($finalObject);
?>