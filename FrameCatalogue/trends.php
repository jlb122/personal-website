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
<title>Current Trends</title>
</head><style>
@media (max-width: 1000px) {
tbody {
	border-spacing: .5em;
}
table {
	border-spacing: .5em;

}
th, td, tbody{
display:block;}


td:nth-child(2), td:nth-child(3), td:nth-child(4){
   margin-top: 25px;
}
}

p{
font-size:14px}

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
 <div id="msform">
	<!-- progressbar -->

	<!-- fieldsets -->
		<fieldset>
		<h2 class="fs-title">Spring 2015 Trends</h2>
<table>
<tbody style='display: inline-block; border-spacing: 2em; '>
<tr>
<td><div class="image"><a href="frame.php?product=238"><img style="max-width:10em; max-height:10em;" src="pictures/williammorris9912.png" /></a></div></td>
<td><p><b>Retro</b> – Retro eyewear is in trend and it is inspired by all of the cool filters used on social media photo sharing websites like Instagram why not embrace your 50s, 60s or 70s style. 
Adopt this eyewear trend with cateye or curved frames and tortoiseshell colours. The William Morris 9912 frames are perfect for a retro look.</p></td>
</tr>
<tr>
<td><div class="image"><a href="frame.php?product=250"><img style="max-width:10em; max-height:10em;" src="pictures/superdryjuki.png" /></a></div></td>
<td><p><b>Bright Frames</b> – Be bold by owning a pair of bright colourful frames. 
The Superdry Juki frame is a bright, colourful frame, so you will stand out from the crowd.</p></td>
</tr>
<tr>
<td><div class="image"><a href="frame.php?product=252"><img style="max-width:10em; max-height:10em;" src="pictures/williammorris6941.png" /></a></div></td>
<td><p><b>Geek Sheek</b> – Also known as the “Mathematical” eyewear trend this look takes inspiration from angular frames. 
For colours dark colours and tortoiseshell work well. 
William Morris 6941 are perfect for a geek sheek look.</p></td>
</tr>
<tr>
<td><div class="image"><a href="frame.php?product=248"><img style="max-width:10em; max-height:10em;" src="pictures/gsmilanogs2274.png" /></a></div></td>
<td><p><b>Simplistic</b> – Simplistic eyewear was huge on the fashion catwalks this year, and it looks like the trend is set to continue. 
So your eyewear needs to be inspired by a simplistic, utilitarian look. 
We think this GS Milano frame does the job just perfectly!</p></td>
</tr>
</tbody>
</table>
</body>
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

}(this, this.document));
</script>
</fieldset>
</div>
</html>
