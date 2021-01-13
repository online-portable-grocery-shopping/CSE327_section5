<?php
$db_host = "localhost:3307"; /* Server Name*/
$db_user = 'root'; /* Username*/
$db_pass = ''; /* Password*/
$db_name = 'groceryshop'; /* Database Name*/
$speciality ;
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) 
{
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$user = $_POST['userid'];

$sql = "(SELECT R.ROLE, A.FIRSTNAME, A.LASTNAME, A.USERNAME, A.EMAIL, A.GENDER, A.ID, A.CONTACT , A.LOCATION		
      FROM AUTH_USER AS A , USER_ROLE AS R WHERE A.ID ='".$user."' AND R.USER_ID ='".$user."')";
	
		
$sqle = "(SELECT P.GROCERYNAME ,P.PRODUCTLIST, P.NIDNUMBER, P.TIME_FOR_GIVING_ORDER 
		FROM PROVIDER AS P  WHERE P.USER_ID ='".$user."')";


$query = mysqli_query($conn, $sql);
$query1 = mysqli_query($conn, $sqle);


if (!$query) {
	die ('SQL Error1: ' . mysqli_error($conn));
}
if (!$query1) {
	die ('SQL Error2: ' . mysqli_error($conn));
}


?>


<html>
<head>
	<title>DISPLAYING PROVIDER INFORMATION</title>
	<link rel = "stylesheet" type = "text/css" href = "styleTable.css">
	
</head>

<body bgcolor = "#E9F3F8">
<h1>Table 2</h1>
	<table class = "data-table">
		<caption class = "title">USER INFO </caption
		<thead>
			<tr>
			    <th>No</th>
				<th>PROVIDER USER ID</th>
				<th>First name</th>
				<th>Last name</th>
				<th>User type</th>
				<th>User name</th>
				<th>Gender</th>
				<th>Email</th>
				<th>Contact</th>
				<th>Location</th>
				
			</tr>
		</thead>
		
		
		
		<tbody>
		<?php
		
		$no = 1;
		$total = 0;
		while ($row = mysqli_fetch_array($query) )
		{
			
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['ID'].'</td>
					<td>'.$row['FIRSTNAME'].'</td>
					<td>'.$row['LASTNAME'].'</td>
					<td>'.$row['ROLE'].'</td>
					<td>'.$row['USERNAME'].'</td>
					<td>'.$row['GENDER'].'</td>
					<td>'.$row['EMAIL'].'</td>
					<td>'.$row['CONTACT'].'</td>
					<td>'.$row['LOCATION'].'</td>
					
					
				</tr>';
			$no++;
		
		}
		?>
		
		
		</tbody>
		
		
	</table>
	
	
	<h1>Table 1</h1>
	<table class = "data-table">
		<caption class = "title">IF PROVIDER EXTRA INFO </caption
		<thead>
			<tr>
			    <th>NID NUMBER</th>
				<th>Product List</th>
				<th>Grocery Name</th>
				<th>Appointment time</th>
				
				
			</tr>
		</thead>
		<tbody>
		<?php
		$no = 1;
		$total = 0;
		while ($row = mysqli_fetch_array($query1) )
		{
			echo '<tr>
					
					<td>'.$row['NIDNUMBER'].'</td>
					<td>'.$row['PRODUCTLIST'].'</td>
					<td>'.$row['GROCERYNAME'].'</td>
					<td>'.$row['TIME_FOR_GIVING_ORDER'].'</td>
					
					
				</tr>';
			$no++;
		}
		?>
		
		
		</tbody>
	</table>
		
</body>
</html>