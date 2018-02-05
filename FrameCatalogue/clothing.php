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
<title>Dress Types</title>
</head>
<style>
li{
text-align:left;
font-size:15px;
}

th {
font-size:18px;
}

b{
font-size:20px;
}

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
		<h2 class="fs-title">Dress Types</h2>
<table>
<tbody style='display: inline-block; border-spacing: 3em; vertical-align:top; '>
<tr>
<td>
<p><b>Male</b></p>
<p><b>Casual</b></p>
</td>
<td>
<p>
<li>T-Shirt</li>
<li>Polo</li>
<li>Turtleneck</li>
<li>Casual button-down shirt</li>
<li>Sweater</li>
<br>
<li>Jeans</li>
<li>Trousers</li>
<li>Shorts</li>
<br>
<li>Trainers</li>
<li>Sandals</li>
<li>Loafers</li>
</p>
</td>
<td><p><b>Female</b></p>
<p><b>Casual</b></p></td>
<td>
<p>
<li>Sundress</li>
<li>T-Shirt</li>
<li>Casual button-down blouse</li>
<br>
<li>Long or Short Skirt</li>
<li>Jeans</li>
<li>Shorts</li>
<br>
<li>Trainers</li>
<li>Sandals</li>
</p>
</td>
</tr>
<tr>
<td>
<p><b>Male</b></p>
<p><b>Business Casual</b></p></td>
<td>
<p>
<li>Seasonal Sport Coat</li>
<li>Blazer</li>
<li>Dress Shirt</li>
<li>Casual button-down shirt</li>
<li>Polo Shirt</li>
<li>Optional Tie</li>
<br>
<li>Jeans</li>
<li>Trousers</li>
<br>
<li>Smart Shoes</li>
</p>
</td>
<td>
<p><b>Female</b></p>
<p><b>Business Casual</b></p></td>
<td>
<p>
<li>Dress</li>
<li>Dress style top</li>
<br>
<li>Skirt</li>
<li>Jeans</li>
<br>
<li>Slip On Shoes</li>
</p>
</td>
</tr>
<tr>
<td>
<p><b>Male</b></p>
<p><b>Smart Casual</b></p></td>
<td>
<p>
<li>Seasonal Sport Coat</li>
<li>Blazer</li>
<li>Dress Shirt</li>
<li>Casual button-down shirt</li>
<li>Polo Shirt</li>
<li>Optional Tie</li>
<br>
<li>Smart Jeans</li>
<li>Trousers</li>
<br>
<li>Loafers</li>
</p>
</td>
<td>
<p><b>Female</b></p>
<p><b>Smart Casual</b></p></td>
<td>
<p>
<li>Open-collar shirt or sweater</li>
<li>Dress</li>
<br>
<li>Skirt</li>
<li>Trousers</li>
<br>
<li>Slip On Shoes</li>
</p>
</td>
</tr>
<tr>
<td>
<p><b>Male</b></p>
<p><b>Business Smart</b></p></td>
<td>
<p>
<li>Dark Business Suit</li>
<li>Matching Vest (Optional)</li>
<li>Dress Shirt</li>
<li>Conservative Tie</li>
<br>
<li>Suit Trousers</li>
<br>
<li>Leather Dress Shoes</li>
</p>
</td>
<td>
<p><b>Female</b></p>
<p><b>Business Smart</b></p></td>
<td>
<p>
<li>Suit</li>
<li>Business-Style Dress</li>
<li>Dress with a Jacket</li>
<br>
<li>Stockings (Optional in Summer)</li>
<li>Suit Trousers</li>
<br>
<li>Heels</li>
</p>
</td>
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
