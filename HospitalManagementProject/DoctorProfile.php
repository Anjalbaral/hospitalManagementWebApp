<?php 
  session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>doctorPanel</title>
   <link href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/doctorpanel2.css">
</head>
<body>

   <div id="nav">
    
      <ul style="list-style-type: none;">
        <li style="font-size: 30px;font-weight:bold;"><?php 
                    echo "Welcome";
                    echo "<br>";
                    echo $_SESSION['doctorUsername'];
                    echo "<br>";
                    echo "Id:".$_SESSION['doctorId']; 
              ?>
                
         </li>
        <li class="current" style="text-align: center;">
          <br><a class="doctorprofile" href="doctorProfile.php"><img src="img/adm2.png" style="height: 100px;width: 100px;"><h2 style="text-align: center;">DOCTOR Profile</h2></a></li>

        <li style="text-align: center;" class="current3">
          <br><a class="PatientList" href="../testing/htmlForPatientTable(1).php"><img src="img/pat.png" style="height: 100px;width: 100px;margin-left: 5px;"><h2 style="text-align: center;">Patient Table</h2></a></li>
          </ul>
  
    </div> 
    
  <div class="main-section" style="float:right;background:#2d353a;width: 800px;height: 600px;margin-top:-650px;margin-right:190px;opacity: 0.9;border-radius: 30px;text-align: center;">
      <a href="../testing/logout.php">
        <img class="logout-icon" src="img/logout33.png" style="width: 50px;height:50px;margin-left:900px;margin-top: 15px;">
      </a>
      <h2 style="color: white;font-weight: bold;">Doctor Profile</h2>
      <div class="formSection">
        <img src="img/fin1.png" style="width: 150px;height: 150px;">
        <form method="post" action="adminPANEL.php">
          <p>
            <h3 style="color: white;font-weight: bold;" >ID:<?php echo $_SESSION['doctorId']; ?></h3>
          
         </p>
          <p>
            <h3 style="color: white;font-weight: bold;" >Name:<?php echo $_SESSION['doctorName']; ?></h3>
          
         </p>
           <p>
            <h3 style="color: white;font-weight: bold;" >Email:<?php echo $_SESSION['doctorEmail']; ?></h3>
          
         </p>
          <p>
            <h3 style="color: white;font-weight: bold;" >Address:<?php echo $_SESSION['doctorAddress'] ?></h3>
          
         </p>
        </form>
        
      </div>
    </div>


</body>
</html>
