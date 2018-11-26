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
						document.getElementById("ptId").value = result[0].pt_id;
						document.getElementById("patientName").value = result[0].fname+" " + result[0].mname+" " + result[0].lname;
						document.getElementById("age").value = a;
						document.getElementById("address").value = result[1].district +","+result[1].city+","+result[1].ward;
						document.getElementById("phone").value = result[1].phone;
						document.getElementById("bloodGrp").value = result[0].blood_grp;
						document.getElementById("gender").value = result[0].sex;
						document.getElementById("problem").value = result[0].problem;
						document.getElementById("status").value = result[0].status;
						document.getElementById("hospitalWard").value = result[0].ward_no +"/"+result[0].room_no+"/"+result[0].bed_no;




						//document.getElementById("details").value = result[0].;
						//document.getElementById("medicine").value = result[0];
					};
				};
			};
			request.open("GET", "patientDetailsForAdmin.php?PID="+nid, true);
			request.send();
		};
	};
	for (var i = 1 ; i < table.rows.length; i++){
			getPatientId(i);
	};
	// table.rows[1].onclick= function(){			
	// 		var id = this.cells[0].innerHTML;
	// 		if(id.length != 0){
	// 			var nid = Number(id);
	// 			var request = new XMLHttpRequest();
	// 			request.onreadystatechange = function() {
	// 				update.innerHTML = id;
	// 				if(request.readyState == 4 && request.status == 200){
	// 					$result = JSON.parse(request.responseText)
	// 					console.log($result);
	// 				};
	// 			};
	// 		};
	// 		request.open("GET", "patientDetailsv2.php?PID="+nid, true);
	// 		//request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// 		request.send();
	// };
	
	// for (var i = 1; i < table.rows.length ; i++) {
	// 	table.rows[i].onclick= function(){			
	// 		var id = this.cells[0].innerHTML;
	// 		if(id.length != 0){
	// 			var nid = Number(id);
	// 			var request = new XMLHttpRequest();
	// 			request.onreadystatechange = function() {
	// 				update.innerHTML = id;
	// 				if(request.readyState == 4 && request.status == 200){
	// 					$result = JSON.parse(request.responseText)
	// 					console.log($result);
	// 				};
	// 			};
	// 		};
	// 		request.open("GET", "patientDetailsv2.php?PID="+nid, true);
	// 		//request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// 		request.send();
	// 	};
	// }
		
	// function postRequest(x){
	// 	if(x.length != 0){
			
	// 		//var idObj = {"patientID":x};
	// 		//var idParam = JSON.stringify(idObj);
	// 		//console.log(idParam);
	// 		//console.log(validateJSON(idParam));
	// 		//jsObject = JSON.parse(idParam);
	// 		//console.log(jsObject);
	// 		var request = new XMLHttpRequest();
	// 		request.onreadystatechange = function() {
	// 			update.innerHTML = x;
	// 			if(request.readyState == 4 && request.status == 200){
	// 				try{
	// 					JSON.parse(request.responseText);
	// 				} catch (e){
	// 					return console.log(false);
	// 				}
	// 				return console.log(true);
	// 			};
	// 		};
	// 		request.open("GET", "patientDetails.php?PID="+x, true);
	// 		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// 		request.send();
	// 	};
	// }

	// function postRequest(x){
	// 	if(x.length != 0){
			
	// 		var idObj = {"patientID":x};
	// 		var idParam = JSON.stringify(idObj);
	// 		var request = new XMLHttpRequest();
	// 		request.onreadystatechange = function(){
	// 			update.innerHTML = x;
	// 			if(request.readyState == 4 && request.status == 200){
	// 				jsObject = JSON.parse(request.responseText);
	// 				console.log(jsObject);
	// 			};
	// 		};
	// 		request.open("POST" , "patientDetails.php", true);
	// 		request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	// 		request.send("PID = " + idParam);
	// 	};
	// }
	// function getPatientId(a){
	// 	table.rows[a].cells[5].children[0].onclick= function(){			
	// 		id = table.rows[a].cells[0].innerHTML;
	// 		postRequest(id);
	// 	};
	// };
	// for (var i = 1 ; i < table.rows.length; i++){
	// 		getPatientId(i);
	// };




