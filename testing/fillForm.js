function myTrim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}
var rid  = myTrim(window.location.hash.substring(1));
	function fillReport(){
			
			if(rid.length != 0){
				var request = new XMLHttpRequest();
				request.onreadystatechange = function() {
					if(request.readyState == 4 && request.status == 200){
						var result = JSON.parse(request.responseText);
						console.log(result);
						document.getElementById("condition").value = result[2].status;
						document.getElementById("problem").value = result[2].problem;
						document.getElementById("reportNo").value = result[0].report_no;
						document.getElementById("bloodGrp").value = result[2].blood_grp;
						document.getElementById("sugarLvl").value = result[1].sugar_lvl;
						document.getElementById("bp").value = result[1].bp;
						document.getElementById("weight").value = result[1].weight;
						document.getElementById("details").value = result[1].health_note;
						document.getElementById("medicine").value = result[1].medicine;
						document.getElementById("patientName").value = result[2].fname+" "+result[2].mname+" "+result[2].lname;
						var dob = result[2].dob;
						var doby = dob.slice(0,4);
						var cd = new Date();
						var cdy = cd.getFullYear();
						var a = Number(cdy) - Number(doby);
						document.getElementById("age").value = a;
					};
				};
			};
			request.open("GET", "reportDetails.php?PRID="+rid, true);
			request.send();

	};
