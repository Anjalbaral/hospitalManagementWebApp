<!DOCTYPE html>
<html>
<head>
	<title>search here</title>
	<link href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="jq.js"></script>
	<style type="text/css">
		body
		{	
			margin: 0;
			font-family: 'Graduate', cursive;
		}
		.table1{
			overflow-y: scroll;
		}
	</style>
</head>
<body style="background: url('../img/bacca2.png') repeat;">
	 <div style="background:#b0c9f2;opacity: 0.8;height:1000px;">
	 		<a href="../../testing/logout.php">
        		<img class="logout-icon" src="../img/logout33.png" style="width: 50px;height:50px;margin-left:1200px;margin-top: 10px;">
      		</a>
	<h2 style="text-align: center;color:black;">Search by patient Details</h2>
	
	<div style="text-align: center;">
	<input class="form-control" type="text" name="search-box" style="width: 700px;height: 30px;box-shadow:3px 3px 30px; ">
    </div>
	    <br />

	    <div style="background:white;width: 55%;margin-left: 300px;box-shadow: 3px 3px 30px;opacity: 0.8;text-align: center;padding-left: 10px;">
		   <div id="result" style=""></div>
	     </div>
        </div> 

	<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetchData.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('.form-control').keyup(function(){
		//The val() method returns or sets the value attribute of the selected elements.
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>

</script>
</body>
</html>