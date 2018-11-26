<?php
	include 'includeConnectDatabase.php';
	$id = $_REQUEST["PID"];
	$result = mysqli_query($connection," SELECT * from patient WHERE pt_id = $id ");
	while ($row = mysqli_fetch_assoc($result)){
		$arr[] = $row;
	}
	mysqli_free_result($result);
	mysqli_close($connection);
	echo json_encode($arr);
?>	