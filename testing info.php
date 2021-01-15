<?php
/**
 * @param int $user_id
 * 
 * @return [type]
 */
function INFO(int $user_id)
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
$sql = "(SELECT A.FIRSTNAME, A.LASTNAME, A.USERNAME, A.EMAIL, A.GENDER, A.ID, A.CONTACT , A.LOCATION, P.GROCERYNAME ,P.PRODUCTLIST, P.NIDNUMBER, P.TIME_FOR_GIVING_ORDER 
		FROM PROVIDER AS P, AUTH_USER AS A  WHERE A.ID='".$user_id."' AND A.ID= P.USER_ID)";
	
$query = mysqli_query($conn, $sql);
if (!$query) 
{
	die ('SQL Error: ' . mysqli_error($conn));
	return false;
}
else 
{
	return true;
}
}
?>

 