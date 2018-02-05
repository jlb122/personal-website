<!doctype html>
<html>
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="shortcut icon" href="icon.ico">
<link rel="stylesheet" type="text/css" href="jquery.cookiebar.css" />
<title>Search Engine Test</title>
</head>
<?php
session_start();
include_once("config.php");
$name = $_POST['name'];
$email = $_POST['email'];
$first = $_POST['first'];
$student = $_POST['student'];
$number = $_POST['number'];
$wishlist = $_POST['wishlist'];
$formcontent ="<b>Frame Dispense Request</b><br><br> From: $name <br> Email: $email<br> Contact Number: $number<br> Visited 4Eyes In Last Year?: $first<br> Student?: $student<br>";	
if ($wishlist == 'Yes'){
$formcontent .="Requested Frames:";
foreach ($_SESSION["products"] as $cart_itm)
    {
	 $formcontent .= '<ul>';
     $formcontent .= '<li>'.$cart_itm['id'].')&nbsp;&nbsp;'.$cart_itm['glasses'].'</li>';
	 $formcontent .= '</ul>';

	}}
else {
	$formcontent .="No Glasses in Wishlist";
	}
if (empty ($_POST['content'])){
}
else {
$formcontent .= "Message: ".$_POST['content']."<br>";
}
$recipient = "jamesbridger@live.com";
$subject = "Frame Dispense Request";
$mailheader = "From: $email \r\n";
$mailheader .= "MIME-Version: 1.0\r\n";
$mailheader .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "<h2 align='center' style='margin-top:12.5%;'>Your request has successfully sent. We will reply soon!" . "<br><br><img style='width:10%;height:20%;' src='loading.gif'/>"."<br><br><a href='index.php' style='text-decoration:none;color:#ff0099;'> Click this link if you are not redirected back to the original page within 5 seconds</h2></a>";
header( "refresh:5;url=index.php" );
?>
