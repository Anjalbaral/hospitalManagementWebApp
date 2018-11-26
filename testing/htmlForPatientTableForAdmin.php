<!DOCTYPE html>
<html>
	<head>
		<title>Patient Table</title>
		<link href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">
       	<link rel="stylesheet" type="text/css" href="../HospitalManagementProject/css/AdminHomeCss2.css">
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
   				border-radius: 1em;
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
	<body>
		<div id="container">
			<a href="logout.php">
        		<img class="logout-icon" src="../HospitalManagementProject/img/logout33.png" style="width: 50px;height:50px;margin-left:1050px;margin-top: 15px;">
      		</a>
			 <div id="patientTable">
				<?php
					include 'patientTableForAdmin.php';
				?>
			</div>
			<div id="report" hidden="">
			   		<form method="post" action="#" >
			   			<label><h3 style="color: white;"> Patient Id: </h3></label>
						<input id="ptId" type="text" name="ptId" readonly style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Patient Name: </h3></label>
						<input id="patientName" type="text" name="patientName" readonly style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Age: </h3></label>
						<input id="age" type="text" name="age" readonly style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Address </h3></label>
						<input id="address" type="text" name="address" readonly style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Phone </h3></label>
						<input id="phone" type="text" name="phone" readonly style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Blood Group: </h3></label>
						<input id="bloodGrp" type="text" name="bloodGrp" readonly style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Gender: </h3></label>
						<input id="gender" type="text" name="gender" readonly style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Problem: </h3></label>
						<input id="problem" type="text" name="problem" readonly style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Status: </h3></label>
						<input id="status" type="text" name="status" readonly style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
						<label><h3 style="color: white;"> Hospital Ward: </h3></label>
						<input id="hospitalWard" type="text" name="hospitalWard" readonly style="background:white;border: none;width: 80%;height: 30px;border-radius: 20px;outline: none;text-align: center;">
					</form>
			</div><!-- enctype="multipart/form-data" -->
		</div>
			<div id="nav">
		    	<ul style="list-style-type: none;">
		        	<li class="current" style="text-align: center;">
		          		<a class="adminprofile" href="../HospitalManagementProject/adminPANEL.php"><img src="../HospitalManagementProject/img/adm2.png" style="height: 100px;width: 100px;"><h2 style="text-align: center;">ADMIN Profile</h2></a>
		         	</li>
					<li style="text-align: center;">
		          		<a class="newstaff" href="../HospitalManagementProject/newStaff.php"><img src="../HospitalManagementProject/img/rec.png" style="height: 100px;width: 100px;margin-left: 5px;"><h2 style="text-align: center;">New Staff</h2></a>
		          	</li>
		          	<li style="text-align: center;">
		          		<a class="staffprofile" href="htmlForStaffTable.php"><img src="../HospitalManagementProject/img/stfpro.png" style="height: 100px;width: 100px;margin-left: 5px;"><h2 style="text-align: center;">Staff List</h2></a>
		          	</li>
		          	<li style="text-align: center;">
	          			<a class="staffprofile" href="htmlForDoctorTable.php"><img src="../HospitalManagementProject/img/stfpro.png" style="height: 100px;width: 100px;margin-left: 5px;"><h2 style="text-align: center;">Doctor List</h2></a>
	        		</li>
		          	<li style="text-align: center;">
		          		<a class="PatientList" href="htmlForPatientTableForAdmin.php"><img src="../HospitalManagementProject/img/pat.png" style="height: 100px;width: 100px;margin-left: 5px;"><h2 style="text-align: center;">Patient List</h2></a>
		          	</li>
		    	</ul>     
		   	</div>

		</div>
		
	</body>
</html>