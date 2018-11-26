	function myTrim(x) {
    	return x.replace(/^\s+|\s+$/gm,'');
	}
	
	var rTable = document.getElementById("reportList");
	var id  = window.location.hash.substring(1);
	var pid = myTrim(id);

	function loadReportTable(){
			if(pid.length != 0){
				var request = new XMLHttpRequest();
				request.onreadystatechange = function() {
					if(request.readyState == 4 && request.status == 200){
						var result = JSON.parse(request.responseText);
						console.log(result);
						document.getElementById("reportListHeading").innerHTML = result[0].fname+" "+result[0].mname+" "+result[0].lname+" "+result[0].pt_id;
						var cr = document.createElement("tr");
						var cd0  = document.createElement("th");
						var cd1  = document.createElement("th");
						var cd2  = document.createElement("th");
						var cd3  = document.createElement("th");
						var tn4 = document.createTextNode("Patient ID");
						var tn5 = document.createTextNode("Report No");
						var tn6 = document.createTextNode("Date");
						var tn7 = document.createTextNode("View Report");
						cd0.appendChild(tn4);
						cd1.appendChild(tn5);
						cd2.appendChild(tn6);
						cd3.appendChild(tn7);
						cr.appendChild(cd0);
						cr.appendChild(cd1);
						cr.appendChild(cd2);
						cr.appendChild(cd3);
						rTable.appendChild(cr);
						for(var i = 2 ; i< result.length ; i++ ) {
							var childRow = document.createElement("tr");
							var childData0 = document.createElement("td");
							var childData1 = document.createElement("td");
							var childData2 = document.createElement("td");
							var childData3 = document.createElement("td");
							var childButton = document.createElement("button");
							childButton.setAttribute("class","viewButton");
							childButton.setAttribute("type","button");
							//childButton.setAttribute("onclick","viewDetailReport()");
							var tn0 = document.createTextNode(result[i].pt_id);
							var tn1 = document.createTextNode(result[i].report_no);
							var tn2 = document.createTextNode(result[i].date);
							var tn3 = document.createTextNode("View Report");
							childData0.appendChild(tn0);
							childData1.appendChild(tn1);
							childData2.appendChild(tn2);
							childButton.appendChild(tn3);
							childData3.appendChild(childButton);
							childRow.appendChild(childData0);
							childRow.appendChild(childData1);
							childRow.appendChild(childData2);
							childRow.appendChild(childData3);
							rTable.appendChild(childRow);
						}
						for (var i = 1 ; i < rTable.rows.length; i++){
							getPatientId(i);
						};
					};
				};
			};
			request.open("GET", "patientDetails.php?PID="+pid, true);
			request.send();
			

	};

	function getPatientId(a){
		rTable.rows[a].cells[3].children[0].onclick= function(){			
			var rid = rTable.rows[a].cells[1].innerHTML;
			var nrid = Number(rid);
			var srid = String(rid);
			//window.alert(srid);
			window.location.href = "htmlForPatientTable(3).php"+"#"+srid;
		};
	};

	

	function createReport(){
		window.location.href = "htmlForPatientTable(4).php"+"#"+pid;
		//window.alert(pid);
	}



	// function viewDetailReport(){
	// 	for (var i = 1 ; i < rTable.rows.length; i++){
	// 		var rid = rTable.rows[i].cells[1].innerHTML;
	// 		var nrid = Number(rid);
	// 		var srid = String(rid);
	// 		window.location.href = "htmlForPatientTable(3).php"+"#"+srid;
	// 	};	
	// }

	// function getReportId(a){
	// 	//rTable.rows[a].cells[3].children[0].onclick= function(){			
	// 		var rid = rTable.rows[a].cells[1].innerHTML;
	// 		var nrid = Number(rid);
	// 		var srid = String(rid);
	// 		window.alert(srid);
	// 		//window.location.href = "htmlForPatientTable(3).php"+"#"+srid;
	// 	//};
	// };

	// function viewDetailReport(){
	// 	for (var i = 1 ; i < rTable.rows.length; i++){
	// 		getReportId(i);
	// 	};	
	// }
	


	
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




