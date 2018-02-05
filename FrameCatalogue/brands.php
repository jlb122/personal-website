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
<title>Brands</title>
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
		<h2 class="fs-title">Brands Include:</h2>
<table>
<tbody style='display: inline-block; border-spacing: 2em; '>
<tr>
<td><a href="search.php?keyword=armani"><img style="max-width:10em; max-height:10em;" src="http://www.4eyesopticians.co.uk/images/emporio-logo.gif" /></a></td>
<td><p>Emporio Armani are a range for that sophisticated, stylish, fashionable, patient with cat walk detail. Founded by Giorgio Armani, Emporio Armani is the trendy fashion forward line of the brand. Its playful sport build on classic styles and seasonal twist to make it vibrant and appealing.</p></td>
</tr>
<tr>
<td><a href="search.php?keyword=guess"><img style="max-width:10em; max-height:10em;" src="http://www.4eyesopticians.co.uk/images/guess-logo.gif" /></a></td>
<td><p>Guess cater for a youthful, fresh fashion forward customer and are sought after by both men and women with a keen eye for style. The collection is sexy yet chic and compliments the glamorous lifestyle of Guess. <br>Guess flatter most face shapes. Its modern takes on classic styles featuring details such as snakeskin, vivid colours and diamantes, remind us that this brand is on-trend Italian styling at a good price point.</p></td>
</tr>
<tr>
<td><a href="search.php?keyword=harley"><img style="max-width:10em; max-height:10em;" src="http://www.4eyesopticians.co.uk/images/harley-logo.gif" /></a></td>
<td><p>Harley Davidson styles offer gradient colorations with an oversized rectangle shape complemented by a stainless steel flat metal front and carbon fiber temples. Ultra-lightweight plastic frames and rounded rectangle shapes featuring the Harley Davidson bar & shield logo bring a custom look to this collection. Weighted tips, make these a better balanced frame.</p></td>
</tr>
<tr>
<td><a href="search.php?keyword=fathead"><img style="max-width:10em; max-height:10em;" src="http://www.4eyesopticians.co.uk/images/fatheadz-logo.gif" /></a></td>
<td><p>Fatheadz prescription frames are specifically designed for people with larger than average heads. We offer metal and plastic frames, most with spring temple hinges and adjustable nose pads.
</p></td>
</tr>
<tr>
<td><a href="search.php?keyword=manish"><img style="max-width:10em; max-height:10em;" src="http://www.4eyesopticians.co.uk/images/manish-arora-logo.gif" /></a></td>
<td><p>
Manish Arora fuses western fashion influences with rich colours and handicrafts of his native India. Manish’s collections are loved by fashion insiders for their colourful, quirky and unique range.
</p></td>
</tr>
<tr>
<td><a href="search.php?keyword=oakley"><img style="max-width:10em; max-height:10em;" src="http://www.4eyesopticians.co.uk/images/oakley-logo.gif" /></a></td>
<td><p>
Oakley is renowned for their H.D.O (High Definition Optics) and they continue to use this ground breaking technology in their designs this season. This little bit of science provides maximum clarity, whilst protecting from harmful ultra violet rays. The lenses don't just stop there though as they are re-enforced with a hydrophobic coating, preventing moisture build up, meaning no smudges, dirt, dust or oil sticking to the lenses. Oakley has the rare capabilities to blend science with art. Their extensive range is as good looking as it is well made, tough, corrosion resistant and they have effortlessly combined performance technology with fashion.
</p></td>
</tr>
<tr>
<td><a href="search.php?keyword=reykjavik"><img style="max-width:10em; max-height:10em;" src="http://www.4eyesopticians.co.uk/images/reykjavik-logo.gif" /></a></td>
<td><p>
Reykjavik, Multi award winning, light weight, strong and flexible, Reykjavik Eyes glasses are one of the most comfortable and durable frames in the world. Reykjavik Eyes frames are innovatively constructed from a single sheet of pure beta titanium. A revolution in spectacle frame design, these pure titanium glasses are completely screw-less with no hinges and no joints thus giving them a cutting edge on thin light and tough frames.
</p></tr>
<tr>
<td><a href="search.php?keyword=superdry"><img style="max-width:10em; max-height:10em;" src="http://www.4eyesopticians.co.uk/images/superdry-logo.gif" /></a></td>
<td><p>
Superdry's collection draws its inspiration from the iconic brand itself. With an eclectic range of colorations, intricate details, and materials, the collection features styles that are both classic and contemporary in design. Highlights of the collection include details such as the iconic bar and shield logo on branded chrome temple tips, sleek cut out temples, stone accents, and leather accented temples young, trendy, good build and quality.
</p></tr>
<tr>
<td><a href="search.php?keyword=gant"><img style="max-width:10em; max-height:10em;" src="http://www.4eyesopticians.co.uk/images/gant-logo.gif" /></a></td>
<td><p>
Classic Gant Eyeglasses Eyewear collection reflects the American style that is the heart of the brand, with Eyeglasses Eyewear designs for the thirty-something man who demands function and good looks. Authentic Gant Eyeglasses Eyewear combines essential styling for everyday use.
</p></tr>
<tr>
<td><a href="search.php?keyword=jk"><img style="max-width:10em; max-height:10em;" src="http://www.4eyesopticians.co.uk/images/jai-kudo-logo.gif" /></a></td>
<td><p>
J K LONDON eyewear is heavily influenced by both street style and high-end fashion,
the J K LONDON look is confident, urban, directional, fresh and fun.
</p></tr>
<tr>
<td><a href="search.php?keyword=caterpillar"><img style="max-width:10em; max-height:10em;" src="http://www.4eyesopticians.co.uk/images/cat-logo.gif" /></a></td>
<td><p>
Caterpillar was formed in 1925 by two tractor companies joining forces. In 1990’s the company continued to expand introducing licenced products under the name ‘CAT’ such as footwear and optics. The collection Caterpillar are made using the best structural materials with first class engineering and made for everyday wear.
</p></tr>
<tr>
<td><a href="search.php?keyword=neill"><img style="max-width:10em; max-height:10em;" src="http://www.4eyesopticians.co.uk/images/o-neill-logo.gif" /></a></td>
<td><p>
O'Neill, the original California surf, snow and youth lifestyle brand, was founded in 1952 when a young man named Jack O'Neill took his unstoppable passion for surfing and used it to beat Mother Nature at her own game.

The O'Neill eyewear collection draws inspiration from California beach sunsets, the rugged wilderness of the Nor-Cal coast and the passion Jack O'Neill had for his surfing roots.
</p></tr>
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
