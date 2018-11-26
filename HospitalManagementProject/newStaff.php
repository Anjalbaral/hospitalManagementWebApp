<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>New Staff</title>
	 <link href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/newstaffcss.css">
	<style>
	   		@media screen and (max-width: 400px){
	   			#nav{
	   				float: right;
	   				width: 100%;
	   			}
	   			#container{
	   				float: left;
	   				width:100%;
	   				margin-left: 250px;
	   			}
	   		}
	   		#nav{
	   			float: left;
	   			margin-top: -70px;
	   			padding: 0;
	   		}
	   		#container1 , #container2{
	   			 padding-top: 30px;
	   			 position:absolute;
	   			 left: 100px;
	   			 top:40px;
			}
	   		@media screen and (max-width: 800px){
   				#container, #nav{
   					width: 100%;
   				}
   			}
		</style>
</head>
<body background="img/trelloback5.png" style="margin: 0;">
		<div style="color:rgb(255, 81, 81);position: absolute;left:650px;">
			<h4>
				<?php
					if (isset($_SESSION['emailValidation'])) {
						echo $_SESSION['emailValidation']."/";
					}
					if (isset($_SESSION['usernameExist'])) {
						echo $_SESSION['usernameExist'];
					}
					if(isset($_SESSION['newStaffForm'])){
						echo $_SESSION['newStaffForm'];
					}
					if(isset($_SESSION['newAdminForm'])){
						echo $_SESSION['newAdminForm'];
					}
					if(isset($_SESSION['newDoctorForm'])){
						echo $_SESSION['newDoctorForm'];
					}
					unset($_SESSION['emailValidation']);
					unset($_SESSION['usernameExist']);
					unset($_SESSION['newDoctorForm']);
					unset($_SESSION['newStaffForm']);
					unset($_SESSION['newAdminForm']);
				?>
			</h4>
		</div>
		  <a href="../testing/logout.php">
            <img class="logout-icon" src="../HospitalManagementProject/img/logout33.png" style="width: 50px;height:50px;margin-left:1180px;margin-top: 0px;">
          </a>
      <div class="container" style="position: relative;float:right; background:#2d353a;width: 60%px;height: 90%;margin-top: 0px;margin-right: 250px;opacity: 0.9;border-radius: 30px;padding-left: 50px;padding-right: 50px;">
      	
      	<!-- <div class="profile-image" style="border:dashed;width:200px;height: 200px;float: right;margin-right:60px; margin-top: 50px;color: white;padding-left:10px; ">
      		<h3>your image</h3>
      	</div> -->
			<form method="POST" action="../testing/preparedSqlForNewStaff.php">
				<!-- enctype="multipart/form-data"-->
			      <div class="container1">
			      		 <p>
			      				<select name="jobTitle" style="width: 400px;height: 25px;border-radius: 30px;text-align: center;">
			      					<optgroup label="select">
				      					<option value="doctor">Doctor</option>
				      					<option value="receptionist">Receptionist</option>
				      					<option value="admin">Admin</option>
			      					</optgroup>
			      				</select>
			      		</p>
			      		<h3 style="font-size: 15px;color: white;">(compolsary for all staff)</h3>
			      			 <p>
			      			
			      				<input type="text" required name="uname" placeholder="Username Name" style="width: 400px;height: 25px;border-radius: 30px;outline: none;text-align: center;"><br><br>
			      				<input type="password" required name="password" placeholder="Password" style="width: 400px;height: 25px;border-radius: 30px;outline: none;text-align: center;"><br><br>
								<input type="email" name="email" placeholder="E-mail" style="width: 400px;height: 25px;border-radius: 30px;outline: none;text-align: center;"><br><br>
			      		    </p>
			      		    <p>
			      			
			      				<input type="text" required name="firstName" placeholder="First Name" style="width: 400px;height: 25px;border-radius: 30px;outline: none;text-align: center;">
			      		    </p>
			      		    <p>
			      			
			      				<input type="text" required name="middleName" placeholder="Middle Name" style="width: 400px;height: 25px;border-radius: 30px;outline: none;text-align: center;">
			      		    </p>
			      			<p>
			      				<input type="text" required name="lastName" placeholder="Last Name" style="width: 400px;height: 25px;border-radius: 30px;outline: none;text-align: center;">
			                </p>
			                 <p>
			      			
			      				<input type="text" name="dob" placeholder="Date of birth(YYYY/MM/DD)" style="width: 400px;height: 25px;border-radius: 30px;outline: none;text-align: center;">
			      		    </p>
			      		    <p>
			      					
			      					<input type="text"  name="academics" placeholder="Academics" style="width: 400px;height: 25px;border-radius: 30px;outline: none;text-align: center;">
			      			</p>
 
			      			<p>
			      				<input type="text"  name="district" placeholder="District" style="width: 400px;height: 25px;border-radius: 30px;outline: none;text-align: center;">
			      		    </p>
			      			 <p>	
			      				<input type="text" name="city" placeholder="City" style="width: 400px;height: 25px;border-radius: 30px;outline: none;text-align: center;">

			      			 </p>
			      			 <p>
			      				
			      				<input type="text"  name="ward" placeholder="Ward" style="width: 400px;height: 25px;border-radius: 30px;outline: none;text-align: center;">

			      			 </p>
			      			 <p>
			      				
			      				<input type="text"  name="phone" placeholder="Phone" style="width: 400px;height: 25px;border-radius: 30px;outline: none;text-align: center;">

			      			 </p>
			      			
			      </div>
			      	<div class="container2">

			      			<div class="foronlydoctor">
			      				<p>
			      					<p><label style="font-size: 15px;color: white;">(Only for Doctors)</label>
			      					</p>
			      				
			      				<select required name="specialist" style="width: 400px;height: 25px;border-radius: 30px;text-align: center;">
			      					<optgroup label="select">
				      					<option value="ENT">ENT</option>
				      					<option value="Eye">Eye</option>
		              	 				<option value="Skin">Skin</option>
		              	 				<option value="Heart">Heart</option>
		              	 				<option value="Child health">Child</option>
		              	 				<option value="Woman health">Woman</option>
                                        <option value="Other">Other</option>
			      					</optgroup>
			      				</select>
			      				</p>
			      				<p>
			      					
			      					<select required name="doctorLevel" style="width: 400px;height: 25px;border-radius: 30px;text-align: center;">
			      						<optgroup label="select">
				      						<option value="junior">Junior</option>
				      						<option value="senior">Senior</option>
				      						<option value="headDoctor">Head doctor</option>
			      					</optgroup>
			      					</select>
			      				</p>
			      			</div>
			      	</div>
			      <!-- 		<div class="container4">
			      			 <div class="imageProfile">
			      			 	
			      			 	<label style="font-size: 15px;color: white;">Upload image</label>
			      			 	<p>
			                         <input type="file" name="file" style="color: white;font-weight: bold;font-size:15px;"></p>
			                         <p>
			                         <button type="submit" name="upload" style="width: 100px;height: 25px;border-radius: 30px;text-align: center;">Upload</button>
			                         </p>
			      			 	</p>
			      			 </div>
			      		</div> -->
			      		<div class="submitBtn">
	                        <p>
				      			<button type="submit" name="submit" style="width: 100px;height: 25px;border-radius:30px;">Submit</button>
				      		</p>	
			      		</div>	 
		</form>
      </div>
      <div id="nav">
    
    	<ul style="list-style-type: none;">
	        <li class="current" style="text-align: center;">
	          <br><a class="adminprofile" href="adminPANEL.php"><img src="img/adm2.png" style="height: 100px;width: 100px;"><h2 style="text-align: center;">ADMIN Profile</h2></a></li>

	          <li style="text-align: center;">
	          <br><a class="newstaff" href="newStaff.php"><img src="img/rec.png" style="height: 100px;width: 100px;margin-left: 5px;"><h2 style="text-align: center;">New Staff</h2></a></li> 

	            <li style="text-align: center;">
	          <br><a class="staffprofile" href="../testing/htmlForStaffTable.php"><img src="img/stfpro.png" style="height: 100px;width: 100px;margin-left: 5px;"><h2 style="text-align: center;">Staff List</h2></a></li>  
	       	<li style="text-align: center;">
	          	<a class="doctorprofile" href="../testing/htmlForDoctorTable.php"><img src="../HospitalManagementProject/img/stfpro.png" style="height: 100px;width: 100px;margin-left: 5px;"><h2 style="text-align: center;">Doctor List</h2></a>
	        </li>
	            <li style="text-align: center;">
	          <br><a class="PatientList" href="../testing/htmlForPatientTableForAdmin.php"><img src="img/pat.png" style="height: 100px;width: 100px;margin-left: 5px;"><h2 style="text-align: center;">Patient List</h2></a></li>
    	</ul>     
   	</div> 
</body>
</html>