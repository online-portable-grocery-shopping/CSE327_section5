<?php
/**
 * @param int $user_id
 * 
 * @return [type]
 */
function UPDATE(int $user_id)
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
$first_name = "tasfiq";
$last_name = "mahmud";
$user_name = "tasfig mahmud";
$email = "tasfiq.mahmud@gmail.com";
$retype_pass = "tasfiq";
$password = "tasfiq";
$gender =  "male";
$grocery_name = "lalaal";
$contact = "01838766544";
$nid = "918387887";
$location = "Bashundhar";
$avaiabl = "10pm-6pm";
$product = "rice,dal,sugar";


$tor = "UPDATE  AUTH_USER  SET FIRSTNAME = '".$first_name."', LASTNAME = '".$last_name."', EMAIL = '".$email."', USERNAME = '".$user_name."', PASSWORD = '".$password."' , RETYPEPASSWORD = '".$retype_pass."' ,GENDER = '".$gender."' , CONTACT = '".$contact."' , LOCATION = '".$location."' WHERE ID ='".$user_id."'";


$td = "UPDATE PROVIDER SET NIDNUMBER = '".$nid."' ,GROCERYNAME = '".$grocery_name."', PRODUCTLIST = '".$product."' , TIME_FOR_GIVING_ORDER = '".$avaiabl."' Where USER_ID = '".$user_id."'";


if (($conn->query($tor)=== TRUE) && ($conn->query($td) === TRUE) )
{
    return true;
} 
else 
{
	return false;
}


$conn->close();
}

?>