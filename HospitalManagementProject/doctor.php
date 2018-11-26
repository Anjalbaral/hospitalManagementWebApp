<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet" type="text/css" href="css/doctorcss.css">
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
</head>
<body background="img/back1.png">
<header>
	<div class="container">
		<h2 class="texts">
			Doctor Panel 
		</h2>
	</div>
</header>
     <section class="login-panel">
     	<div class="submit">
     		<img src="img/fin1.png" class="doctor-icon">
     		<form method="POST" action="../testing/verifyDoctor.php">
     			<div class="user">
     			<label class="label1" style="text-align: right">Name:</label>
     			 <input type="text" name="doctor-name" placeholder="Username" class="input1" style="padding-left: 4px;">
     			</div>
     			<div class="user">
     			 <label class="label2" style="text-align: right">Password:</label>
            <input type="password" name="doctor-password" placeholder="Password" class="input2" style="padding-left: 4px;">
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