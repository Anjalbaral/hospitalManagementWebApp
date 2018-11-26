<?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="hospitalmanagerworkingcopy5";

$con=mysqli_connect($host,$user,$password,$db);

if(!$con)
{
     echo"error to connect to server";
     die();
}


if(isset($_POST['submit']))
{

$staff_name=mysqli_real_escape_string($con,$_POST['staffName']);
$staff_pass=mysqli_real_escape_string($con,$_POST['staffPassword']);

  if(empty($staff_name) || empty($staff_pass))
  {
     //$msg="fill properly";
    // echo"fill properly";
  }
  else{
      $sql3=" SELECT * FROM admin_login  WHERE uname='$staff_name'" ;
      $sql=" SELECT * FROM doctor_login WHERE uname='$staff_name'";
      $sql2=" SELECT * FROM staff_login WHERE uname='$staff_name'" ;
     
     $result=mysqli_query($con,$sql);
     $result2=mysqli_query($con,$sql2);
     $result3=mysqli_query($con,$sql3);

     $row = mysqli_fetch_assoc($result);
     $row2 = mysqli_fetch_assoc($result2);
     $row3 = mysqli_fetch_assoc($result3);

     if(password_verify($staff_pass,$row['password'])){
      $_SESSION['staffuname']=$staff_name;
      header("Location:ajaxLiveSearch/searchAjax.php");
     }
     else if(password_verify($staff_pass,$row2['password'])){
      $_SESSION['staffuname']=$staff_name;
      header("Location:ajaxLiveSearch/searchAjax.php");
     }
     else if(password_verify($staff_pass,$row3['password'])){
      $_SESSION['staffuname']=$staff_name;
      header("Location:ajaxLiveSearch/searchAjax.php");
     }
     else {
      //header("Location:ajaxLiveSearch/searchAjax.php");
      header("Location: search.php");
     }
}
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>SearchLogin</title>
	<link rel="stylesheet" type="text/css" href="css/searchLogin.css">
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">
</head>
<body background="img/back1.png">
<header style="opacity: 0.8;">
	<div class="container">
		<h2 class="texts" style="color: white;font-weight: bold;">
			Login As Staff
		</h2>
	</div>
</header>
     <section class="login-panel">
     	<div class="submit">
     		<img src="img/fin2.png" class="doctor-icon">
     		<form class="frm" method="POST" action="search.php" onsubmit="return validation()">
     			<div class="user">
     			<label class="label1" style="font-weight: bold;color: white;">User Name:</label>
     			 <input type="text" required name="staffName" placeholder=" " class="input1" id="staffname">
           <span id="nameRes"></span>
          <h3 id="nameres"></h3>
     			</div>
     			<div class="user">
     			 <p><label class="label2" style="font-weight: bold;color: white;">Password: </label>
            <input type="password" required name="staffPassword" class="input2" id="staffPass"></p>
           <span id="passRes"></span>
     			</div>
     			<div class="user">
     			 <p><input type="submit" name="submit" value="login" class="login-btn"></p>
     			</div>
     		</form>
     		
     	</div>
     </section>

<footer>
</footer>

  <script type="text/javascript">
      /*var name=document.getElementById("staffname");
      var pass=document.getElementById("staffPass");

      if(name.length()<2 || name.length()=0)
      {
        document.getElementById("nameres").innerHTML="invalid name!!";
      }
 
//form validation
  function validation()
{
  var check =true;
  var name = document.frm.staffName.value;
  alert(name);
  var password=document.getElementById("staffpass").value;
  
  if(name == "")
  {
    check = false;
    document.getElementById("nameRes").innerHTML="<br>**fill name";
  }
  else
    document.getElementById("nameRes").innerHTML="";
  

  if(name.length<=2 || name.length>20)
  {
    check = false;
    document.getElementById("nameRes").innerHTML="<br>**invalid name length";
  }

  if(!isNaN(name))
  {
    check = false;
    document.getElementById("nameRes").innerHTML="<br>**number is not allowed";
  }

  if(password == "")
  {
    check = false;
   document.getElementById("passRes").innerHTML="**fill password";
    return false;
  }
  else
    document.getElementById("passRes").innerHTML="";
   
   if(password<5 && password>20)
   {
    check = false;
    document.getElementById("passRes").innerHTML="**pnvlid password size";
   }
   return check;
}*/
</script>

</body>
</html>