	var table = document.getElementById("table");
	function getPatientId(a){
		table.rows[a].cells[5].children[0].onclick= function(){			
			var id = table.rows[a].cells[0].innerHTML;
			var nid = Number(id);
			if(id.length != 0){
				var request = new XMLHttpRequest();
				request.onreadystatechange = function() {
					if(request.readyState == 4 && request.status == 200){
						var result = JSON.parse(request.responseText);
						console.log(result);
						document.getElementById("report").hidden = false;
						document.getElementById("patientTable").hidden = true;
						var cd = new Date();
						var cy = cd.getFullYear();
						var dob = result[0].dob;
						var doby =Number(dob.slice(0,4));
						var a = cy - doby;
						document.getElementById("patientName").value = result[0].fname + result[0].mname + result[0].lname;
						document.getElementById("age").value = a;
						document.getElementById("condition").value = result[0].status;
						//document.getElementById("details").value = result[0].;
						//document.getElementById("medicine").value = result[0];
					};
				};
			};
			request.open("GET", "patientDetails.php?PID="+nid, true);
			request.send();
		};
	};
	for (var i = 1 ; i < table.rows.length; i++){
			getPatientId(i);
	};