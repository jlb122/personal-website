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
<title>Frame Dispense Request</title>
</head>
<style>


.p {
    font-size:18px;
	font-weight:600;
	color: #ed145a;
border-bottom: 1px solid #000;
padding-bottom: 6px;
border-top: 1px solid #000;
padding-top: 6px;
margin-left:auto;
margin-right:auto;
width:909px;
}

@media (max-width: 1000px) {
table,tbody,td, p{
display:block;
}
label{
display:block;
}
td:nth-child(2){
   margin-top: 25px;
}
.p {
    font-size:18px;
		font-weight:600;

	font-weight:bold;
border-bottom: 1px solid #000;
padding-bottom: 3px;
border-top: 1px solid #000;
padding-top: 3px;
margin-left:auto;
margin-right:auto;
width:223px;}
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
		<h2 class="fs-title">Frame Dispense Request</h2>
<br>
    <form class="form" method="post" id="form" action="mail1.php">
      
      <p class="p">
        Full Name: *</p><br><h4 style="color:#ed145a"><input name="name" style="width:200px;"type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Full Name" id="name" name="name" /></h4>
      <br>
      <p class="p">
	  E-Mail: *      </p><br>
        <h4 style="color:#ed145a"><input name="email" type="email" style="width:200px;" class="validate[required,custom[email]] feedback-input" id="email"  name ="email"placeholder="Email"/></h4>
	  <br>
	   <p class="p">
       Contact Number: *</p><br><h4 style="color:#ed145a"><input name="number" style="width:200px;"type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Contact Number" id="number" name="number" /></h4>
      <br>
	<p class="p">Have You Been To 4Eyes In The Last Year? *</p><h4 style="color:#ed145a; border:none"><input type="radio" name="first" required></h4><br><br><input type="radio" name="first" id="no" value="No"><label for ="no">No</label><input type="radio" name="first" id="yes" value="Yes"><label for ="yes">Yes</label><br><br> 
	<p class="p">Are You A Student? *</p><h4 style="color:#ed145a; border:none"><input type="radio" name="student" required></h4><br><br><input type="radio" name="student" id="nostudent" value="No"><label for ="nostudent">No</label><input type="radio" name="student" id="student" value="Yes"><label for ="student">Yes</label><br><br>
	      <?php
	if(isset($_SESSION["products"]))
	{
	echo  "<p class='p'>Use Wishlist to Reserve Frames? *</p><h4 style='color:#ed145a; border:none'><input type='radio' name='wishlist' required></h4><br><br><input type='radio' name='wishlist' id='wishlistno' value='No'><label for ='wishlistno'>No</label><input type='radio' name='wishlist' id='wishlist' value='Yes' checked><label for ='wishlist'>Yes</label><br><br> ";
			}
			else{

	}
?>
	<p class="p">
	  Anything Else:      </p><br><br>
        <textarea name="content" style="height:100px; width:200px;" class="validate[required,length[6,300]] feedback-input"  id="content" placeholder="Write Here..."></textarea>
		<br><br><input type="submit" name="next" class="next action-button" value="Send" />

    </form>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="js/jquery.easing.min.js" type="text/javascript"></script>
<script src='js/jquery.bpopup.min.js'></script>
<script type="text/javascript" src="jquery.cookiebar.js"></script>
<script src='js/jquery.validate.min.js'></script>
<script>
			$(document).ready(function(){
				$.cookieBar({
				});
			});
			
    $('#form').validate({ // initialize the plugin
	 	ignore: 'hidden',
        rules: {
		  name: {
                required: true,
            },
            email: {
                required: true,
            },
            number: {
                required: true,
				number: true,
            },
			date: {
                required: true,
            },
        },
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


/**
 * fastLiveFilter jQuery plugin 1.0.3
 * 
 * Copyright (c) 2011, Anthony Bush
 * License: <http://www.opensource.org/licenses/bsd-license.php>
 * Project Website: http://anthonybush.com/projects/jquery_fast_live_filter/
 **/

jQuery.fn.fastLiveFilter = function(list, options) {
	// Options: input, list, timeout, callback
	options = options || {};
	list = jQuery(list);
	var input = this;
	var lastFilter = '';
	var timeout = options.timeout || 0;
	var callback = options.callback || function() {};
	
	var keyTimeout;
	
	// NOTE: because we cache lis & len here, users would need to re-init the plugin
	// if they modify the list in the DOM later.  This doesn't give us that much speed
	// boost, so perhaps it's not worth putting it here.
	var lis = list.children();
	var len = lis.length;
	var oldDisplay = len > 0 ? lis[0].style.display : "block";
	callback(len); // do a one-time callback on initialization to make sure everything's in sync
	
	input.change(function() {
		// var startTime = new Date().getTime();
		var filter = input.val().toLowerCase();
		var li, innerText;
		var numShown = 0;
		for (var i = 0; i < len; i++) {
			li = lis[i];
			innerText = !options.selector ? 
				(li.textContent || li.innerText || "") : 
				$(li).find(options.selector).text();
			
			if (innerText.toLowerCase().indexOf(filter) >= 0) {
				if (li.style.display == "none") {
					li.style.display = oldDisplay;
				}
				numShown++;
			} else {
				if (li.style.display != "none") {
					li.style.display = "none";
				}
			}
		}
		callback(numShown);
		// var endTime = new Date().getTime();
		// console.log('Search for ' + filter + ' took: ' + (endTime - startTime) + ' (' + numShown + ' results)');
		return false;
	}).keydown(function() {
		clearTimeout(keyTimeout);
		keyTimeout = setTimeout(function() {
			if( input.val() === lastFilter ) return;
			lastFilter = input.val();
			input.change();
		}, timeout);
	});
	return this; // maintain jQuery chainability
}
</script>
</div>
</div>
</div>
</body>
		</html>
