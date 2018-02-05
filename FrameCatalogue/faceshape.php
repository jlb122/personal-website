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
<title>Face Shapes</title>
</head>
<style>
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
		<h2 class="fs-title">Face Shapes</h2>
<table>
<tbody style='display: inline-block; border-spacing: 1em; '>
<tr>
<th>Square</th>
</tr>
<tr>
<td><a href="viewall.php?shape%5Bsquare%5D=square"><img style="max-width:10em; max-height:10em;" src="faceshape/square.gif" /></a></td>
<td><p>A square face has a broad, deep forehead, wide jaw line and square chin. Choose round style frames to soften the jaw line.
<br><br>
<b>TRY:</b>   Round and oval style frames with sides set at the top of the frame.<br><br>
<b>AVOID:</b>   Thin, angular and square styles, and those with colour emphasis on the bottom rim.</p></td>
</tr>
<tr>
<th>Oval</th>
</tr>
<tr>
<td><a href="viewall.php?shape%5Boval%5D=oval"><img style="max-width:10em; max-height:10em;" src="faceshape/oval.gif" /></a></td>
<td><p>An oval face is well balanced and softly rounded; the forehead is slightly wider than the jaw, which curves gently, and the cheekbones are high.
<br><br>
<b>TRY:</b>   Modern small, geometric styles.
<br><br>
<b>AVOID:</b>   Styles that are uncomfortable to wear or that you feel do not suit your face.</p></td>
</tr>
<tr>
<th>Round</th>
</tr>
<tr>
<td><a href="viewall.php?shape%5Bround%5D=round"><img style="max-width:10em; max-height:10em;" src="faceshape/round.gif" /></a></td>
<td><p>A round face is fairly short with a wide forehead, often with full cheeks and a rounded chin.
<br><br>
<b>TRY:</b>   Styles that are wider than they are deep, and square or upswept shapes that draw attention to your upper face. Choose styles with high set sides, and those with colour or decoration on the temples.
<br><br>
<b>AVOID:</b>   Small and round shapes and very large frames which will make your face look rounder.</p></td>
</tr>
<tr>
<th>Triangle</th>
</tr>
<tr>
<td><a href="viewall.php?shape%5Btriangle%5D=triangle"><img style="max-width:10em; max-height:10em;" src="faceshape/triangle.gif" /></a></td>
<td><p>This type of face shape has a comparatively narrow forehead and eye line, broadening to the jaw line.
<br><br>
<b>TRY:</b>   Bold styles as they will add balance to the face.
<br><br>
<b>AVOID:</b>   Small Narrow frames.</p></td>
</tr>
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
