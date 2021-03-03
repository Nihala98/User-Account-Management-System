<!DOCTYPE html>
<html>
<head>
	<title>new</title>
</head>
<style>
table,td{
	
	padding:10px;
	margin:40px;
	border-collapse:collapse;
	text-align:center;
	font-weight:bolder;
	text-align:justify;
	}	
	
	fieldset{ text-align:center;
		padding:15px;
		position:relative;
		left:440px;
		top:50px;
		background-color:rgba(0,0,0,0.6);

	}
	h1{
		text-align:center; 
	}
	
</style>
<body>
			<h1>REGISTRATION FORM</h1>
		
	<form method="post" action="<?php echo base_url()?>main/form_access">
		<fieldset style="width:30%;height:10%;">
		<table>	
					<tr>
					<td>First Name:</td>
					<td><input type="text" name="fname" required="required" maxlength="25" pattern="[a-zA-Z]+"></td>
				 	</tr>
				 	<tr>
					<td>Last Name:</td>
					<td><input type="text" name="lname" required="required" maxlength="25" pattern="[a-zA-Z]+"></td>
					</tr>
					<tr>
					<td>Email:</td>
					<td><input type="email" name="email" id="email"></td><td><span id="email_result"></span></td>
				    </tr>
				 	 <tr>
					<td>Phone No:</td>
					<td><input type="text" name="phn_no"  required minlength="10" maxlength="10" id="phn_no"></td>
					<td><span id="phno_result"></td></span>
					</tr>
					 <tr>
					<td>Dob:</td>
					<td><input type="date" name="dob"  required></td>
					</tr>
					 <tr>
					<td>Address:</td>
					<td><input type="text" name="address"  required="required" maxlength="80" pattern="[a-zA-Z0-9 ]+" ></td>
					</tr>
					 <tr>
					<td>District:</td>
					<td><select name="district" placeholder="choose district" required="required">
						<option value="Trivandrum">Trivandrum</option>
						<option value="Kollam">Kollam</option>
						<option value="Alapuzha">Alapuzha</option>
						<option value="pathanamthitta">pathanamthitta</option>
						<option value="Ernakulam">Ernakulam</option>
						<option value="Kottayam">kottayam</option>
						<option value="Kozhikode">Kozhikode</option>
						<option value="Kannur">Kannur</option>
					</select></td>
					</tr>
					<td>Pincode:</td>
					<td><input type="text" name="pin" required></td>
				 	<tr>
					<td>User Name:</td>
					<td><input type="text" name="uname" required="required" maxlength="25" pattern="[a-zA-Z0-9]+" id="uname"></td><td><span id="uname_result"></td></span></td>
				 	</tr>
				 	<td>Password:</td>
					<td><input type="password" name="password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></td>
				    </tr>

					
					
				    
				    
					
			</table>
			<input type="submit" value="submit" name="submit">
		</fieldset>

</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>  
 $(document).ready(function(){  
      $('#email').change(function(){  
           var email = $('#email').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>main/email_availibility",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                          $('#email_result').html(data);  
                     }  
                });  
           }  
      });  

      $('#phn_no').change(function(){  
           var phn_no = $('#phn_no').val();  
           if(phn_no != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>main/phno_availability",  
                     method:"POST",  
                     data:{phn_no:phn_no},  
                     success:function(data){  
                          $('#phno_result').html(data);  
                     }  
                });  
           }  
      });  
       $('#uname').change(function(){  
           var uname = $('#uname').val();  
           if(uname != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>main/uname_availability",  
                     method:"POST",  
                     data:{uname:uname},  
                     success:function(data){  
                          $('#uname_result').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script> 
</body>
</html>