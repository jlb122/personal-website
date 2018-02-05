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
<title>Frame Shapes</title>
</head><style>
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
		<h2 class="fs-title">Frame Shapes</h2>
<table>
<tbody style='display: inline-block; border-spacing: 1em; '>
<tr>
<th><a href="viewall.php?type%5Brectangle%5D=rectangle">Rectangle</a></th>
</tr>
<tr>
<td><a href="viewall.php?type%5Brectangle%5D=rectangle"><div class="image"><img style="max-width:10em; max-height:10em;" src="pictures/ganttgkenso1.png" /></div></td></a>
<td><p>Rectangular eyewear is characterized by frames that are wider than they are tall. Sharp-edged rectangle frames convey a sporty or architectural look, while rectangles with rounded edges offer a softer, more understated look. Ideal for people with round or oval faces.
</p></td>
</tr>
<tr>
<th><a href="viewall.php?type%5Boval%5D=oval">Oval</a></th>
</tr>
<tr>
<td><a href="viewall.php?type%5Boval%5D=oval"><div class="image"><img style="max-width:10em; max-height:10em;" src="pictures/jklondon8588.png" /></div></a></td>
<td><p>Oval eyewear is characterized by rounded frames that are wider than they are tall. Oval frames soften angularity while their low profile allows your facial features to take center stage. Ideal for people with square or diamond faces.
</p></td>
</tr>
<tr>
<th><a href="viewall.php?type%5Bround%5D=round">Round</a></th>
</tr>
<tr>
<td><a href="viewall.php?type%5Bround%5D=round"><div class="image"><img style="max-width:10em; max-height:10em;" src="pictures/ganttrugger.png" /></div></a></td>
<td><p>Round eyewear is characterized by curved frames that are equally wide and tall. Round frames soften angular faces, with perfectly circular shapes conveying a vintage look. Ideal for people with square, oblong, or heart-shaped faces.
</p></td>
</tr>
<tr>
<th><a href="viewall.php?type%5Bsquare%5D=square">Square</a></th>
</tr>
<tr>
<td><a href="viewall.php?type%5Bsquare%5D=square"><div class="image"><img style="max-width:10em; max-height:10em;" src="pictures/williammorris7719.png" /></div></a></td>
<td><p>Square eyewear is characterized by angular frames that are equally wide and tall. Square frames add contrast to soft facial curves and help shorten longer faces. Ideal for people with round, oblong, or oval faces.</p></td>
</tr>
<tr>
<th><a href="viewall.php?type%5Bcateye%5D=cateye">Cat-Eye</a></th>
</tr>
<tr>
<td><a href="viewall.php?type%5Bcateye%5D=cateye"><div class="image"><img style="max-width:10em; max-height:10em;" src="pictures/williammorris9912.png" /></div></a></td>
<td><p>Popular among women, Cat-eye eyewear is characterized by rounded frames that flare out near the temples. Cat-eye frames became popular in the 1950s and 1960s but still have a loyal following amongst women with a retro style. Cat-eye-shaped frames tend to be more playful and are ideal for women with square or diamond faces.</p></td>
</tr>
<tr>
<th><a href="viewall.php?type%5Bwrap%5D=wrap">Wrap-Around</a></th>
</tr>
<tr>
<td><a href="viewall.php?type%5Bwrap%5D=wrap"><div class="image"><img style="max-width:10em; max-height:10em;" src="pictures/oakleyox980370154.png" /></div></a></td>
<td><p>Wrap-around eyewear is characterized by semi-circular frames that curve around the head for a panoramic-type view. Wrap-around frames often convey a sporty, masculine look. The wider field of vision created by the added lens width of wrap-around eyewear is essential for athletes who rely on their peripheral vision for optimal sports performance. Wrap-around frames are ideal for people with heart-shaped, oval, or diamond faces.</td></p>
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
