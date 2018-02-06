<!doctype html>
<html>
<head>

   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
	<title>James Bridger - IT & Business Professional</title>
	<meta name="description" content="">
	<meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/layout.css">
   <link rel="stylesheet" href="css/media-queries.css">
   <link rel="stylesheet" href="css/magnific-popup.css">

   <!-- Script
   ================================================== -->
	<script src="js/modernizr.js"></script>

   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" >

</head>
<?php
session_start();
$contactName = $_POST['contactName'];
$contactEmail = $_POST['contactEmail'];
$contactSubject = $_POST['contactSubject'];
$contactMessage = $_POST['contactMessage'];
$formcontent ="<b>Contact Form from Personal Website
			   </b><br><br> From: $contactName <br> Email: $contactEmail<br> Subject: $contactSubject<br> Message: $contactMessage";
$recipient = "jamesbridger@live.com";
$subject = "Contact Form from Personal Website";
$mailheader = "From: $contactEmail \r\n";
$mailheader .= "MIME-Version: 1.0\r\n";
$mailheader .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "<h2 align='center' style='margin-top:12.5%;'>Your message was sent, thank you!" . "<br><br><img style='width:10%;height:20%;' src='loading.gif'/>"."<br><br><a href='index.html' style='text-decoration:none;color:#ff0099;'> Click this link if you are not redirected back to the original page within 5 seconds</h2></a>";
header( "refresh:5;url=index.html" );
?>
