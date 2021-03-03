<!DOCTYPE html>
<html>
<head>
	<title>new</title>
</head>
<style>
	h1{
		text-align:center; 
	}

	fieldset{ text-align:center;
		padding:25px;
		position:relative;
		left:480px;
		top:50px;
		background-color:black;
		color:white;

	}
</style>
<body>
<h1>Login</h1>
	
	<form method="post" action="<?php echo base_url()?>main/log">
		<fieldset style="height:20%;width:25%">
      <table>
      	<tr>
				<td>uname:</td>
				<td><input type="text" name="uname" required></td>
			</tr>
			<tr>
				<td>password:</td>
				<td><input type="password" name="password" required></td>
			</tr>
			<tr>
					<td><input type="submit" value="Login" name="Login"></td>
					<td><a href="#">Forgot password?</a>
						<td><a href="#">Reset Password</a></td>
				</tr>
			</fieldset>	
				
					
</table>
</form>
</div>
</body>
</html>