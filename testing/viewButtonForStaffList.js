	var table = document.getElementById("table");
	function getStaffId(a){
		table.rows[a].cells[5].children[0].onclick= function(){			
			var id = table.rows[a].cells[0].innerHTML;
			var un = table.rows[a].cells[1].innerHTML;
			var nid = Number(id);
			if(id.length != 0){
				var request = new XMLHttpRequest();
				request.onreadystatechange = function() {
					if(request.readyState == 4 && request.status == 200){
						var result = JSON.parse(request.responseText);
						console.log(result);
						document.getElementById("staffProfile").hidden = false;
						document.getElementById("staffTable").hidden = true;
						document.getElementById("jobTitle").value = result[3].post+"("+result[3].qualification+")";
						document.getElementById("uname").value = result[2].uname;
						document.getElementById("email").value = result[2].email;
						document.getElementById("staffName").value = result[0].fname +" "+result[0].mname +" "+ result[0].lname;
						var cd = new Date();
						var cy = cd.getFullYear();
						var dob = result[0].dob;
						var doby =Number(dob.slice(0,4));
						var a = cy - doby;
						document.getElementById("age").value = a;
						document.getElementById("address").value = result[1].district +","+ result[1].city +","+ result[1].ward;
						document.getElementById("phone").value = result[1].phone;

					};	
				};
			};
			request.open("GET", "staffDetails.php?SID="+nid+"&SUN="+un, true);
			request.send();
		};
	};
	for (var i = 1 ; i < table.rows.length; i++){
			getStaffId(i);
	};