<!DOCTYPE html>
<html>
<head>
	<title>new</title>
</head>
<style>
table,td{
	border:3px solid black;
	padding:10px;
	margin:50px;
	border-collapse:collapse;
	text-align:center;
	margin-left:200px;
	}	
	h1{
		text-align:center;
	}
</style>
<body>
<h1>Details</h1>
	<form method="post" action="">
	
	
	
		<table border="1">
		<thead>
		<tr>
		<th>fname</th>
		<th>lname</th>
		<th>uname</th>
		<th>email</th>
		<th>mobile</th>
		<th>Dob</th>
		<th>Address</th>
		<th>Ditrict</th>
	    <th>pincode</th>
		
</thead></tr>
<?php

if($n->num_rows()>0)
{
	foreach($n->result() as $row)
{
?>
<tr>
<td><?php echo $row->fname;?></td>
<td><?php echo $row->lname;?></td>
<td><?php echo $row->uname;?></td>
<td><?php echo $row->email;?></td>
<td><?php echo $row->phn_no;?></td>
<td><?php echo $row->dob;?></td>
<td><?php echo $row->address;?></td>
<td><?php echo $row->district;?></td>
<td><?php echo $row->pincode;?></td>
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
</table>
</form>
</body>
</html>