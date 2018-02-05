<?php
session_start();
include_once("config.php");
?>
<?php 
$username = strtolower($_POST['username']);
$password = $_POST['password'];

$query = "SELECT * FROM $dbname.users WHERE `username` = '$username' AND BINARY `password` = '$password'";
$result = mysqli_query($db,$query);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
// Set username session variable
$_SESSION['username'] = ucfirst($_POST['username']);//post the data so that it can display the username that was logged in with
//also convert it to uppercase
// Jump to secured page	
			$timezone = date_default_timezone_set("Europe/London");
				$time = date("H");
				/* Set the $timezone variable to become the current timezone */
				/* If the time is less than 1200 hours, show good morning */
				if ($time < "12") {
				$username = "Good Morning ".$_POST['username']."";
				} else
				/* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
				if ($time >= "12" && $time < "17") {
				$username = "Good Afternoon ".$_POST['username']."";
				} else
				/* Should the time be between or equal to 1700 and 1900 hours, show good evening */
				if ($time >= "17") {
				$username = "Good Evening ".$_POST['username']."";
				}
	echo "<h2 align='center' style='margin-top:12.5%;'>$username. You have been succesfully logged on! You will be redirected shortly." . "<br><br><img style='width:10%;height:20%;' src='loading.gif'/>"."<br><br><a href='admin.php' style='text-decoration:none;color:#ff0099;'> Click this link if you are not redirected within 5 seconds</h2></a>";
	header( "refresh:5;url=admin.php");}
else {
	echo "<script>
	alert('Incorrect Username/Password! Remember password is case sensitive!'); 
	location.href='login.php';</script>";//echo a error message on failed logon and go back to main_login.php

    }


?>