<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin panel</title>
  <link href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
<style type="text/css">
	 span{
     text-align: right;
      margin-left: 25px;
     color: rgb(73, 100, 209);
     font-size: 20px;
   }
</style>
       <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="css/AdminHomeCss2.css">

</head>
<body background="img/trelloback3.png">
   
    <div class="main-section" style="float:right;background:#2d353a;width: 900px;height: 700px;margin-top: 110px;margin-right: 100px;opacity: 0.9;border-radius: 30px;text-align: center;">
      <a href="../testing/logout.php">
            <img class="logout-icon" src="../HospitalManagementProject/img/logout33.png" style="width: 50px;height:50px;margin-left:900px;margin-top: -980px;">
          </a>
      <h2 style="color: white;font-weight: bold;">Admin Profile</h2>
      <div class="formSection">
        <img src="img/fin3.png" style="width: 150px;height: 150px;">
        <label><h2 style="color: white;font-size: x-large;">Name:<span><?php if (isset($_SESSION['adminName'])) {echo $_SESSION['adminName'];}?></span></h2></label>
        <label><h2 style="color: white;font-size: x-large;">Username:<span><?php if (isset($_SESSION['adminUsername'])) {echo $_SESSION['adminUsername'];}?></span></h2></label>
        <label><h2 style="color: white;font-size: x-large;">Email:<span><?php if (isset($_SESSION['adminEmail'])) {echo $_SESSION['adminEmail'];}?></span></h2></label>

          
      </div>
    </div>

   	 <div id="nav">
    
      <ul style="list-style-type: none;">
        
   	 	      <!--<h3 style="font-weight: bold;font-size:25px;" >
         			<?php
                  echo"Welcome<br> ".$_SESSION['adminname'];
         			?>
         		</h3>-->
        
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
 
   	</div> 

</body>
</html>