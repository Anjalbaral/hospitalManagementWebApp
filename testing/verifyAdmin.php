<?php
	ob_start();
	session_start();
	include 'includeConnectDatabase.php';
	$uname = $_POST['admin-name'];
	$inPass = $_POST['admin-password'];
	if(isset($_POST['submit'])){
		if ((!empty($uname) || $uname != " ") && (!empty($inPass) || $inPass != " ")) {
			$stmtForLoginTable = mysqli_stmt_init($connection);
			$sqlForLoginTable = " SELECT al.uname, al.password, al.email, CONCAT ( a.fname,' ',a.mname,' ',a.lname ) AS name FROM admin_login AS al INNER JOIN admin AS a WHERE al.uname = ? AND a.uname = (SELECT uname FROM admin WHERE uname = ? ) ";
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
				mysqli_stmt_bind_result($stmtForLoginTable, $username, $hashedPassword, $email, $aName);
				//fetching result
				mysqli_stmt_fetch($stmtForLoginTable);
				//verifying password
				if(password_verify($inPass, $hashedPassword)){
					$_SESSION['verified'] = "verified" ;
					$_SESSION['adminUsername'] = $username ;
					$_SESSION['adminEmail'] = $email;
					$_SESSION['adminName']  = $aName;
					header("Location:../HospitalManagementProject/adminPANEL.php");
				}
				else{
					$_SESSION['verified'] = "unverified";
					echo "Wrong Username or Password combination!!!";
				}
				
			}
			//close
			mysqli_stmt_close($stmtForLoginTable);
			// include_once 'verificationFunction.php';
			// $location = "http://myhost/semester%204/HospitalManagementProject/adminPANEL.php";
			// verify($connection, $uname, $inPass, "staff_login", $location);
		}
		else{
			echo "Empty field!!";
		}
	}
	//Close connection
	mysqli_close($connection);
	
?>