<!DOCTYPE html>
<html>
<head>
	<title>Receptionist</title>
	<link rel="stylesheet" type="text/css" href="css/receptionistloginsystem.css">
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">
</head>
<body background="img/back1.png">
<header>
	<div class="container">
  
		<h2 class="texts">
			Receptionist Panel
		</h2>
	</div>
</header>
      
     <section class="login-panel">
      <div class="submit">
     		<img src="img/fin2.png" class="receptionist-icon">
     		<form method="POST" action="../testing/verifyReceptionist.php">
     			<div class="user">
     			<label class="label1" style="text-align: right;">Name:</label>
     			 <input type="text" name="recep-name" placeholder="Username" class="input1" style="padding-left: 4px;">
     			</div>
     			<div class="user">
     			 <label class="label2" style="text-align: right;">Password:</label>
           <input type="password" name="recep-password" placeholder="Password" class="input2" style="padding-left: 4px;">
     			</div>
     			<div class="user">
     			 <input type="submit" name="submit" value="login" class="login-btn">
     			</div>
     		</form>
     	</div>
     </section>

<footer>
</footer>

</body>
</html>