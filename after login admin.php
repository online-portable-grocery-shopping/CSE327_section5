<?php

session_start();

if (isset($_POST['submit'])) 
{
	  include_once "connection.php";
}

?>

<?php
if (isset($_POST['submit1'])) 
{
  include_once "connection.php";	
}

?>




<!DOCTYPE html>
<html>
<head>
<meta name = "viewport" content = "width=device-width, initial-scale = 1">
<style>
body 
{
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
}

.topnav 
{
    overflow: hidden;
    background-color: #333;
}

.topnav a 
{
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover 
{
    background-color: #ddd;
    color: black;
}

.topnav a.active 
{
    background-color: #90EE90 ;
    color: black;
}
.topnav .login-container 
{
    float: right;
}

.topnav input[type=text] 
{
    padding: 6px;
    margin-top: 8px;
    font-size: 17px;
    border: none;
    width:120px;
}

.topnav .login-container button 
{
    float: right;
    padding: 6px 10px;
    margin-top: 8px;
    margin-right: 16px;
    background-color: #90EE90;
    color: black;
    font-size: 17px;
    border: none;
    cursor: pointer;
}

.topnav .login-container button:hover 
{
    background-color:#90EE90 ;
}

@media screen and (max-width: 600px) 
{
    .topnav .login-container 
  {
    float: none;
  }
  .topnav a, .topnav input[type = text], .topnav .login-container button 
  {
      float: none;
      display: block;
      text-align: left;
      width: 100%;
      margin: 0;
      padding: 14px;
  }
  .topnav input[type = text] 
  {
      border: 1px solid #ccc;  
  }
}

.topnav .signup-container 
{
    float: right;
}

.topnav input[type = text] 
{
    padding: 6px;
    margin-top: 8px;
    font-size: 17px;
    border: none;
    width:120px;
}

.topnav .signup-container button 
{
    float: right;
    padding: 6px 10px;
    margin-top: 8px;
    margin-right: 16px;
    background-color: #90EE90;
    color: black;
    font-size: 17px;
    border: none;
    cursor: pointer;
  
}

.topnav .signup-container button:hover 
{
    background-color: #90EE90;
}

@media screen and (max-width: 600px) 
{
    .topnav .signup-container 
    {
        float: none;
}
  .topnav a, .topnav input[type = text], .topnav .signup-container button 
  {
      float: none;
      display: block;
      text-align: left;
      width: 100%;
      margin: 0;
      padding: 14px;
  }
  .topnav input[type = text] 
  {
      border: 1px solid #ccc;  
  }
}

</style>
</head>
<body>


<div class = "topnav">
  	<a class = "active" href="admin info.php">Admin Info</a>
  	<a href = "order request admin.php">Order Requests</a> 
	<a href = "order done admin.php">Order Done </a> 
	<a href = "registration request admin.php">Registration Request </a> 
	<?php
if ( isset( $_SESSION['USER_VALUE'] ) ) 
{
	  $user_id = $_SESSION['USER_VALUE']; ?>
	  <a href = "logout.php">Logout</a>
	  <?php
	}
?>

<div class = "login-container">
	<form method = "POST" action = "reg request accepted.php">
      	<input type = "text" placeholder = "ID Number " name = "idnumber">
		<button type = "submit" name = "submit">accept</button>
		</form>
	
	<form method = "POST" action = "user info seeing by admin.php">

      	<input type = "text" placeholder = "user id" name = "userid">
		<button type = "submit" name = "submit1">submit</button>
		</form>
		</div>
<!-- Slide Show -->
<section>
  <img class = "mySlides" src = "pic1.jpg" style = "width:100%">
  <img class = "mySlides" src = "pic2.jpg" style = "width:100%">
  
</section>

<script>
/* Automatic Slideshow - change image every 3 seconds*/
var my_index = 0;
carousel();

/**
 * @return [type]
 */
function carousel() 
{
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) 
  {
      x[i].style.display = "none";
  }
    my_index++;
    if (my_index > x.length) {my_index = 1}
    x[my_index-1].style.display = "block";
    setTimeout(carousel, 3000);
}
</script>

</body>
</html>