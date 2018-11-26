<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="css/Responsive/homepagecss.css" media="screen and (min-width: 0px)">
   <link href="https://fonts.googleapis.com/css?family=MedievalSharp" rel="stylesheet">	
   <link href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">
   <style type="text/css">
   	.about
   	{
   		font-family:'arial' ,'MedievalSharp' ,'cursive';
   	}
   	.about button:hover
   	{
   		background: lightblue;
   	}
   </style>
</head>
<body>
	<div class="mainSection">
		<div class="Logo">
			   			<!--<h3 style="margin-top: 50px;float: left;font-size:15px;margin-left: 20px;font-weight: bold;color: white;">Hospital</h3>-->
			   			<a href="hospFIRSTv2.php"><img style="width:200px;height:90px;margin-top:10px;" src="img/log2.png" /></a>
			   			<!--<h3 style="margin-top: 50px;float:right;font-size: 15px;margin-right:25px;color: white;">manager</h3>-->
			   			<!--<h2 style="font-size: 20px;margin-top: -70px;"><span style="color: #cccccc" >Hospital</span><br> Manager</h2>-->
		</div>
			   
			   	<div class="navBar1">

							   			<div class="ab1">
							   				<h3 style="height: 30px;width: 108%;padding-top: 15px;">
							   				<a href="about.php" class="About" style="text-decoration:none;color: white;font-weight:bold;">About</a>
							   			     </h3>
							   			</div>

							   			<div  class="ab2">	
							   				<h3 style="height: 30px;width: 108%;padding-top: 15px;"><a href="receptionist.php" class="AddStaff"  style="text-decoration:none;color: white;font-weight:bold;">Add Patient</a>
							   				</h3>
							   			</div>
							   			<div class="ab3">
							   			    <h3 style="height: 30px;width: 108%;padding-top: 15px;">	
							   				<a href="#contacts" class="Contact" style="text-decoration: none;color: white;font-weight:bold;">Contact</a></h3>
							   			</div>
							   			<div class="ab4">
							   			<h3 style="height: 30px;width: 108%;padding-top: 15px;">
							   				<a href="hospFIRSTv2.php" class="Home" style="text-decoration: none;color: white;font-weight:bold;">Home</a>
							   			</h3>
							   			</div>	
							   			<div class="ab5">
							   				<h3 style="height: 30px;width: 108%;padding-top: 15px;">
							   				<a href="search.php" class="About" style="text-decoration:none;color: white;font-weight:bold;">Search</a>
							   			     </h3>
							   			</div>
							   			</div>
			   
			  
    </div>			   
   <div class="midSection">
   	                 
               
   	                 <div class="w3-content w3-display-container" >
                        
						<div class="w3-display-container mySlides" id="slide1">	
						  <img src="img/1.jpg">
						 <div >
						 	<h2>Welcome to Hospital Website. Know about Hospital manager.</h2>
                            <br><a href="about.php">
                           		<button style=" width: 100px;height: 40px;border-radius: 10px;border:none;background:lightblue;float: left;display: block;margin-left: 100px;">About Us</button>
                       		</a>

						 </div>
						</div>
						<div class="w3-display-container mySlides" id="slide2">
						  <img src="img/img5.png">
						 
						 <div>
						 	<h2>Contact us for health serivces.</h2>
                            <br>
                            <a href="#contacts">
                           <button style="width: 100px;height: 40px;border-radius: 10px;border:none;background:lightblue;">Contact us!!</button>
                       		</a>

						 </div>
						</div>

						<div class="w3-display-container mySlides" id="slide3">
						  <img src="img/img2.jpg" style="">
						 
						 <div ><h2>We have highly qualified medical personnels and doctor.</h2>
                            <br>
                          

						 </div>
						</div>

						<div class="w3-display-container mySlides" id="slide4">
						  <img src="img/hosp.jpg" >
						  
						  <div><h2>We have Highly qualified doctors and Staff.</h2>
						</div>
                       </div>
						

						<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)" id="backBtn";>&#10094;</button>
							<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)" id="frontBtn";>&#10095;</button>
                 </div>
                 <script>

					var slideIndex = 1;
					showDivs(slideIndex);

					function plusDivs(n) {
					  showDivs(slideIndex += n);
					}

					function showDivs(n) {
					  var i;
					  var x = document.getElementsByClassName("mySlides");
					  if (n > x.length) {slideIndex = 1}    
					  if (n < 1) {slideIndex = x.length}
					  for (i = 0; i < x.length; i++) {
					     x[i].style.display = "none"; 
					     x[i].style.transition
					  }
					  x[slideIndex-1].style.display = "block"; 
					  

					}
					</script>
		          
				   	<div class="PanelOptions">
                       
				   	</div>
				  
		     <section class="differentOptions">
				     	
								     	<div class="firstResp1" >
								          <a href="admin.php" class="tooltip">  <img src="img/fin3.png" style="height: 200px;width: 200px;"></a>
								          <br>
								          <div class="admindiv">
								          	<h3><span style="font-weight: bold;font-size: 20px;">Admin</span><br>
		                                      <h3 class="adminab">
		                                      	this is admin panel.only admin can go and login  here
		                                      </h3>
								          	</h3>
								          </div>
								     	</div>
								     	
								     	<div class="firstResp2" style="" >
								     	<a href="receptionist.php" class="tooltip1">	<img src="img/fin2.png" style="width: 200px;height: 200px;">
								     	</a>
								     	 <br>
								          <div class="receptionistdiv">
								          	<h3><span style="font-weight: bold;font-size: 20px;">Receptionist</span><br>
		                                      <h3 class="adminab">
		                                      	this is receptionist panel.only receptionist can go and login  here
		                                      </h3>
								          	</h3>
								          </div>

								     	</div>
								     	 
								     	<div class="firstResp3" style="">
								     		
								     		<a href="doctor.php" class="tooltip2"><img src="img/fin1.png" style="width: 200px;height: 200px;"> </a>
								     		 <br>
								          <div class="doctordiv">
								          	<h3><span style="font-weight: bold;font-size: 20px;">Doctor</span><br>
		                                      <h3 class="adminab">
		                                      	This is Doctor panel.Only doctor can go and login  here
		                                      </h3>
								          	</h3>
								          </div>
								          
								     	</div>
					 </section>
								     </div>
								     <div class="contacts" id="contacts">
								     	<div class="line">
								     	</div>
								     	<div class="contactDetails">
								     		     <div  class="con1">
										     		<h2>CONTACT DETAILS</h2><br>
										     		<h3>contact number:+977 9816178429</h3><br>
										     		<h3>help Line:+977 9816178429</h3><br>
										     		<h3>Location:lamachowr Pokhara,Nepal</h3>
										     	</div>
										     	<div class="con2" ></div>
								     	            <div class="others" >
								     	            	<h2>E-mail</h2>
								     	            	<br>
								     	            	<h3>anjalbaral7@gmail.com</h3>
								     	            	<br>
								     	            	<h3>sackhyamGurung1@gmail.com</h3>
								     	            	<br>
								     	            	<h3>post no:7373</h3>
								     	            </div>
								     	</div>
								     	<div class="line2">
								     	</div>

								     </div>
						     
		    
 <footer class="foot" style="height: 100px;">
 	<h3>Copyright &copy; Hospital Manager</h3>

 </footer>

	  
</body>
</html>