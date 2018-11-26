<?php
	ob_start();
	session_start();
	include 'includeConnectDatabase.php';
	$uname = $_POST['recep-name'];
	$inPass = $_POST['recep-password'];
	if(isset($_POST['submit'])){
		if ((!empty($uname) || $uname != " ") && (!empty($inPass) || $inPass != " ")) {
			$stmtForLoginTable = mysqli_stmt_init($connection);
			$sqlForLoginTable = " SELECT sl.uname, sl.password, s.staff_id FROM staff_login AS sl INNER JOIN staff AS s WHERE sl.uname = ? AND s.staff_id = (SELECT staff_id FROM staff WHERE uname = ? ) ";
			if(mysqli_stmt_prepare($stmtForLoginTable,$sqlForLoginTable)){
				// //binding parameter
				mysqli_stmt_bind_param($stmtForLoginTable,"ss",$uname,$uname);
				//executing statement
				if(!mysqli_stmt_execute($stmtForLoginTable)){
					echo "<pre>";
					print_r(mysqli_stmt_errno($stmtForLoginTable));
					echo "</pre>";
				}
				//bind result
				mysqli_stmt_bind_result($stmtForLoginTable, $username, $hashedPassword, $id);
				//fetching result
				var_dump(mysqli_stmt_fetch($stmtForLoginTable));
				//verifying password
				if(password_verify($inPass, $hashedPassword)){
					$_SESSION['verified'] = "verified" ;
					$_SESSION['receptionistUsername'] = $username ;
					$_SESSION['receptionistId'] = $id ;
					header("Location:../HospitalManagementProject/receptionistPANEL.php");
				}
				else{
					$_SESSION['verified'] = "unverified";
					echo "Wrong Username or Password combination!!!";
				}
				
			}
			//close
			mysqli_stmt_close($stmtForLoginTable);
			// include_once 'verificationFunction.php';
			// $location = "http://myhost/semester%204/HospitalManagementProject/receptionistPANEL.php";
			// verify($connection, $uname, $inPass, "staff_login", $location);
		}
		else{
			echo "Empty field!!";
		}
	}
	//Close connection
	mysqli_close($connection);
	
?>