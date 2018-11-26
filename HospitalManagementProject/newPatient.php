<?php 

       session_start();

 ?>
<!DOCTYPE html>
<html>
       <head>
       	<title>New Patient</title>
              <link href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">
       </head>
       <body style="font-family: 'Graduate', 'arial','cursive';background:url('img/backs.png')" onload="dynamicOption();">
          <!--     <div style="color:rgb(255, 81, 81);position: absolute;left:650px;">
                     <h4>
                            <?php
                                   // if (isset($_SESSION['newAdmission'])) {
                                   //        echo $_SESSION['newAdmission'];
                                   // }
                              
                                   // unset($_SESSION['newAdmission']);
                            ?>
                     </h4>
              </div> -->

              <header style="height:70px;width: 102%;background:#35424a;opacity: 0.7;margin-left: -10px;margin-top: -10px;text-align: center;padding-top: 10px;">

                     <h3 style="font-size: 30px;font-weight: bold;margin-top: 0px;color: white;">Add New Patient</h3>
                     <a href="../testing/logout.php">
                            <img class="logout-icon" src="../HospitalManagementProject/img/logout33.png" style="width: 70px;height:70px;margin-left:1100px;margin-top: 10px;">
                     </a>
              </header>

              <section style="background:rgba(53,66,74,0.6);max-width: 35%;margin-left: 350px;max-height: 1400px;padding-top: 10px;margin-top: 70px;padding-left: 30px;border-radius: 30px;padding-bottom: 10px;">
                      <div class="form">
              	 	<form class="frm" method="POST" onsubmit="return validation()" action="../testing/preparedSqlForNewPatient.php">
              	 		
              	 		<p>
              	 			<input type="text" required name="firstName" placeholder="   First Name" style="border-radius: 20px;width: 400px;height: 30px;text-align: center;">
                                          <p name="fname"></p>
              	 		</p>
                                   <p>
                                          
                                          <input type="text" required name="middleName" placeholder="   Middle Name" style="border-radius: 20px;width: 400px;height: 30px;text-align: center;">
                                          <p name="mname"></p>
                                   </p>
                                   <p>
                                          
                                          <input type="text" required name="lastName" placeholder="   Last Name" style="border-radius: 20px;width: 400px;height: 30px;text-align: center;">
                                          <p name="lname"></p>
                                   </p>
              	 		<p>
              	 			
              	 			<input type="text" name="dob" placeholder="   Date of birth (YYYY/MM/DD)" style="border-radius: 20px;width: 400px;height: 30px;text-align: center;">
                                          <p name="dobResult"></p>
              	 		</p>
              	 		<p>
              	 			<input type="text" name="district" placeholder="   District" style="border-radius: 20px;width: 400px;height: 30px;text-align: center;">
                                          <p name="districtResult"></p>
              	 		</p>
                                   <p>
                                          <input type="text" name="city" placeholder="   City" style="border-radius: 20px;width: 400px;height: 30px;text-align: center;">
                                          <p name="cityResult"></p>
                                   </p>
                                   <p>
                                          <input type="text" name="ward" placeholder="   Ward" style="border-radius: 20px;width: 400px;height: 30px;text-align: center;">
                                          <p name="wardResult"></p>
                                   </p>
                                   <p>
                                          
                                          <select name="gender" style="border-radius: 20px;width: 400px;height: 30px;text-align: center;">
                                                 <optgroup label="gender">
                                                        <option value="m">Male</option>
                                                        <option value="f">Female</option>
                                                 </optgroup>
                                          </select>
                                   </p>
              	 		<p>
              	 			
              	 			<select name="problemOption" style="border-radius: 20px;width: 400px;height: 30px;text-align: center;">
                                                 <optgroup label="Probelm">
                                                        <option value="ENT">ENT</option>
                                                        <option value="Eye">Eye</option>
                                                        <option value="Skin">Skin</option>
                                                        <option value="Heart">Heart</option>
                                                        <option value="Child health">Child</option>
                                                        <option value="Woman health">Woman</option>
                                                        <option value="Other">Other</option>   
                                                 </optgroup>
              	 			</select>
              	 		</p>
              	 		<div class="PhoneNumber">
              	 			<p>
              	 			  <input type="text" name="phone" placeholder="   Phone Number" style="border-radius: 20px;width: 400px;height: 30px;text-align: center;">
                                            <p name="phoneResult"></p>
              	 			</p>	
              	 		</div>
              	 		<div class="doctorAssigned">
              	 			<select required name="doctorOption" id="doctorOption" style="border-radius: 20px;width: 400px;height: 30px;text-align: center;">
              	 			</select>
              	 		<div>
              	 			<p>
              	 			 <select name="conditionOption" style="border-radius:20px; width:400px; height: 30px;text-align: center;">
                                                 <optgroup label="Condition">
                                                        <option value="emergency">Emergency</option>
                                                        <option value="normal">Normal</option>       
                                                 </optgroup>
              	 			 </select>
                                           <p name="conditionOptionResult"></p>
              	 			</p>
              	 		</div>
              	 		
              	 		<div>
              	 			<label>
              	 				(only for outdoor patients)
              	 			</label>
              	 			<p>
              	 			  <input type="text" name="wardNo" placeholder="   Ward No:" style="border-radius: 20px;width: 400px;height: 30px;text-align: center;">
                                            <p name="wardNoResult"></p>
              	 			</p>
              	 			<p>
              	 			  <input type="text" name="roomNo" placeholder="   Room NO:" style="border-radius: 20px;width: 400px;height: 30px;text-align: center;">
                                            <p name="roomNoResult"></p>
              	 			</p>
                                          <p>
              	 			  <input type="text" name="bedNo" placeholder="   Bed NO:" style="border-radius: 20px;width: 400px;height: 30px;text-align: center;">
                                            <p name="bedNoResult"></p>
              	 			</p>
              	 		</div>
              	 		<div class="button">
              	 			<button type="submit" name="submit" style="width: 110px;height: 30px;border-radius: 30px;background-color: rgb(59, 114, 204);border:none;color: white;text-align: center;">
                                                  Admit
              	 			</button>
              	 		</div>

              	 	</form>
              	 	
              	 </div>
              </section>
              <script>  
                     function dynamicOption(){
                           var request = new XMLHttpRequest();
                            request.onreadystatechange = function() {
                                   if(request.readyState == 4 && request.status == 200){
                                          var result = JSON.parse(request.responseText);
                                          console.log(result);
                                          var parent = document.getElementById("doctorOption");
                                          for(var i = 0 ; i< result.length; i++){
                                                 var optchild = document.createElement("option");
                                                 optchild.setAttribute("value",result[i].doc_id);
                                                 var tn = document.createTextNode(result[i].namewithspeciality);
                                                 optchild.appendChild(tn);
                                                 parent.appendChild(optchild); 
                                          }
                                                 
                                   };
                            };
                            request.open("GET", "../testing/doctorOption.php", true);
                            request.send();
                     };
              </script>

              <script>
             // function fun()
              //{      
                     // var check = true;
                     // var firstName2=document.frm.firstName.value;
                     // var middleName2=document.frm.middleName.value;
                     // var lastName2=document.frm.lastName.value;
                     // var dob2=document.frm.dob.value;
                     // var district2=document.frm.district.value;
                     // var city2=document.frm.city.value;
                     // var ward2=document.frm.ward.value;
                     // var phone2=document.frm.phone.value;
                     // var wardNo2=document.frm.wardNo.value;
                     // var roomNo2=document.frm.roomNo.value;
                     // var bedNo2=document.frm.bedNo.value;

                     //  //for first name
                     // if(patname.length<=2 || patname.length>=20)
                     // {
                     //        check = false;
                     //        document.fname.innerHTML="**invalid name length";
                     // }
                     // if(!isNaN(patname))
                     // {
                     //        check = false;
                     //        document.fname.innerHTML="**number not allowed";
                     // }
                     // else
                     //        {document.fname.innerHTML="";}
                     // return check;

                     //  //for middle name
                     // if(patname.length<=2 || patname.length>=20)
                     // {
                     //        document.getElementById("pname").innerHTML="**invalid name length";
                     //        return false;
                     // }
                     // if(!isNaN(patname))
                     // {
                     //        document.getElementById("pname").innerHTML="**number not allowed";
                     //        return false;
                     // }
                     // else
                     //        {document.getElementById("pname").innerHTML="";}
                     
                     // //for last name
                     // if(patname.length<=2 || patname.length>=20)
                     // {
                     //        document.getElementById("pname").innerHTML="**invalid name length";
                     //        return false;
                     // }
                     // if(!isNaN(patname))
                     // {
                     //        document.getElementById("pname").innerHTML="**number not allowed";
                     //        return false;
                     // }
                     // else
                     //        {document.getElementById("pname").innerHTML="";}

                     //  //for patient id
                     // if(patientId==""){
                     //        document.getElementById("pid").innerHTML= "**enter id";
                     //        return false;
                     // }
                     // if(isNaN(patientId))
                     // {
                     //    document.getElementById("pid").innerHTML="**only number is allowed";
                     //    return false;
                     // }
                     // else
                     //       { document.getElementById("pid").innerHTML="";}

                     // //for patient name
                     // if(patname.length<=2 || patname.length>=20)
                     // {
                     //        document.getElementById("pname").innerHTML="**invalid name length";
                     //        return false;
                     // }
                     // if(!isNaN(patname))
                     // {
                     //        document.getElementById("pname").innerHTML="**number not allowed";
                     //        return false;
                     // }
                     // else
                     //        {document.getElementById("pname").innerHTML="";}

                     // //for patient age
                     // if(patage=="")
                     // {
                     //        document.getElementById("agepara").innerHTML="**age Invalid";
                     //        return false;
                     // }

                     // if(isNaN(patage))
                     // {
                     //        document.getElementById("agepara").innerHTML="**give age in numbers";
                     //        return false;
                     // }
                     // else
                     // {
                     //        document.getElementById("agepara").innerHTML="";
                     // }

                     // //for patient address
                     // if(address1.length<5 || address1.length>40)
                     // {
                     //        document.getElementById("add").innerHTML="**invalid address length";
                     //        return false;
                     // }
                     // else{
                     //        document.getElementById("add").innerHTML="";
                     // }

                     // //for patientType
                     // if(pattype=="selectType")
                     // {
                     //        document.getElementById("ptype").innerHTML="**select option";
                     //        return false;
                     // }
                     // else
                     //        document.getElementById("ptype").innerHTML="";

                     // //for phone number
                     // if(phoneno=="")
                     // {
                     //        document.getElementById("phoneRes").innerHTML="**fill phone number";
                     //        return false;
                     // }
                     
                     
                     // if(phoneno.length<9 || phoneno.length>10)
                     // {
                     //        document.getElementById("phoneRes").innerHTML="**invalid phone length";
                     //        return false;
                     // }
                     //  else
                     //        document.getElementById("phoneRes").innerHTML="";

                     // if(isNaN(phoneno))
                     // {
                     //        document.getElementById("phoneRes").innerHTML="**enter numbers only";
                     //        return false;
                     // }
                     // else
                     //        document.getElementById("phoneRes").innerHTML="";

                     // //for doctorSelect
                     // if(doctorselection=="selectDoctor")
                     // {
                     //        document.getElementById("doctorRes").innerHTML="**select option";
                     //        return false;
                     // }
                     // else
                     //        document.getElementById("doctorRes").innerHTML="";

                     // //for patient condition
                     // if(condition=="selectCondition")
                     // {
                     //        document.getElementById("patientConRes").innerHTML="**select option";
                     //        return false;
                     // }
                     // else
                     //        document.getElementById("patientConRes").innerHTML="";

                     // //for ward
                     //  if(ward=="")
                     // {
                     //        document.getElementById("wardRes").innerHTML="**fill ward number";
                     //        return false;
                     // }
                     
                     
                     // if(ward.length>30)
                     // {
                     //        document.getElementById("wardRes").innerHTML="**invalid ward length";
                     //        return false;
                     // }
                     // if(isNaN(ward))
                     // {
                     //        document.getElementById("wardRes").innerHTML="**enter numbers only";
                     //        return false;
                     // }
                     // else
                     //        document.getElementById("wardRes").innerHTML="";

                     // //for room number
                     //  if(roomnum=="")
                     // {
                     //        document.getElementById("phoneRes").innerHTML="**fill phone number";
                     //        return false;
                     // }
                     
                     
                     // if(roomnum.length<1 ||roomnum.length>2)
                     // {
                     //        document.getElementById("roomRes").innerHTML="**invalid room length";
                     //        return false;
                     // }
                     // if(isNaN(roomnum))
                     // {
                     //        document.getElementById("roomRes").innerHTML="**enter numbers only";
                     //        return false;
                     // }
                     // else
                     //        document.getElementById("roomRes").innerHTML="";

                     // //for bed number
                     //  if(bednum=="")
                     // {
                     //        document.getElementById("bedRes").innerHTML="**fill bed number";
                     //        return false;
                     // }
                     
                     
                     // if(bednum.length<1 ||bednum.length>3)
                     // {
                     //        document.getElementById("bedRes").innerHTML="**invalid bed length";
                     //        return false;
                     // }
                     // if(isNaN(bednum))
                     // {
                     //        document.getElementById("bedRes").innerHTML="**enter numbers only";
                     //        return false;
                     // }
                     // else
                     //        document.getElementById("bedRes").innerHTML="";
              };
</script>
              <footer> 	
              </footer>
       </body>
</html>