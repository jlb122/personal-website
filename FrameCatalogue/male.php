<!-- multistep form -->
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
  <link rel="stylesheet" href="css/jquery-ui.css">
 <link rel="shortcut icon" href="icon.ico">
<link rel="stylesheet" type="text/css" href="jquery.cookiebar.css" />
<link rel="stylesheet" type="text/css" href="css/4eyes.css" />
<title>Male Frame Recommender</title>
<style>
input[type='radio'], input[type='checkbox'], input[type='submit']{
	display:none;
}
</style>
</head>
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
 
<form id="msform" action="site2male.php" method="get">
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">Age</li>
		<li>Face Shape</li>
		<li>Frame Shape</li>
		<li>Colour</li>
		<li>Material</li>
		<li>Usage</li>
		<li>Clothing</li>
		<li>Result</li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">Age</h2>
		<h3 class="fs-subtitle">What is your age group?</h3><br>
		<input type="radio" name="age" id="14" value=">14" class ="next action-button" />
		<label for="14" class="action-buttonage">
		<p>>14</p>
		</label>
		<input type="radio" name="age" id="15"  value="15-25" class ="next action-button" />
		<label for="15" class="action-buttonage">
		<p>15-25</p>
		</label>
		<input type="radio" name="age" id="26"  value="26-40" class ="next action-button"/>
		<label for="26" class="action-buttonage">
		<p>26-40</p>
		</label>
		<input type="radio" name="age" id="41"  value="41-64" class ="next action-button"/>
		<label for="41" class="action-buttonage">
		<p>41-64</p>
		</label>
		<input type="radio" name="age" id="65" value="65+" class ="next action-button"/>
		<label for="65" class="action-buttonage">
		<p>65+</p>
		</label><br>

	</fieldset>
	<fieldset>
		<h2 class="fs-title">Face Shape</h2>
		<h3 class="fs-subtitle">Please Select Your Face Shape.</h3><br>
		<div id="question">
		<a href="faceshape.php" target="_blank"><div><img src="question.png" style="max-width:1.5em;"><br><p style="color:#ed145a">Help Me</p></div></a>
		</div>
		<input type="radio" name="shape" id="square" value="Square" class ="next action-button"/>
		<label for="square"  title="A square face has a broad, deep forehead, wide jaw line and square chin. " class="action-buttonshape">
		<img style="max-width:2.5em; max-height:2.5em;" src="http://designer-hair-headbands.com/wp-content/uploads/2013/11/square-face-shape-headbands.gif" />
		<p style="font-size:28px; margin-top:.5em;">Square</p>
		</label>
		<input type="radio" name="shape" id="oval" value="Oval"class ="next action-button"/>
		<label for="oval" title="An oval face is well balanced and softly rounded; the forehead is slightly wider than the jaw, which curves gently, and the cheekbones are high. " class="action-buttonshape">
		<img style="max-width:2.5em; max-height:2.5em;" src="http://www.fashioneyewear.co.uk/blog/wp-content/uploads/2011/12/oval.gif"/>
		<p style="font-size:28px; margin-top:.5em;">Oval</p>
		</label>
		<input type="radio" name="shape" id="round" value="Round" class ="next action-button"/>
		<label for="round" title="Styles that are wider than they are deep, and square or upswept shapes that draw attention to your upper face. Choose styles with high set sides, and those with colour or decoration " class="action-buttonshape">
		<img style="max-width:2.5em; max-height:2.5em;" src="http://www.fashioneyewear.co.uk/blog/wp-content/uploads/2011/12/round.gif"/>
		<p style="font-size:28px; margin-top:.5em;">Round</p>
		</label>
		<input type="radio" name="shape" id="triangle" value="Triangle" class ="next action-button"/>
		<label for="triangle" title="This type of face shape has a comparatively narrow forehead and eye line, broadening to the jaw line." class="action-buttonshape">
		<img style="max-width:2.5em; max-height:2.5em;" src="http://www.fashioneyewear.co.uk/blog/wp-content/uploads/2011/12/triangle.gif"/>
		<p style="font-size:28px; margin-top:.5em;">Triangle</p>
		</label><br>
		<input type="radio" name="shape" id="ns" class ="next action-button"/>
		<label for="ns" class="action-buttonage">
		<p style="font-size:28px"> Skip </p>
		</label><br>
		<input type="button" name="previous" class="previous action-button-previous" value="Go Back" />
 
	</fieldset>
	
	<fieldset>
		<h2 class="fs-title">Frame Shape</h2>
		<h3 class="fs-subtitle">Which Frames Suit You Best (Select All Appropriate)</h3><br> 
		<div id="question">
		<a href="frameshape.php" target="_blank"><div><img src="question.png" style="max-width:1.5em;"><br><p style="color:#ed145a">Help Me</p></div></a>
		</div>
		<input type="checkbox" name="type[]" id="rectangle1" value="Rectangle" onchange="document.getElementById('next').disabled = !this.checked;"/>
		<label for="rectangle1" class="action-buttonshape" title="Rectangular eyewear is characterized by frames that are wider than they are tall. Sharp-edged rectangle frames convey a sporty or architectural look, while rectangles with rounded edges offer a softer, more understated look. Ideal for people with round or oval faces.">
		<img src="pictures/ganttgkenso1.png" style="max-width:2.5em; height:1.05em;"/>
		<p style="font-size:28px; margin-top:.5em;">Rectangle</p>
		</label>
		<input type="checkbox" name="type[]" id="oval1" value="Oval" onchange="document.getElementById('next').disabled = !this.checked;"/>
		<label for="oval1" class="action-buttonshape" title="Oval eyewear is characterized by rounded frames that are wider than they are tall. Oval frames soften angularity while their low profile allows your facial features to take center stage. Ideal for people with square or diamond faces.">
		<img src="pictures/jklondon8588.png" style="max-width:2.5em; max-height:1.5em;"/>
		<p style="font-size:28px; margin-top:.5em;">Oval</p>
		</label>
		<input type="checkbox" name="type[]" id="round1" value="Round" onchange="document.getElementById('next').disabled = !this.checked;"/>
		<label for="round1" class="action-buttonshape" title="Round eyewear is characterized by curved frames that are equally wide and tall. Round frames soften angular faces, with perfectly circular shapes conveying a vintage look. Ideal for people with square, oblong, or heart-shaped faces.">
		<img src="pictures/ganttrugger.png" style="max-width:2.5em; max-height:1.5em;"/>
		<p style="font-size:28px; margin-top:.5em;">Round</p>
		</label>
		<input type="checkbox" name="type[]" id="square1" value="Square" onchange="document.getElementById('next').disabled = !this.checked;"/>
		<label for="square1" class="action-buttonshape" title="Square eyewear is characterized by angular frames that are equally wide and tall. Square frames add contrast to soft facial curves and help shorten longer faces. Ideal for people with round, oblong, or oval faces.">
		<img src="pictures/williammorris7719.png" style="max-width:2.5em; max-height:1.5em;"/>
		<p style="font-size:28px; margin-top:.5em;">Square</p>
		</label>
		<input type="checkbox" name="type[]" id="wrap" value="wrap" onchange="document.getElementById('next').disabled = !this.checked;"/>
		<label for="wrap" class="action-buttonshape" title="Wrap-around eyewear is characterized by semi-circular frames that curve around the head for a panoramic-type view. Wrap-around frames often convey a sporty, masculine look. The wider field of vision created by the added lens width of wrap-around eyewear is essential for athletes who rely on their peripheral vision for optimal sports performance. Wrap-around frames are ideal for people with heart-shaped, oval, or diamond faces.">
		<img src="pictures/oakleyox980370154.png" style="max-width:2.5em; max-height:1.5em;"/>
		<p style="font-size:28px; margin-top:.5em;">Wrap-Around</p>
		</label>
		<input type="checkbox" name="type" id="surprise" onchange="document.getElementById('next').disabled = !this.checked;"/>
		<label for="surprise" class="action-buttonage">
		<p style="font-size:28px;"> Surprise Me </p>
		</label><br>
		<input type="button" name="previous" class="previous action-button" value="Go Back" />
		<input type="button" name="next" id="next" class="next action-button" value="Advance" disabled />

	</fieldset>
		<fieldset>
		<h2 class="fs-title">Frame Colour</h2>
		<h3 class="fs-subtitle">What Frame Colour Would You Like? (Select All Appropriate)</h3>
		<input type="checkbox" name="colour[]" id="green" value="Green" onchange="document.getElementById('next1').disabled = !this.checked;"/>
		<label for="green" class="action-buttonshape">
		<img src="colour/green.jpg" style="max-width:1em; max-height:1em;"/>
		<p style="font-size:28px; margin-top:.5em;">Green</p>
		</label>
		<input type="checkbox" name="colour[]" id="blue" value="Blue" onchange="document.getElementById('next1').disabled = !this.checked;"/>
		<label for="blue" class="action-buttonshape">
		<img src="colour/blue.svg" style="max-width:1em; max-height:1em;"/>
		<p style="font-size:28px; margin-top:.5em;">Blue</p>
		</label>
		<input type="checkbox" name="colour[]" id="black" value="Black" onchange="document.getElementById('next1').disabled = !this.checked;"/>
		<label for="black" class="action-buttonshape">
		<img src="colour/black.jpg" style="max-width:1em; max-height:1em;"/>
		<p style="font-size:28px; margin-top:.5em;">Black</p>
		</label>
		<input type="checkbox" name="colour[]" id="grey" value="Grey" onchange="document.getElementById('next1').disabled = !this.checked;"/>
		<label for="grey" class="action-buttonshape">
		<img src="colour/grey.jpg" style="max-width:1em; max-height:1em;"/>
		<p style="font-size:28px; margin-top:.5em;">Grey</p>
		</label>
		<input type="checkbox" name="colour[]" id="brown" value="Brown" onchange="document.getElementById('next1').disabled = !this.checked;"/>
		<label for="brown" class="action-buttonshape">
		<img src="colour/brown.jpg" style="max-width:1em; max-height:1em;"/>
		<p style="font-size:28px; margin-top:.5em;">Brown</p>
		</label>
		<input type="checkbox" name="colour[]" id="red" value="Red" onchange="document.getElementById('next1').disabled = !this.checked;"/>
		<label for="red" class="action-buttonshape">
		<img src="colour/red.jpg" style="max-width:1em; max-height:1em;"/>
		<p style="font-size:28px; margin-top:.5em;">Red</p></label>
		<input type="checkbox" name="colour" id="any" onchange="document.getElementById('next1').disabled = !this.checked;"/>
		<label for="any" class="action-buttonage">
		<p style="font-size:28px;"> Surprise Me </p>
		</label><br><input type="button" name="previous" class="previous action-button" value="Go Back" />
		<input type="button" name="next" id="next1" class="next action-button" value="Advance" disabled />

	</fieldset>
	
	
	<fieldset>
		<h2 class="fs-title">Frame Material</h2>
		<h3 class="fs-subtitle">What Frame Material Would You Like?</h3>
		<input type="radio" name="material" id="metal" value="Metal"class="next action-button" />
		<label for="metal" class="action-buttonage">
		<p style="font-size:30px;">Metal</p>
		</label>
		<input type="radio" name="material" id="plastic"  value="Plastic" class="next action-button"/>
		<label for="plastic" class="action-buttonage">
		<p style="font-size:30px;">Plastic</p>
		</label>
		<input type="radio" name="material" id="np" class="next action-button" />
		<label for="np" class="action-buttonage">
		<p style="font-size:30px;">Surprise Me</p>
		</label>
		<br>
		<input type="button" name="previous" class="previous action-button" value="Go Back" />

		
	</fieldset>
	
	
		<fieldset>
		<h2 class="fs-title">Frame Usage</h2>
		<h3 class="fs-subtitle">How much will the frame be used?</h3>
		<input type="radio" name="usage" id="rarely" value="Rarely" class="next action-button"/>
		<label for="rarely" class="action-buttonage">
		<p style="font-size:30px;">Rarely</p>
		</label>
		<input type="radio" name="usage" id="sometimes"  value="Sometimes" class="next action-button"/>
		<label for="sometimes" class="action-buttonage">
		<p style="font-size:30px;">Sometimes</p>
		</label>
		<input type="radio" name="usage" id="often"  value="Often" class="next action-button"/>
		<label for="often" class="action-buttonage">
		<p style="font-size:30px;">Often</p>
		</label>
		<input type="radio" name="usage" id="att"  value="AllTheTime" class="next action-button"/>
		<label for="att" class="action-buttonage">
		<p style="font-size:30px;">All The Time</p>
		</label>
		<input type="radio" name="usage" id="ns1" class="next action-button"/>
		<label for="ns1" class="action-buttonage">
		<p style="font-size:30px;">Skip</p>
		</label>
		<br>
		<input type="button" name="previous" class="previous action-button" value="Go Back" />
		
	</fieldset>
	
		<fieldset>
		<h2 class="fs-title">Clothing</h2>
		<h3 class="fs-subtitle">Which Type Of Clothing Do You Wear Most?</h3><br>
		<div id="question">
		<a href="clothing.php" target="_blank"><div><img src="question.png" style="max-width:1.5em;"><br><p style="color:#ed145a">Help Me</p></div></a>
		</div>
		<input type="submit" name="lifestyle" id="casual" value="casual" />
		<label for ="casual" class="submit action-buttonage">
		<p style="font-size:30px;">Casual</p>
		</label>
		<input type="submit" name="lifestyle" id="businesscasual" value="businesscasual" />
		<label for ="businesscasual" class="submit action-buttonage">
		<p style="font-size:30px;">Business Casual</p>
		</label>
		<input type="submit" name="lifestyle" id="smartcasual" value="smartcasual" />
		<label for ="smartcasual" class="submit action-buttonage">
		<p style="font-size:30px;">Smart Casual</p>
		</label>
		<input type="submit" name="lifestyle" id="businesssmart" value="businesssmart" />
		<label for ="businesssmart" class="submit action-buttonage">
		<p style="font-size:30px;">Business Smart</p>
		</label>
		<input type="submit" name="lifestyle" id="surpriseme" value="on"/>
		<label for="surpriseme" class="action-buttonage">
		<p style="font-size:28px;"> Surprise Me </p>
		</label><br>		
		<input type="button" name="previous" class="previous action-button" value="Go Back" />
		
	</fieldset>
</form>


<!-- jQuery -->
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="js/jquery.easing.min.js" type="text/javascript"></script>
<script src='js/jquery.bpopup.min.js'></script>
<script type="text/javascript" src="jquery.cookiebar.js"></script>
<script src="js/jquery-ui.js"></script>
<script>	
			$(document).ready(function(){
				$.cookieBar({
				});
			});
			
			
   $(function() {
    $( document ).tooltip({
      position: {
        my: "center top",
        at: "center bottom",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });;
  });
/* 
Orginal Page: http://thecodeplayer.com/walkthrough/jquery-multi-step-form-with-progress-bar 


/*jQuery time*/
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
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