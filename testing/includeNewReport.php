<?php
	
		if(isset($_POST['reportNo'])){
		//initialzing statement
				$stmtForReportTable = mysqli_stmt_init($connection);
				$stmtForPatientTable = mysqli_stmt_init($connection);
				$stmtForPatientId = mysqli_stmt_init($connection);
				$rn = $_POST['reportNo'];
				//preparing statement
						if(mysqli_stmt_prepare($stmtForReportTable," UPDATE report SET sugar_lvl = ?,bp=?,weight=?,health_note=?,medicine=? WHERE report_no = ? ")){
				//binding parameter				
							mysqli_stmt_bind_param($stmtForReportTable,"ssdssi",$sugarLvl, $bp, $weight, $healthNote, $medicine, $rn);
				//report table
							$sugarLvl = $_POST['sugarLvl'];
							$bp = $_POST['bp'];
							$weight = $_POST['weight'];
							$healthNote = $_POST['healthNote'];
							$medicine =$_POST['medicine'];
				//executing statement			
							if(!mysqli_stmt_execute($stmtForReportTable)){
								$error['stmtExecutionErrorForReportTable'] = 'Records not updated successfully in report table.';
								echo "{$error['stmtExecutionErrorForReportTable']}";
							}
						}
				//preparing statement
						if(mysqli_stmt_prepare($stmtForPatientId," SELECT DISTINCT(pt_id) FROM attend_info WHERE report_no = ? ")){
				//binding parameter				
							mysqli_stmt_bind_param($stmtForPatientId,"i", $rn );
				//executing statement			
							if(!mysqli_stmt_execute($stmtForPatientId)){
								$error['stmtExecutionErrorForPateintId'] = 'Records not selected successfully from patient table.';
								echo "{$error['stmtExecutionErrorForPateintId']}";
							}
				//bind result
							mysqli_stmt_bind_result($stmtForPatientId, $pid);
				//fetching result			
							while(mysqli_stmt_fetch($stmtForPatientId)){
								$ptId = $pid;
							}
						}		
				//preparing statement
						if(mysqli_stmt_prepare($stmtForPatientTable," UPDATE patient SET status = ?,problem=?,blood_grp=? WHERE pt_id = ? ")){
				//binding parameter				
							mysqli_stmt_bind_param($stmtForPatientTable,"sssi", $condition, $problem,$bloodGrp ,$ptId);
				//report table
							$condition = $_POST['condition'];
							$problem = $_POST['problem'];
							$bloodGrp = $_POST['bloodGrp'];
				//executing statement			
							if(!mysqli_stmt_execute($stmtForPatientTable)){
								$error['stmtExecutionErrorForPatientTable'] = 'Records not updated successfully in patient table.';
								echo "{$error['stmtExecutionErrorForPatientTable']}";
							}
						}
				//Close statement
						mysqli_stmt_close($stmtForReportTable);
						mysqli_stmt_close($stmtForPatientId);
						mysqli_stmt_close($stmtForPatientTable);
						header("Location: htmlForPatientTable(1).php");	
		}

		elseif (isset($_POST["patientId"])){

				//initialzing statement
						$stmtForReportTable = mysqli_stmt_init($connection);
						$stmtForRetrivingReportNo = mysqli_stmt_init($connection);
						$stmtForPatientTable = mysqli_stmt_init($connection);
						$stmtForAttendInfoTable = mysqli_stmt_init($connection);
				//preparing statement
						if(mysqli_stmt_prepare($stmtForReportTable,'INSERT INTO report (sugar_lvl, bp, weight, health_note, medicine) VALUES (?,?,?,?,?)')){
				//binding parameter				
							mysqli_stmt_bind_param($stmtForReportTable,"ssdss", $sugarLvl, $bp, $weight, $healthNote, $medicine);
				//report table
							$sugarLvl = $_POST['sugarLvl'];
							$bp = $_POST['bp'];
							$weight = $_POST['weight'];
							$healthNote = $_POST['healthNote'];
							$medicine =$_POST['medicine'];
				//executing statement			
							if(!mysqli_stmt_execute($stmtForReportTable)){
								$error['stmtExecutionErrorForReportTable'] = 'Records not inserted successfully in report table.';
								echo "{$error['stmtExecutionErrorForReportTable']}";
							}
						}
				//prepare statement
						if(mysqli_stmt_prepare($stmtForRetrivingReportNo,'SELECT max(report_no) FROM report')){
				//executing statement
							if(!mysqli_stmt_execute($stmtForRetrivingReportNo)){
								$error['stmtExecutionErrorForRetrivingReportNo'] = 'Records not selected successfully from report table.';
								echo "{$error['stmtExecutionErrorForRetrivingReportNo']}";
							}
				//binding result
							mysqli_stmt_bind_result($stmtForRetrivingReportNo,$rpn);
				//fetching result
							while(mysqli_stmt_fetch($stmtForRetrivingReportNo)){
								$reportNo = $rpn;
							}
						}
				//preparing statement
						if(mysqli_stmt_prepare($stmtForAttendInfoTable," INSERT INTO attend_info (doc_id, pt_id, report_no) VALUES (?,?,?) ")){
				//binding parameter				
							mysqli_stmt_bind_param($stmtForAttendInfoTable,"iii",$doc_id,$pt_id,$reportNo);
				//report table
							$doc_id = $_SESSION['doctorId'];
							$pt_id = $_POST['patientId'];
				//executing statement			
							if(!mysqli_stmt_execute($stmtForAttendInfoTable)){
								$error['stmtExecutionErrorForPatientTable'] = 'Records not updated successfully in patient table.';
								echo "{$error['stmtExecutionErrorForPatientTable']}";
							}
						}
				//preparing statement
						if(mysqli_stmt_prepare($stmtForPatientTable," UPDATE patient SET status = ?,problem=?,blood_grp=? WHERE pt_id = ? ")){
				//binding parameter				
							mysqli_stmt_bind_param($stmtForPatientTable,"sssi", $condition, $problem,$bloodGrp ,$pt_id);
				//report table
							$condition = $_POST['condition'];
							$problem = $_POST['problem'];
							$bloodGrp = $_POST['bloodGrp'];
				//executing statement			
							if(!mysqli_stmt_execute($stmtForPatientTable)){
								$error['stmtExecutionErrorForPatientTable'] = 'Records not updated successfully in patient table.';
								echo "{$error['stmtExecutionErrorForPatientTable']}";
							}
						}
	
				//Close statement
				mysqli_stmt_close($stmtForReportTable);
				mysqli_stmt_close($stmtForRetrivingReportNo);
				mysqli_stmt_close($stmtForPatientTable);
				mysqli_stmt_close($stmtForAttendInfoTable);
				header("Location: htmlForPatientTable(1).php");	
		}
?>		