	var table = document.getElementById("table");

	function getPatientId(a){
		table.rows[a].cells[5].children[0].onclick= function(){			
			var id = table.rows[a].cells[0].innerHTML;
			var nid = Number(id);
			var sid = String(id);
			window.location.href = "htmlForPatientTable(2).php"+"#"+sid;
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




