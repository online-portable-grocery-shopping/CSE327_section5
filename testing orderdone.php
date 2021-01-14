<?php
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
	return false;
}
else 
{
	return true;
}
}
?>