<?php

session_start();
if ( isset( $_SESSION['USER_VALUE'] ) ) 
{
	$user_id =$_SESSION['USER_VALUE'];
	
}

ORDERDONE($user_id);
$query1 = ORDERDONE($user_id);
/**
 * @param int $user_id
 * 
 * @return [type]
 */
function ORDERDONE(int $user_id)
{
	$db_host = "localhost:3307"; /* Server Name*/
    $db_user = 'root'; /* Username*/
    $db_pass = ''; /* Password*/
    $db_name = 'groceryshop'; /* Database Name*/

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) 
{
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = "(SELECT D.DONE_ORDER_NUMBER,D.PROVIDER_USER_ID, D.CUSTOMER_USER_ID ,D.PRODUCT, D.GIVEN_ORDER_DATE , A.CONTACT ,A.LOCATION ,A.USERNAME
		FROM DONEORDER AS D ,AUTH_USER AS A WHERE D.PROVIDER_USER_ID = '".$user_id."' AND D.CUSTOMER_USER_ID = A.ID )";
	
$query = mysqli_query($conn, $sql);


if (!$query) 
{
	die ('SQL Error: ' . mysqli_error($conn));
}
else 
{
	return $query;
}
}

?>


<html>
<head>
	<title>DISPLAYING RUNNING ORDER</title>
	<link rel = "stylesheet" type = "text/css" href = "styleTable.css">
	
</head>

<body bgcolor = "#E1E7A5">
<h1>Table 1</h1>
	<table class = "data-table">
		<caption class = "title">MY DONE ORDER </caption
		<thead>
			<tr>
			    <th>No</th>
				<th>TOTAL ORDER NUMBER</th>
				<th>PROVIDER USER ID</th>
				<th>CUSTOMER USER ID</th>
				<th>PRODUCT ORDERED</th>
				<th>DELIVERY ORDER DATE</th>
                <th>CUSTOMER CONTACT</th>
                <th>CUSTOMER LOCATION</th>	
                <th>CUSTOMER USERNAME</th>					
			</tr>
		</thead>
		<tbody>
		<?php
		$no = 1;
		$total = 0;
		while ($row = mysqli_fetch_array($query1))
		{
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['DONE_ORDER_NUMBER'].'</td>
					<td>'.$row['PROVIDER_USER_ID'].'</td>
					<td>'.$row['CUSTOMER_USER_ID'].'</td>
					<td>'.$row['PRODUCT'].'</td>
					<td>'.$row['GIVEN_ORDER_DATE'].'</td>
					<td>'.$row['CONTACT'].'</td>
					<td>'.$row['LOCATION'].'</td>
					<td>'.$row['USERNAME'].'</td>
					
				</tr>';
			$no++;
		}
		?>
		</tbody>
	</table>
		
</body>
</html>