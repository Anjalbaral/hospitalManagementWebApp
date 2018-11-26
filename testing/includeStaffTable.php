<?php
	$stmtForStaffList = mysqli_stmt_init($connection);
	$sqlForStaffList = " SELECT staff.staff_id,staff.uname,staff.fname,staff.mname,staff.lname,staff.dob,staff_official_info.post FROM staff NATURAL JOIN staff_official_info WHERE staff.staff_id = staff_official_info.staff_id ";
	if (mysqli_stmt_prepare($stmtForStaffList, $sqlForStaffList)) {
		if(!mysqli_stmt_execute($stmtForStaffList)){
			$error['stmtExecutionErrorForStaffList'] = 'Error selecting staff list.';
			echo "<pre>";
			print_r(mysqli_stmt_errno($stmtForStaffList));
			echo "</pre>";
			die();
		}
		mysqli_stmt_bind_result($stmtForStaffList, $staff_id, $uname, $fname, $mname, $lname, $dob, $post);
?>
<!-- <table id="table"> -->
<?php
			echo "<table id='table'>";
			echo "<tr>";
				echo "<th> ID </th>";
				echo "<th> Username </th>";
				echo "<th> Name </th>";
				echo "<th> Age </th>";
				echo "<th> Post </th>";
				echo "<th> Details </th>";
			echo "</tr>";
		while (mysqli_stmt_fetch($stmtForStaffList)){
			echo "<tr>";
				echo "<td> ". $staff_id ." </td>";
				echo "<td> ". $uname ." </td>";
				echo "<td> ". $fname ." ". $mname ." ". $lname ." </td>";
				$yearOfBirth = (int)substr($dob,-10,6);
				$currentYear = date('Y');
				$age = $currentYear - $yearOfBirth;
				echo "<td> ". $age ." </td>";
				echo "<td> ". $post ." </td>";
				echo '<td> <button class="viewButton" type="button" >View Details </button> </td>';
			echo "</tr>";	
		}
		echo "</table><br>";	
	}?>
<!-- </table><br> -->
<?php	
	mysqli_stmt_close($stmtForStaffList);
?>
<script src="viewButtonForStaffList.js"></script>