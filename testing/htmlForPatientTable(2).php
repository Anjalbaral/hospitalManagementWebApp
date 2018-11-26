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
	   			position: absolute;
	   			left: 100px;
	   			top:40px;
	   			width:80%;
	   			height: 92%;
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
   			.createButton{
   				background-color:rgb(88, 192, 201);
                position: absolute;
                border-radius: 20px;
   				top:4px;
                left:740px;
   			}
   			.createButton:hover{
   				background-color: rgb(137, 179, 196);
   			}
   			.reportListHeading{
   				color: white;
                position: absolute;
   				font-family: 'arial','Helvetica', 'sans-serif';
   				font-weight: lighter;
   				font-size: 25px;
          		left: 200px;
                top:5px;
   			}
		</style>
	</head>
	<body onload="loadReportTable()">
		<div id="container">
			<a href="logout.php">
        		<img class="logout-icon" src="../HospitalManagementProject/img/logout33.png" style="width: 50px;height:50px;margin-left:1000px;margin-top: 15px;">
      		</a>
			<div class="reportListHeading">
				<h5 id="reportListHeading" style="margin-top: 0;"></h5>	
			</div>
			<div id="reportTable" style="top: 40px;float: right;padding-right:10px;padding-top:50px;right: 200px;left: 200px;">
				<div>
					<table id="reportList">
					<!-- 	<tr> 
							<th>Patient Id</th>
							<th>Report Id</th>
							<th>Date</th>
							<th>View Report</th>
						</tr> -->
					</table>	
				</div>
			</div> 
			<div class="createButton">
				<button id="createButton2" type="button" style="text-align: center;font-weight:lighter;border-radius:10px; border:none;width: 120px;height: 30px;background-color: rgb(75, 179, 188);" onclick="createReport()">
						Create Report
				</button>	
			</div>
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
				         <a class="doctorprofile" href="../HospitalManagementProject/doctorProfile.php"><img src="../HospitalManagementProject/img/adm2.png" style="height: 100px;width: 100px;"><h2 style="text-align: center;">DoctorProfile</h2></a>
						<li style="text-align: center;">
				          <a class="PatientList" href="htmlForPatientTable(1).php"><img src="../HospitalManagementProject/img/pat.png" style="height: 100px;width: 100px;margin-left: 5px;"><h2 style="text-align: center;">Patient Details</h2>
				          </a>
				      	</li>
			    	</ul>     
			 	</div> 
		<script src="viewButton2.js"></script>

	</body>
</html>
