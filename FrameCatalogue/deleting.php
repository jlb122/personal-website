<?php
session_start();
include_once("config.php");
?>
<?php 

if (isset($_GET['id']))
{
mysql_query("DELETE FROM $dbname.glasses WHERE `id`='".$_GET['id']."'");
	$return_url = base64_decode($_GET["return_url"]); //return url
	echo "<h2 align='center' style='margin-top:12.5%;'>The selected frame/s have been succesfully deleted! You will be redirected back to the previous page shortly" . "<br><br><img style='width:10%;height:20%;' src='loading.gif'/>"."<br><br><a href='".$return_url."' style='text-decoration:none;color:#ff0099;'> Click this link if you are not redirected back to the original page within 5 seconds</h2></a>";
	header( "refresh:5;url=".$return_url."");
	}
	
	elseif (isset($_GET['delete']))
	{
	mysql_query("DELETE FROM $dbname.glasses WHERE `id` IN ('" . implode("','",$_GET['delete']) . "')");
	$return_url = base64_decode($_GET["return_url"]); //return url
	echo "<h2 align='center' style='margin-top:12.5%;'>The selected frame/s have been succesfully deleted! You will be redirected back to the previous page shortly" . "<br><br><img style='width:10%;height:20%;' src='loading.gif'/>"."<br><br><a href='".$return_url."' style='text-decoration:none;color:#ff0099;'> Click this link if you are not redirected back to the original page within 5 seconds</h2></a>";
	header( "refresh:5;url=".$return_url."");
	}
	else{
	$return_url = base64_decode($_GET["return_url"]); //return url
	echo "<h2 align='center' style='margin-top:12.5%;'>The selected frame/s have been succesfully deleted! You will be redirected back to the previous page shortly" . "<br><br><img style='width:10%;height:20%;' src='loading.gif'/>"."<br><br><a href='".$return_url."' style='text-decoration:none;color:#ff0099;'> Click this link if you are not redirected back to the original page within 5 seconds</h2></a>";
	header( "refresh:5;url=".$return_url."");
	}
	?>