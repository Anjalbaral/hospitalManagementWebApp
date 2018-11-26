<!DOCTYPE html>
<html>
	<head>
	  <title>admin</title>
	  <link rel="stylesheet" type="text/css" href="css/adminCSS.css">
	  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

	  <style>
	  .errordata
	  {
	    color: white;
	  }
	</style>

	</head>
	<body  background="img/back1.png">
	<header>
	  <div class="container">
	    <h2 class="texts">
	      Admin Panel 
	    </h2>
	  </div>
	</header>
	     <section class="login-panel">
	      <div class="submit">
	        <img src="img/fin3.png" class="admin-icon">
	        <form method="POST" action="../testing/verifyAdmin.php">
	          <div class="user">
	          <label class="label1" style="text-align: right">Name:</label>
	           <input type="text" name="admin-name" placeholder="Username" class="input1" style="padding-left: 4px;">
	          </div>
	          <div class="user">
	           <label class="label2" style="text-align: right">Password:</label>
	           	<input type="password" name="admin-password" placeholder="Password" class="input2" style="padding-left: 4px;">
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