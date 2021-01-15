<?php
$db_host = "localhost:3307"; /* Server Name*/
$db_user = 'root'; /* Username*/
$db_pass = ''; /* Password*/
$db_name = 'groceryshop'; /* Database Name*/

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) 
{
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

session_start();

if ( isset( $_SESSION['USER_VALUE'] ) )
{
	$user_id =$_SESSION['USER_VALUE'];
	
}

$product = $_POST['product'];

$puser_id = $_POST['p_userid'];

$tow= "INSERT INTO ORDERLIST(PROVIDER_USER_ID, CUSTOMER_USER_ID ,PRODUCT, GIVEN_ORDER_DATE)

VALUES ('".$puser_id."', '".$user_id."' , '".$product."', NOW())";

if ($conn->query($tow) === TRUE) 
{
    header("Location: submitted.html");
} 
else 
{
    echo "This provider is delivering you or someone right now can't take twice delivery at a time  ";
}
?>
