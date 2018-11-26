<?php
$connect =mysqli_connect("localhost", "root","","hospitalmanagerworkingcopy5");
 $output = '';
 if(isset($_POST["query"]))
 {
 	$search = mysqli_real_escape_string($connect, $_POST["query"]);


 	$query = " SELECT p.pt_id , CONCAT(p.fname,' ',p.mname,' ',p.lname) AS Name , CONCAT(pc.district,',',pc.city,',',pc.ward) AS Address , p.status , p.problem , CONCAT(p.ward_no,'/',p.room_no,'/',p.bed_no) AS Ward FROM patient AS p NATURAL JOIN patient_contact AS pc WHERE p.fname LIKE '%".$search."%' OR p.mname LIKE '%".$search."%' OR p.lname LIKE '%".$search."%' OR pc.district LIKE '%".$search."%' OR pc.city LIKE '%".$search."%' OR pc.ward LIKE '%".$search."%' OR p.bed_no LIKE '%".$search."%' OR p.room_no LIKE '%".$search."%' OR p.ward_no LIKE '%".$search."%' ORDER BY p.fname ASC , p.mname ASC , p.lname ASC ";
 }
 else
{
	$query = "
	SELECT p.pt_id , CONCAT(p.fname,' ',p.mname,' ',p.lname) AS Name , CONCAT(pc.district,',',pc.city,',',pc.ward) AS Address , p.status , p.problem , CONCAT(p.ward_no,'/',p.room_no,'/',p.bed_no) AS Ward FROM patient AS p NATURAL JOIN patient_contact AS pc ORDER BY p.fname ASC , p.lname ASC ";
}

$finalQuery = mysqli_query($connect,$query);

if(mysqli_num_rows($finalQuery)>0)
{

	$output .= '<div class="table-responsive" style="text-align:center;">
					<table class="table1">
						<tr style="font-size:20px;">
							<th>Patient ID</th>
							<th>Patient Name</th>
							<th>Address</th>
							<th>Status</th>
							<th>Problem</th>
							<th>Ward Number</th>
						</tr>';

		while($row = mysqli_fetch_array($finalQuery))
	    {
			$output .= '
			<tr>
			    <td>'.$row["pt_id"].'</td>
				<td>'.$row["Name"].'</td>
				<td>'.$row["Address"].'</td>
				<td>'.$row["status"].'</td>
				<td>'.$row["problem"].'</td>
				<td>'.$row["Ward"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}

?>