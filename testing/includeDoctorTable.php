<?php
	$stmtForDoctorList = mysqli_stmt_init($connection);
	$sqlForDoctorList = " SELECT doctor.doc_id,doctor.uname,doctor.fname,doctor.mname,doctor.lname,doctor.dob,doctor_official_info.doc_lvl,doctor_official_info.doc_specialist FROM doctor NATURAL JOIN doctor_official_info WHERE doctor.doc_id = doctor_official_info.doc_id ORDER BY doctor.doc_id ASC ";

	if (mysqli_stmt_prepare($stmtForDoctorList, $sqlForDoctorList)) {
		if(!mysqli_stmt_execute($stmtForDoctorList)){
			$error['stmtExecutionErrorFordoctorList'] = 'Error selecting doctor list.';
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForDoctorList));
			echo "</pre>";
			die();
		}
		mysqli_stmt_bind_result($stmtForDoctorList, $doctor_id, $uname, $fname, $mname, $lname, $dob, $level, $specialist);
?>
<table id="table">
<?php
			echo "<tr>";
				echo "<th> ID </th>";
				echo "<th> Username </th>";
				echo "<th> Name </th>";
				echo "<th> Age </th>";
				echo "<th> Level </th>";
				echo "<th> Specialist </th>";
				echo "<th> Details </th>";
			echo "</tr>";
		while (mysqli_stmt_fetch($stmtForDoctorList)){
			echo "<tr>";
				echo "<td> ". $doctor_id ." </td>";
				echo "<td> ". $uname ." </td>";
				echo "<td> ". $fname ." ". $mname ." ". $lname ." </td>";
				$yearOfBirth = (int)substr($dob,-10,6);
				$currentYear = date('Y');
				$age = $currentYear - $yearOfBirth;
				echo "<td> ". $age ." </td>";
				echo "<td> ". $level ." </td>";
				echo "<td> ". $specialist ." </td>";
				echo '<td> <button class="viewButton" type="button" >View Details </button> </td>';
			echo "</tr>";	
		}
	}?>
</table><br>
<?php	
	mysqli_stmt_close($stmtForDoctorList);
?>
<script src="viewButtonForDoctorList.js"></script>