<?php
$title = $_POST['title'];
$name = $_POST['name'];
$yoe = $_POST['yoe'];
$email = $_POST['email'];
$los = $_POST['los'];
$ci = $_POST['ci'];
$message = $_POST['message'];
$formcontent=" From: $title, $name \n Year Of Entry: $yoe \n Level Of Study: $los \n Course Interest: $ci \n Address: $message";
$recipient = "jamesbridger@live.com";
$subject = "Prospectus Request";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "<h2 align='center' style='margin-top:20%;'>Your request has successfully sent. We will post your prospectus soon!" . "<br><br><img style='width:10%;height:20%;' src='load.gif'/>"."<br><br><a href='index.html' style='text-decoration:none;color:#ff0099;'> Click this link if you are not redirected back to the original page within 5 seconds</h2></a>";
header( "refresh:5;url=index.html" );
?>
