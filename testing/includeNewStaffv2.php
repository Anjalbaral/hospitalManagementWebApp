<?php
	$stmtForCheckingUsername = mysqli_stmt_init($connection);
	$sqlForCheckingUsername ="
	 SELECT uname
	 FROM staff_login
	 WHERE uname = ?
	";
	if(mysqli_stmt_prepare($stmtForCheckingUsername,$sqlForCheckingUsername)){
		mysqli_stmt_bind_param($stmtForCheckingUsername,"s",$uname);
		$uname = $_POST['uname'];
		if(!mysqli_stmt_execute($stmtForCheckingUsername)){
			$error['executionErrorForCheckUsername'] = 'uname is not selected from staff_login.';
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
				$stmtForStaffTable = mysqli_stmt_init($connection);
				$stmtForRetrivingStaffID = mysqli_stmt_init($connection);
				$stmtForStaffLogin = mysqli_stmt_init($connection);
				$stmtForStaffContactTable = mysqli_stmt_init($connection);
				$stmtForStaffOfficialInfoTable = mysqli_stmt_init($connection);
		//prepare statement
				if(mysqli_stmt_prepare($stmtForStaffLogin,'INSERT INTO staff_login (uname, password, email) VALUES (?,?,?)')){
		//binding parameter
					mysqli_stmt_bind_param($stmtForStaffLogin,"sss",$uname,$password,$email);
		//stff-login table
					$uname = $_POST['uname'];
					$password = password_hash($_POST['password'] , PASSWORD_DEFAULT) ;
					$email = $_POST['email'];			
		//executing statement
					if(!mysqli_stmt_execute($stmtForStaffLogin)){
						$error['stmtExecutionErrorForStaffLoginTable'] = 'Records not inserted successfully in staff_login.';
						echo "{$error['stmtExecutionErrorForStaffLoginTable']}";
						print_r(mysqli_stmt_errno($stmtForStaffLogin));
					}
				}		
		//preparing statement
				if(mysqli_stmt_prepare($stmtForStaffTable,'INSERT INTO staff (uname, fname, mname, lname, dob) VALUES (?,?,?,?,?)')){
		//binding parameter				
					mysqli_stmt_bind_param($stmtForStaffTable,"sssss",$uname,$firstName,$middleName,$lastName,$dob);
		//staff table
					$firstName =$_POST['firstName'];
					$middleName = $_POST['middleName'];
					$lastName = $_POST['lastName'];
					$dob = $_POST['dob'];
		//executing statement			
					if(!mysqli_stmt_execute($stmtForStaffTable)){
						$error['stmtExecutionErrorForStaffTable'] = 'Records not inserted successfully in staff table.';
						echo "{$error['stmtExecutionErrorForStaffTable']}";
					}
				}
		//prepare statement
				if(mysqli_stmt_prepare($stmtForRetrivingStaffID,'SELECT max(staff_id) FROM staff')){
		//executing statement
					if(!mysqli_stmt_execute($stmtForRetrivingStaffID)){
						$error['stmtExecutionErrorForRetrivingStaffID'] = 'Records not selected successfully from staff table.';
						echo "{$error['stmtExecutionErrorForRetrivingStaffID']}";
					}
		//binding result
					mysqli_stmt_bind_result($stmtForRetrivingStaffID,$id);
		//fetching result
					while(mysqli_stmt_fetch($stmtForRetrivingStaffID)){
						$staffID = $id;
					}
				}		
		//preparing statement		
				if(mysqli_stmt_prepare($stmtForStaffContactTable,'INSERT INTO staff_contact (uname, staff_id, phone , city , ward , district) VALUES (?,?,?,?,?,?)')){
		//binding parameter	
					mysqli_stmt_bind_param($stmtForStaffContactTable,"sissis",$uname,$staffID,$phone,$city,$ward,$district);
		//staff-contact table
					$district = $_POST['district'];
					$city = $_POST['city'];
					$ward = $_POST['ward'];
					$phone = $_POST['phone'];
		//executing statement			
					if(!mysqli_stmt_execute($stmtForStaffContactTable)){
						$error['stmtExecutionErrorForStaffContactTable'] = 'Records not inserted successfully in staff_contact table.';
						echo "{$error['stmtExecutionErrorForStaffContactTable']}";
					}
				}
		//preparing statement
				if(mysqli_stmt_prepare($stmtForStaffOfficialInfoTable,'INSERT INTO staff_official_info (staff_id, post , qualification) VALUES (?,?,?)')){
		//binding parameter			
					mysqli_stmt_bind_param($stmtForStaffOfficialInfoTable,"iss",$staffID,$jobTitle,$academics);
		//staff-official_info table
					$jobTitle = $_POST['jobTitle'];
					$academics = $_POST['academics'];
					if(!mysqli_stmt_execute($stmtForStaffOfficialInfoTable)){
						$error['stmtExecutionErrorForStaffOfficialInfoTable'] = 'Records not inserted successfully in staff_official_info table.';
						echo "{$error['stmtExecutionErrorForStaffOfficialInfoTable']}";
						echo "<pre>";
						print_r(mysqli_stmt_errno($stmtForStaffOfficialInfoTable));
						echo "</pre>";
					}
				}
		//Close statement
				mysqli_stmt_close($stmtForStaffTable);
				mysqli_stmt_close($stmtForRetrivingStaffID);
				mysqli_stmt_close($stmtForStaffContactTable);
				mysqli_stmt_close($stmtForStaffOfficialInfoTable);
				$_SESSION['newStaffForm'] = "Success";
		}
	}
	mysqli_stmt_close($stmtForCheckingUsername);	
?>		