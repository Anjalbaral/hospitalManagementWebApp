<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Patient Table</title>
		<link href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">
   		<link rel="stylesheet" type="text/css" href="../HospitalManagementProject/css/reportcss.css">
   		<meta charset="utf-8" name="viewport" content="width=device-width">
   		<style>
	   		@media screen and (max-width: 400px){
	   			#nav{
	   				float: right;
	   				width: 100%;
	   			}
	   			#container{
	   				margin-left: 250px;
	   			}
	   		}
	   		#nav{
	   			float: left;
	   			height: 1450px;
	   		}
	   		#container{
	   			position: relative;
	   			float: right;
	   			width: 85%;
	   			height: 1000px;
	   		}
	   		#patientTable{
	   			 padding-top: 30px;
	   			 position:absolute;
	   			 left: 100px;
	   			 top:40px;
	   			 width: 80%; 
	   			 height: 92%;
			}
	   		#report{
	   			background:#35424a;
	   			padding-top: 40px;
	   			padding-bottom: 5px;
	   			position: absolute;
	   			left: 100px;
	   			top:40px;
	   			width:80%;
	   			min-height: 92%;
	   			border-radius:30px;
	   			text-align:center;
	   			opacity: 0.9;
	   			/*float:right;margin-right:12%;padding-bottom: 20px;visibility: hidden;*/
	   		}
	   		#reportTable{
	   			position: absolute;
	   			top: 40px;
	   			float: left;
	   			padding-right:250px ;
	   		}
	   		@media screen and (max-width: 800px){
   				#container, #nav{
   					width: 100%;
   				}
   			}
   			table{
   				font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
   				background-color: rgb(70, 71, 71);
   				color: white;
   				position: absolute;
   				border-collapse: collapse;
   				width:100%;
   				top: 0;
   				vertical-align: middle;
   				overflow-x: auto;
   			}
   			th{
				background-color: rgb(53, 86, 99);
				text-align: left;
				height: 2em;
				padding-left: 10px; 
   			}
   			tr{
   				height: 1.5em;
   			}
   			td{
   				padding-left: 8px;
   			}
   			th,tr{
   				border-bottom: 1px solid rgb(146, 156, 160);
   			}
   			tr:nth-child(odd){background-color:rgb(106, 114, 117);}
   			tr:hover{
   				background-color: rgb(137, 179, 196);
   			}
   			.show{
   				visibility: visible;
   			}
   			.hide{
   				visibility: hidden;
   			}
   			.viewButton{
   				border:none;
   				border-radius: 5px;
   				color: white;
   				font-size: 16px;
   				text-decoration: none;
   				background-color:rgb(75, 179, 188);
   				width: 100px;
   				height: 40px;
   			}
   			.viewButton:hover{
   				background-color:rgb(88, 192, 201);
   			}
		</style>
	</head>
	<body onload="fillReport()">
		<div id="container">
			<a href="logout.php">
        		<img class="logout-icon" src="../HospitalManagementProject/img/logout33.png" style="width: 50px;height:50px;margin-left:1000px;margin-top: 15px;">
      		</a>
			<div id="report">
			   		<form method="POST" action="preparedSqlForNewReport.php" >
			   			<label><h3 style="color: white;"> Report No:</h3></label>
						<input id="reportNo" type="text" readonly name="reportNo"style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Patient Name: </h3></label>
						<input id="patientName" type="text" readonly name="patientName" style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Age of patient: </h3></label>
						<input id="age" type="text" readonly name="age" style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Health condition: </h3></label>
						<input id="condition" name="condition" style="background:white;border:none;width: 80%;height:30px;border-radius:20px;text-align: center;">
						<label><h3 style="color: white;"> Problem: </h3></label>
						<input id="problem" name="problem" style="background:white;border:none;width: 80%;height:30px;border-radius:20px;text-align: center;">
						<label><h3 style="color: white;"> Blood Group </h3></label>
						<input id="bloodGrp" type="text" name="bloodGrp" style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Sugar Level </h3></label>
						<input id="sugarLvl" type="text" name="sugarLvl" style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Blood pressure </h3></label>
						<input id="bp" type="text" name="bp" style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Weight </h3></label>
						<input id="weight" type="text" name="weight" style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h2 style="color: white;"> Details about Patient Condition: </h2></label>
						<textarea id="details" name="healthNote" cols="70" rows="9" style="background:white;text-align:left;padding-left: 5px;padding-top:5px;width:60%;border:none;outline:none;overflow-x:auto;resize: none;"></textarea>
				     	<!-- <label><h3> Attach Lab Reports: </h3></label>
						<input type="file" name="labreport" multiple="multiple" style="background:white;border:none;border-radius:20px;outline:none;text-align:center;"> -->
						<label><h2 style="color: white;"> Write Medicine: </h2></label>
						<textarea id="medicine" name="medicine" rows="10" cols="60" style="background:white;text-align:left;padding-left: 5px;padding-top:5px;width:60%;border:none;outline:none;overflow-x:auto;resize: none;"></textarea><br>
						<button type="submit" name="submit" style="width: 100px;height: 30px;border-radius: 10px;border:none;margin-top: 20px;outline: none;">Update</button>
					</form>
			</div><!-- enctype="multipart/form-data" -->
		</div>
			
			 	<div id="nav">
			    	<ul style="list-style-type: none;">
			    		<li style="font-size: 30px;font-weight:bold;"><?php 
			    					echo "Welcome";
			    					echo "<br>";
			    					if(isset($_SESSION['doctorUsername']) && isset($_SESSION['doctorId'])){
			    						echo $_SESSION['doctorUsername'];
			    						echo "<br>";
			    						echo "Id:".$_SESSION['doctorId']; 	
			    					}
			    					elseif(isset($_SESSION['adminUsername'])){
			    						echo $_SESSION['adminUsername'];
			    					}
			    					
			    		?></li>
						<li class="current" style="text-align: center;">
				         <a class="doctorprofile" href="../HospitalManagementProject/doctorProfile.php"><img src="../HospitalManagementProject/img/adm2.png" style="height: 100px;width: 100px;"><h2 style="text-align: center;">Doctor Profile</h2></a>
						<li style="text-align: center;">
				          <a class="PatientList" href="htmlForPatientTable(1).php"><img src="../HospitalManagementProject/img/pat.png" style="height: 100px;width: 100px;margin-left: 5px;"><h2 style="text-align: center;">Patient Details</h2>
				          </a>
				      	</li>
			    	</ul>     
			 	</div> 
		<script src="fillForm.js"></script>
	</body>
</html>
