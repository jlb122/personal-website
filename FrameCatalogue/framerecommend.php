<?php
session_start();
include_once("config.php");
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
<title>Frame Recommendation Service</title>
</head>
<style>
/*buttonsMale*/
#msform .action-buttongender {
	max-width: 100%;
	font-weight: bold;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	margin: .5em 2.5%;
	font-size: 36px;	
	padding: 2% 2% 2% 2%;
	display:inline-block;

}
#msform .action-buttongender:hover, #msform .action-buttongender:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 5px #1A123F;
}
</style>
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
				<form action="search.php" method="get">
				<input type="search" name="keyword" placeholder="Search"></form>
                <li><a href="framerecommend.php">Frame Recommendation</a></li>
				<li><?php
				$query = "SELECT * FROM $dbname.glasses ORDER BY RAND() LIMIT 1";
				$result = mysqli_query($db, $query);
				while($row = mysqli_fetch_array($result))
				{
				echo "<a href=frame.php?product=".$row['id'].">I'm Feeling Lucky</a>";
				}
				?>
				</li>
                <li><a href="viewall.php">View All Frames</a></li>
                <li><a href="trends.php">Fashion Trends</a></li>								
                <li><a href="brands.php">Our Brands</a></li>		
                <li><a href="faceshape.php">Face Shape Guide</a></li>		
                <li><a href="frameshape.php">Frame Shape Guide</a></li>	
                <li><a href="contact.php">Request Eyetest</a></li>
                <li><a href="enquire.php">Request Frame Dispense</a></li>	
                <li><a href="http://www.4eyesopticians.co.uk/contact.php">How To Find Us</a></li>	
				<li><a href="view_cart.php">My Wishlist&nbsp;&nbsp;
				<?php
				    //current URL of the Page. cart_update.php redirects back to this URL
				$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
				if(isset($_SESSION["products"]))
				{
				$total = 0;		
				echo '('.count ($_SESSION['products']).')';
				foreach ($_SESSION["products"] as $cart_itm)
				{
				}

				}else{
				echo '(0)';
				}
				?>
				</a></li>	
				<li><?php if(isset($_SESSION["username"])){echo '<a href="admin.php" style="color: #ed145a;">View Admin Page</a>';
				echo '<a href="logout.php" style="color: #ed145a;">Logout</a>';}
				else echo '<a href="admin.php" style="color: #ed145a;">Login</a>'?></li>
            </ul>
        </div>
    </div>
 
<form id="msform" action="form.php" method="get">
	<!-- fieldsets -->
		<fieldset>
		<h2>Welcome To 4Eyes Recommendation Service</h2><br><br>
		<h2 class="fs-title">Gender</h2>
		<h3 class="fs-subtitle">To begin please select your gender below</h3><br>
		<label for="gendermale" class="next action-buttongender">
		<a href="male.php"><img src="http://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Aiga_toiletsq_men.svg/424px-Aiga_toiletsq_men.svg.png" style="max-width:4em; max-height:4em;"/></a>
		<p style="font-size:28px; margin-top:.5em;">Male</p>
		<input type="radio" name="gender" id="gendermale" value="Male" /></label>
		<label for="genderfemale" class="next action-buttongender">
		<a href="female.php"><img src="http://upload.wikimedia.org/wikipedia/commons/e/e3/Toilet_women.svg" style="max-width:4em; max-height:4em;"/></a>
		<p style="font-size:28px; margin-top:.5em;">Female</p>
		<input type="radio" name="gender" id="genderfemale" value="Female" /></label>
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



