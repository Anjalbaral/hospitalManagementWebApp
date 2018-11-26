<?php
	$stmtForCheckingUsername = mysqli_stmt_init($connection);
	$sqlForCheckingUsername ='
	 SELECT uname
	 FROM doctor_login
	 WHERE uname = ?
	';
	if(mysqli_stmt_prepare($stmtForCheckingUsername,$sqlForCheckingUsername)){
		mysqli_stmt_bind_param($stmtForCheckingUsername,"s",$uname);
		$uname = $_POST['uname'];
		if(!mysqli_stmt_execute($stmtForCheckingUsername)){
			$error['executionErrorForCheckUsername'] = 'uname is not selected from doctor_login.';
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
				$stmtForDoctorTable = mysqli_stmt_init($connection);
				$stmtForDoctorLogin = mysqli_stmt_init($connection);
				$stmtForRetrivingDoctorID = mysqli_stmt_init($connection);
				$stmtForDoctorContactTable = mysqli_stmt_init($connection);
				$stmtForDoctorOfficialInfoTable = mysqli_stmt_init($connection);
		//prepare statement
				if(mysqli_stmt_prepare($stmtForDoctorLogin,'INSERT INTO doctor_login (uname, password, email) VALUES (?,?,?)')){
		//binding parameter
					mysqli_stmt_bind_param($stmtForDoctorLogin,"sss",$uname,$password,$email);
		//stff-login table
					$uname = $_POST['uname'];
					$password = password_hash($_POST['password'] , PASSWORD_DEFAULT) ;
					$email = $_POST['email'];			
		//executing statement
					if(!mysqli_stmt_execute($stmtForDoctorLogin)){
						$error['stmtExecutionErrorForDoctorLoginTable'] = 'Records not inserted successfully in doctor_login.';
						echo "{$error['stmtExecutionErrorForDoctorLoginTable']}";
						print_r(mysqli_stmt_errno($stmtForDoctorLogin));
					}
				}	
		//preparing statement
				if(mysqli_stmt_prepare($stmtForDoctorTable,'INSERT INTO doctor (uname,fname,mname,lname,dob) VALUES (?,?,?,?,?)')){
		//binding parameter				
					mysqli_stmt_bind_param($stmtForDoctorTable,"sssss",$uname,$firstName,$middleName,$lastName,$dob);
		//doctor table
					$firstName =$_POST["firstName"];
					$middleName = $_POST["middleName"];
					$lastName = $_POST["lastName"];
					$dob = $_POST["dob"];
		//executing statement			
					if(!mysqli_stmt_execute($stmtForDoctorTable)){
						$error['stmtExecutionErrorForDoctorTable'] = 'Records not inserted successfully in doctor table.';
						echo "{$error['stmtExecutionErrorForDoctorTable']}";
						echo "<pre>";
						print_r(mysqli_stmt_errno($stmtForDoctorTable));
						echo "</pre>";
					}
				}
		//prepare statement
				if(mysqli_stmt_prepare($stmtForRetrivingDoctorID,'Select max(doc_id) from doctor')){
		//executing statement
					if(!mysqli_stmt_execute($stmtForRetrivingDoctorID)){
						$error['stmtExecutionErrorForRetrivingDoctorID'] = 'Records not selected successfully from doctor table.';
						echo "{$error['stmtExecutionErrorForRetrivingDoctorID']}";
					}
		//binding result
					mysqli_stmt_bind_result($stmtForRetrivingDoctorID,$id);
		//fetching result
					while(mysqli_stmt_fetch($stmtForRetrivingDoctorID)){
						$doctorID = $id;
					}
				}
		//preparing statement		
				if(mysqli_stmt_prepare($stmtForDoctorContactTable,'INSERT INTO doctor_contact (uname, doc_id, phone , city , ward , district) VALUES (?,?,?,?,?,?)')){
		//binding parameter	
					mysqli_stmt_bind_param($stmtForDoctorContactTable,"sissis",$uname,$doctorID,$phone,$city,$ward,$district);
		//doctor-contact table
					$district = $_POST["district"];
					$city = $_POST["city"];
					$ward = $_POST["ward"];
					$phone = $_POST["phone"];
		//executing statement			
					if(!mysqli_stmt_execute($stmtForDoctorContactTable)){
						$error['stmtExecutionErrorForDoctorContactTable'] = 'Records not inserted successfully in doctor_contact table.';
						echo "{$error['stmtExecutionErrorForDoctorContactTable']}";
						echo "<pre>";
						print_r(mysqli_stmt_errno($stmtForDoctorContactTable));
						echo "</pre>";
					}
				}
		//preparing statement		
				if(mysqli_stmt_prepare($stmtForDoctorOfficialInfoTable,'INSERT INTO doctor_official_info (doc_id, post , qualification, doc_lvl, doc_specialist) VALUES (?,?,?,?,?)')){
		//binding parameter			
					mysqli_stmt_bind_param($stmtForDoctorOfficialInfoTable,"issss",$doctorID,$jobTitle,$academics,$doctorLevel,$specialist);
		//doctor_official_info table
					$jobTitle = $_POST["jobTitle"];
					$academics = $_POST["academics"];
					$doctorLevel = $_POST["doctorLevel"];
					$specialist = $_POST["specialist"];
		//executing statement
					if(!mysqli_stmt_execute($stmtForDoctorOfficialInfoTable)){
						$error['stmtExecutionErrorForDoctorOfficialInfoTable'] = 'Records not inserted successfully in doctor_official_info table.';
						echo "{$error['stmtExecutionErrorForDoctorOfficialInfoTable']}";
						echo "<pre>";
						print_r(mysqli_stmt_errno($stmtForDoctorOfficialInfoTable));
						echo "</pre>";
					}
				}
		//Close statement
				mysqli_stmt_close($stmtForDoctorTable);
				mysqli_stmt_close($stmtForDoctorLogin);
				mysqli_stmt_close($stmtForRetrivingDoctorID);
				mysqli_stmt_close($stmtForDoctorContactTable);
				mysqli_stmt_close($stmtForDoctorOfficialInfoTable);
				$_SESSION['newDoctorForm'] = "Success";
		}
	}
	mysqli_stmt_close($stmtForCheckingUsername);		
?>
