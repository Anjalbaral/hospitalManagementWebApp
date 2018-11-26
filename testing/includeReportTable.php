<?php
	$stmtForPatientList = mysqli_stmt_init($connection);
	$did = $_SESSION['doctorId'];
	$sqlForPatientList = " SELECT * FROM attend_info WHERE pt_id = ? ";
	if (mysqli_stmt_prepare($stmtForPatientList, $sqlForPatientList)) {
		if(!mysqli_stmt_execute($stmtForPatientList)){
			$error['stmtExecutionErrorForPatientList'] = 'Error selecting patient list.';
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForPatientList));
			echo "</pre>";
			die();
		}
		mysqli_stmt_bind_result($stmtForPatientList, $pt_id, $fname, $mname, $lname, $dob, $blood_grp, $problem, $status, $sex, $ward_no, $room_no, $bed_no);
?>
<table id = "reportTable">
<?php
			echo "<tr>";
				echo "<th> Report No </th>";
				echo "<th> Date </th>";
				echo '<th> Details </th>';
			echo "</tr>";
		while (mysqli_stmt_fetch($stmtForPatientList)){
			echo "<tr>";
				echo "<td> ". $pt_id ." </td>";
				echo "<td> ". $fname ." ". $mname ." ". $lname ." </td>";
				$yearOfBirth = (int)substr($dob,-10,6);
				$currentYear = date('Y');
				$age = $currentYear - $yearOfBirth;
				echo "<td> ". $age ." </td>";
				echo "<td> ". $sex ." </td>";
				echo "<td> ". $status ." </td>";
				echo '<td> <button class="viewButton" type="button" > View Details </button> </td>';
			echo "</tr>";	
		}
	}
?>
</table><br>
<?php	
	mysqli_stmt_close($stmtForPatientList);
?>
<script src="viewReport.js"></script>

   
