<?php
	$stmtForCheckingUsername = mysqli_stmt_init($connection);
	$sqlForCheckingUsername ='
	 SELECT uname
	 FROM admin_login
	 WHERE uname = ?
	';
	if(mysqli_stmt_prepare($stmtForCheckingUsername,$sqlForCheckingUsername)){
		mysqli_stmt_bind_param($stmtForCheckingUsername,"s",$uname);
		$uname = $_POST['uname'];
		if(!mysqli_stmt_execute($stmtForCheckingUsername)){
			$error['executionErrorForCheckUsername'] = 'uname is not selected from admin_login.';
		}
		$checkResult = mysqli_stmt_get_result($stmtForCheckingUsername);
		if(mysqli_num_rows($checkResult) == 1 ){
			// echo "<br>";
			// echo "Username already exists.";
			// echo "</br>";
			$_SESSION['usernameExist']="Username already exists";
		}
		else{
		//initialzing statement
				$stmtForAdminTable = mysqli_stmt_init($connection);
				$stmtForAdminLogin = mysqli_stmt_init($connection);
		//prepare statement
				if(mysqli_stmt_prepare($stmtForAdminLogin,'INSERT INTO admin_login (uname, password, email) VALUES (?,?,?)')){
		//binding parameter
					mysqli_stmt_bind_param($stmtForAdminLogin,"sss",$uname,$password,$email);
		//stff-login table
					$uname = $_POST['uname'];
					$password = password_hash($_POST['password'] , PASSWORD_DEFAULT) ;
					$email = $_POST['email'];			
		//executing statement
					if(!mysqli_stmt_execute($stmtForAdminLogin)){
						$error['stmtExecutionErrorForAdminLoginTable'] = 'Records not inserted successfully in admin_login.';
						echo "{$error['stmtExecutionErrorForAdminLoginTable']}";
						print_r(mysqli_stmt_errno($stmtForAdminLogin));
					}
				}		
		//preparing statement
				if(mysqli_stmt_prepare($stmtForAdminTable,'INSERT INTO admin (uname, fname, mname, lname) VALUES (?,?,?,?)')){
		//binding parameter				
					mysqli_stmt_bind_param($stmtForAdminTable,"ssss",$uname,$firstName,$middleName,$lastName);
		//admin table
					$firstName =$_POST['firstName'];
					$middleName = $_POST['middleName'];
					$lastName = $_POST['lastName'];
					$dob = $_POST['dob'];
		//executing statement			
					if(!mysqli_stmt_execute($stmtForAdminTable)){
						$error['stmtExecutionErrorForAdminTable'] = 'Records not inserted successfully in admin table.';
						echo "{$error['stmtExecutionErrorForAdminTable']}";
					}
				}
		//Close statement
				mysqli_stmt_close($stmtForAdminTable);
				mysqli_stmt_close($stmtForAdminLogin);
				$_SESSION['newAdminForm'] = "Success";
		}
	}
	mysqli_stmt_close($stmtForCheckingUsername);	
?>		