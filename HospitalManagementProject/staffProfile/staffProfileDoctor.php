<!DOCTYPE html>
<html>
<head>
	<title>staffProfileDoctor</title>
</head>
<body>
    
   <header>
		 <h2>update Doctor profile</h2>
		 <div class="line" style="width: 600px;height: 1px;background:black;">
		 	
		 </div>
	</header>
      
      <section>
			<form method="POST" action="upload/submitted.php" enctype="multipart/form-data">
			      <div class="container1">
			      		<h3>(make Change)</h3>
			      			<p>
			      			<label>Doctor ID:</label>
			      			<input type="text" name="staffid" placeholder="ID">
			      		    </p>
			      		    <p>
			      			<label>First Name:</label>
			      			<input type="text" name="firstname" placeholder="firstname">
			      		    </p>
			      			<p>
			      			<label>Last Name:</label>
			      			<input type="text" name="Last Name">
			      			
			                </p>
			                 <p>
			      			<label>age:</label>
			      			<input type="text" name="AGE" placeholder="age">
			      			

			      		    </p>
			                <p>
			      			<label>Maritial Status:
			      			</label>
			      			<select>
			      				<option value="select">select</option>
			      				<option value="single">single</option>
			      				<option value="married">married</option>
			      			
			      			</select>
			      			</p>
			      			<p>
			      				<label>Gender</label>
			      				<select>
			      					<option value="select">select</option>
			      					<option value="male">
			      						male
			      					</option>
			      					<option value="female">female</option>
			      					<option value="others">others</option>
			      				</select>
			      			</p>
			      			
			      			<p>
			      				<label>Date:</label>
			      				<input type="text" placeholder="date">
			      			</p>
			      			<p>
			      			<label>Address:</label>
			      			<input type="text" name="Address">
			      		    </p>
			      			 <p>
			      				<label>city:</label>
			      				<input type="text" name="city">

			      			 </p>
			      			 <p>
			      				<label>phone:</label>
			      				<input type="text" name="phone">

			      			 </p>
			      			 <p>
			      				<label>staff type:</label>
			      				<select>
			      					<option value="select">select</option>
			      					<option value="dotor">doctor</option>
			      					<option value="receptionist">
			      						receptionist
			      					</option>
			      					<option value="admin">
			      						admin
			      					</option>
			      					<option value="pharmist">
			      						pharmist
			      					</option>
			      				</select>
			      			</p>
			      	</div>
			      	<div class="container2">	
			      	     <div class="line" style="width: 600px;height: 1px;background: black;"></div>

			      			<div class="foronlydoctor"><p>
			      				<p>
			      				<label>Doctor type:</label>

			      				<select>
			      					<option value="select">
			      						select
			      					</option>
			      					<option value="skin">
			      						skin
			      					</option>
			      					<option value="heart">
			      						heart
			      					</option>
			      					<option value="teeth">
			      						teeth
			      					</option>
			      				</select>
			      				</p>
			      				<p>
			      					<label>Academics:</label>
			      					<input type="text" name="academics">
			      				</p>
			      				<p>
			      					<label>
			      						Level:
			      					</label>
			      					<select>
			      						<option value="select">
			      							select
			      						</option>
			      						<option value="junior">
			      							junior
			      						</option>
			      						<option value="senior">
			      							senior
			      						</option>
			      						<option value="headDoctor">
			      							head doctor
			      						</option>
			      					</select>
			      				</p>
			      			</div>
			      			<div class="line4" style="width: 600px;height:1px;background:black;">
			      				
			      			</div>
			      			<p>
			      			<div class="imageDoc">
			      				<input type="file" name="file">
			      				<button type="submit" value="submit">attach</button>
			      		
			      			</div>
			      		    </p>
			      			<p>
			      				<div style="width: 600px;height: 1px;background:black;"></div>
			      			</p>
			      				<p>
			      			<div>
			      				<button type="submit" >Update</button>
			      			</div>
			      		    </p>
			      	</form>
			   </section>	

</body>
</html>