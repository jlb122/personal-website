<?php
session_start();
include_once("config.php");
if (empty($_SESSION['username'])){
	echo "<script>; 
	location.href='login.php';</script>";
	}
	?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="shortcut icon" href="icon.ico">
<link rel="stylesheet" type="text/css" href="jquery.cookiebar.css" />
<link rel="stylesheet" type="text/css" href="css/4eyes.css" />
<title>Admin Page</title>
</head>
<style>
/*buttonsMale*/
#msform .action-buttongender {
	max-width: 100%;
	font-weight: bold;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	margin: .5em;
	font-size: 36px;	
	padding: .5em;
	display:inline-block;

}
#msform .action-buttongender:hover, #msform .action-buttongender:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 5px #1A123F;
}
.p{
color:#1e1547;
width:225px;
font-size:28px;
margin-top:.5em;
}

@media (max-width: 1000px) {
.p{
max-width:180px;
font-size:20px;
}
}
</style>
 <body>
 
<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">

		<a href="http://www.4eyesopticians.co.uk/" style="padding:0;">
		<img src="4eyes.png" style="max-width:100%;max-height:100%;"/>
            </a>
        <div class="pure-menu pure-menu-open">
            <ul>
			  <li class="hello"><?php  
			  $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			  if(isset($_SESSION["username"])){
			  $username = ucwords(strtolower($_SESSION["username"]));
			  }
			  else{$username = 'Guest';}
				$timezone = date_default_timezone_set("Europe/London");
				$time = date("H");
				/* Set the $timezone variable to become the current timezone */
				/* If the time is less than 1200 hours, show good morning */
				if ($time < "12") {
				echo "Good Morning, $username";
				} else
				/* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
				if ($time >= "12" && $time < "17") {
				echo "Good Afternoon, $username";
				} else
				/* Should the time be between or equal to 1700 and 1900 hours, show good evening */
				if ($time >= "17") {
				echo "Good Evening, $username";
				}
	?></li>
				<li><a href="add.php">Add New Frames</a></li>
				<li><a href="addsimilar.php">Add Similar Frames</a></li>
				<li><a href="updator.php">Update/Delete Frames</a></li>
				<li><a href="index.php">View Site As Guest</a></li>
				<li><a href="logout.php" style="color: #ed145a;">Logout</a></li>
            </ul>
        </div>
    </div>
 
<form id="msform" action="form.php" method="get">
	<!-- fieldsets -->
		<fieldset>
		<h2><?php 				$timezone = date_default_timezone_set("Europe/London");
				$time = date("H");
				/* Set the $timezone variable to become the current timezone */
				/* If the time is less than 1200 hours, show good morning */
				if ($time < "12") {
				echo "Good Morning $username";
				} else
				/* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
				if ($time >= "12" && $time < "17") {
				echo "Good Afternoon $username";
				} else
				/* Should the time be between or equal to 1700 and 1900 hours, show good evening */
				if ($time >= "17") {
				echo "Good Evening $username";
				}?>. <br>Welcome To The 4Eyes Catalogue Admin Page</h2><br><br>
		<h2 class="fs-title">What Would You Like To Do Today?</h2>
		<label for="gendermale" class="next action-buttongender"><a href="add.php">
		<img src="add.png" style="max-width:4em; max-height:4em;"/>
		<p class="p">Add New Frame</p>
		<input type="radio" name="gender" id="gendermale" value="Male" /></a></label>
		<label for="genderfemale" class="next action-buttongender"><a href="addsimilar.php">
		<img src="addsimilar.png" style="max-width:4em; max-height:4em;"/>
		<p class="p" style="color:#ed145a;">Add Similar Frames</p>
		<input type="radio" name="gender" id="genderfemale" value="Female" /></a></label>
		<label for="genderWhat" class="next action-buttongender">
		<a href="admin.php"><img src="update.png" style="max-width:4em; max-height:4em;"/>
		<p class="p" >Update/Delete Frames</p>
		<input type="radio" name="gender" id="genderWhat" value="Female" /></a></label>
		</fieldset>
<!-- jQuery -->
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="js/jquery.easing.min.js" type="text/javascript"></script>
<script src='js/jquery.bpopup.min.js'></script>
<script type="text/javascript" src="jquery.cookiebar.js"></script>
<script>
			$(document).ready(function(){
				$.cookieBar({
				});
			});

(function (window, document) {

    var layout   = document.getElementById('layout'),
        menu     = document.getElementById('menu'),
        menuLink = document.getElementById('menuLink');

    function toggleClass(element, className) {
        var classes = element.className.split(/\s+/),
            length = classes.length,
            i = 0;

        for(; i < length; i++) {
          if (classes[i] === className) {
            classes.splice(i, 1);
            break;
          }
        }
        // The className is not found
        if (length === classes.length) {
            classes.push(className);
        }

        element.className = classes.join(' ');
    }

    menuLink.onclick = function (e) {
        var active = 'active';

        e.preventDefault();
        toggleClass(layout, active);
        toggleClass(menu, active);
        toggleClass(menuLink, active);
    };

}(this, this.document));</script>
</form>



