<?php
/**
 * @param int $user_id
 * 
 * @return [type]
 */
function SIGNUP(int $user_id)
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
$first_name = "sunmoon";
$last_name = "muhin";
$user_name = "sunmoon muhin";
$email = "sunmoon.mohin@gmail.com";
$retype_pass = "sunmoon";
$password = "sunmoon";
$gender = "male";
$contact = "01838766593";
$location = "norda";



$tor = "INSERT INTO ADMINVIEW(USERTYPE,FIRSTNAME, LASTNAME, EMAIL, USERNAME, PASSWORD , RETYPEPASSWORD ,GENDER , CONTACT , LOCATION, NIDNUMBER , GROCERYNAME, TIME_FOR_GIVING_ORDER, TIME_OF_REG)

VALUES ('customer','".$first_name."', '".$last_name."', '".$email."', '".$user_name."' , '".$password."', '".$retype_pass."' , '".$gender."' ,'".$contact."' , '".$location."', '', '', '', '')";



/*$side = "INSERT INTO USER_ROLE(ROLE , USER_ID)*/
/*VALUES ('customer' , (SELECT ID FROM AUTH_USER WHERE EMAIL='".$email."'))";*/

if ($conn->query($tor) === TRUE) 
{
    return true;
} 
else 
{
    return false;
}


$conn->close();
}