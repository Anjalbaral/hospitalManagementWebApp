<?php
//Variables to connect with database
		$dbHost = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName = "hospitalmanagerworkingcopy5";
//Connecting to database
		$connection = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			$error['databaseConnectionError'] = 'DataBase is unable to be connected.';
			echo "{$error['databaseConnectionError']}";
			die();
		}
?>		