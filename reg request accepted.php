<?php
$db_host = 'localhost:3307'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'groceryshop'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

session_start();

if ( isset( $_SESSION['USER_VALUE'] ) ) {
    //echo("USER_ID present\n");
	$USER_ID =$_SESSION['USER_VALUE'];
	//echo $USER_ID;
}

$idnumber = $_POST['idnumber'];


$tw= "INSERT INTO AUTH_USER(FIRSTNAME, LASTNAME, EMAIL, USERNAME, PASSWORD , RETYPEPASSWORD ,GENDER , CONTACT , LOCATION)
SELECT FIRSTNAME, LASTNAME, EMAIL, USERNAME, PASSWORD , RETYPEPASSWORD ,GENDER , CONTACT , LOCATION
FROM ADMINVIEW  WHERE ADMINVIEW.ID='".$idnumber."'";
echo $tw;

$two="INSERT INTO PROVIDER (USER_ID, NIDNUMBER, GROCERYNAME, TIME_FOR_GIVING_ORDER)
SELECT AUTH_USER.ID , A.NIDNUMBER, A.GROCERYNAME, TIME_FOR_GIVING_ORDER
FROM ADMINVIEW AS A, AUTH_USER  WHERE A.ID='".$idnumber."' AND A.USERTYPE= 'PROVIDER' AND AUTH_USER.EMAIL=A.EMAIL ";

echo $two;
$three="INSERT INTO USER_ROLE(ROLE , USER_ID)
 SELECT A.USERTYPE,AUTH_USER.ID
 FROM ADMINVIEW AS A , AUTH_USER  WHERE A.ID='".$idnumber."' AND AUTH_USER.EMAIL=A.EMAIL "; 

echo $three;

$four = "DELETE 
 FROM ADMINVIEW WHERE ADMINVIEW.ID='".$idnumber."'";
//echo $tr;

if ($conn->query($tw) === TRUE) {
header("Location: submitted.html");
} else {
echo "Error: ";
}

if ($conn->query($two) === TRUE) {
header("Location: submitted.html");
} else {
echo "Error: ";
}

if ($conn->query($three) === TRUE) {
header("Location: submitted.html");
} else {
echo "Error: ";
}
if ($conn->query($four) === TRUE) {
header("Location: submitted.html");
} else {
echo "Error: ";
}
?>	
