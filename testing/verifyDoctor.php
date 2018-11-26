<?php
	ob_start();
	session_start();
	include 'includeConnectDatabase.php';
	$uname = $_POST['doctor-name'];
	$inPass = $_POST['doctor-password'];
	if(isset($_POST['submit'])){
		if ((!empty($uname) || $uname != " ") && (!empty($inPass) || $inPass != " ")) {
			$stmtForLoginTable = mysqli_stmt_init($connection);
			$sqlForLoginTable = " SELECT dl.uname, dl.password, dl.email, d.doc_id, CONCAT ( d.fname,' ',d.mname,' ',d.lname ) AS name, CONCAT ( dc.district,',',dc.city,',', dc.ward ) AS address FROM doctor_login AS dl INNER JOIN doctor AS d INNER JOIN doctor_contact AS dc WHERE dl.uname = ? AND d.doc_id = (SELECT doc_id FROM doctor WHERE uname = ? )  ";
			if(mysqli_stmt_prepare($stmtForLoginTable, $sqlForLoginTable)){
				//binding parameter
				mysqli_stmt_bind_param($stmtForLoginTable,"ss",$uname,$uname);
				//executing statement
				if(!mysqli_stmt_execute($stmtForLoginTable)){
					echo "<pre>";
					print_r(mysqli_stmt_errno($stmtForLoginTable));
					echo "</pre>";
				}
				//bind result
				mysqli_stmt_bind_result($stmtForLoginTable, $username, $hashedPassword, $email, $id, $name, $address );
				//fetching result
				mysqli_stmt_fetch($stmtForLoginTable);
				//verifying password
				if(password_verify($inPass, $hashedPassword)){
					$_SESSION['verified'] = "verified" ;
					$_SESSION['doctorUsername'] = $username ;
					$_SESSION['doctorId'] = $id;
					$_SESSION['doctorEmail'] = $email;
					$_SESSION['doctorName']  = $name;
					$_SESSION['doctorAddress'] = $address;
					header("Location: ../HospitalManagementProject/DoctorProfile.php");
				}
				else{
					$_SESSION['verified'] = "unverified";
					echo "Wrong Username or Password combination!!!";
				}
				
			}
			//close
			mysqli_stmt_close($stmtForLoginTable);
			//include_once 'verificationFunction.php';
			// $location = "http://myhost/semester%204/HospitalManagementProject/doctorPANEL.php";
			// verify($connection, $uname, $inPass, "staff_login", $location);
			
		}
		else{
			echo "Empty field!!";
		}
	}
	//Close connection
	mysqli_close($connection);
?>