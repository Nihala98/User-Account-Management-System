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
		
	<form method="post" action="<?php echo base_url()?>main/update">
		<fieldset style="width:30%;height:10%;">
			<?php
	if(isset($userdata))
	{

		foreach($userdata->result() as $row)
		{

			?>
		<table>	
					<tr>
					<td>First Name:</td>
					<td><input type="text" name="fname" value="<?php echo $row->fname;?>" pattern=".{3,}" required title="3 characters minimum" maxlength="25"></td>
				 	</tr>
				 	<tr>
					<td>Last Name:</td>
					<td><input type="text" name="lname" value="<?php echo $row->lname;?>" pattern=".{3,}"   required title="3 characters minimum" maxlength="25"></td>
					</tr>
					<tr>
					<td>Email:</td>
					<td><input type="email" name="email" required value="<?php echo $row->email;?>"></td>
				    </tr>
				 	 <tr>
					<td>Phone No:</td>
					<td><input type="text" name="phn" value="<?php echo $row->phn_no;?>" required minlength="10"maxlength="10"></td>
					</tr>
					 <tr>
					<td>Dob:</td>
					<td><input type="date" name="dob"  value="<?php echo $row->dob;?>" required></td>
					</tr>
					 <tr>
					<td>Address:</td>
					<td><input type="text" name="address" value="<?php echo $row->address;?>" required minlength="10"maxlength="20"></td>
					</tr>
					 <tr>
					<td>District:</td>
					<td><select name="district" placeholder="choose district" value="<?php echo $row->district;?>">
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
					<td><input type="text" name="pin" value="<?php echo $row->pincode;?>" required></td>
				 	<tr>
					<td>User Name:</td>
					<td><input type="text" name="uname" value="<?php echo $row->uname;?>" required pattern=".{3,}"   required title="3 characters minimum" maxlength="10"></td>
				 	</tr>
				</table>
			<input type="submit" value="update" name="update">
			<?php
		}
	}
	else
	{
		?>
	<tr>
		<td>no data found </td></tr>
		<?php

}

		?>
		</fieldset>
</form>
</body>
</html>