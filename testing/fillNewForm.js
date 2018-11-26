function myTrim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}
	function fillNewReport(){
			var pid  = window.location.hash.substring(1);
			if(pid.length != 0){
				var request = new XMLHttpRequest();
				request.onreadystatechange = function() {
					if(request.readyState == 4 && request.status == 200){
						var result = JSON.parse(request.responseText);
						console.log(result);
						document.getElementById("patientId").value = result[0].pt_id;
						document.getElementById("patientName").value = result[0].fname+" "+result[0].mname+" "+result[0].lname;
						var dob = result[0].dob;
						var doby = dob.slice(0,4);
						var cd = new Date();
						var cdy = cd.getFullYear();
						var a = Number(cdy) - Number(doby);
						document.getElementById("age").value = a;
					};
				};
			};
			request.open("GET", "patientDetails.php?PID="+pid, true);
			request.send();

	};
