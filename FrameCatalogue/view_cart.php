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
<title>Wishlist</title>
</head>
<style>
.request{
margin-top:5px;
}
.empty{
margin-top:5px;
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
<div id="products-wrapper">
		<h2 class="fs-title">Wishlist</h2>
				<input id="search_input" placeholder="Type to filter results">

 	<?php
	error_reporting(E_ERROR);

	    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo "<div class='basket'>";
	echo '<a href="contact.php">'.'<button class="request">Request Eyetest</button>'.'</a>';
	echo '<a href="enquire.php">'.'<button class="request">Request Frame Dispense</button>'.'</a><br>';
	echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'"><button class="empty" OnClick=\'return confirm("Are You Sure You Want To Delete All Frames In The Wishlist?");\'>Empty Wishlist</button></a></span><br>';
	echo "</div>";
	echo '<br>';
	echo "<table id ='search_list' class='table'>";

	if(isset($_SESSION["products"]))
    {
		foreach ($_SESSION["products"] as $cart_itm)
        {
           $id = $cart_itm["id"];
		   $query = $db->query("SELECT * FROM $dbname.glasses WHERE id='$id' LIMIT 1");
		   $obj = $query->fetch_object();
		   
echo "<tbody style='display: inline-block;';>";
		   
        echo '<tr>';
		echo '<td style="float:left;">'.'<a href=frame.php?product='.$obj->id.'>'.$cart_itm["glasses"].'</a></td>';
		echo '</tr>';
        echo '<tr>';
		echo '<td align="center" style="height:110px;"><a href=frame.php?product='.$obj->id.'>'.'<div class="image"><img src="'.$obj->image.'"></div></a></td>';
        echo '</tr>';
        echo '<tr>';
		echo '<td align="left" style="font-size:12px;"><a href=frame.php?product='.$obj->id.'>'.$obj->gender."</a></td>";
        echo '</tr>';
        echo '<tr>';
        echo '<div class="p-price"><td align="left"><a href=frame.php?product='.$obj->id.'>'.$currency.$cart_itm["price"].'</a></td></div>';
        echo '</tr>';
		echo '<tr>';
		echo '<td align="center">'.'<a href="cart_update.php?removep='.$cart_itm["id"].'&return_url='.$current_url.'"><button style="background-color:darkred; color:white;">Remove From Wishlist</button>'."</a></td>";
        echo '</tr>';		
		if (!empty($obj->tmo)){
        echo '<tr>';
		echo '<td align="center"`>'."<a href=".$obj->tmo." target=_blank>".'<input type="button" name="tryme" value="Live Try On" style ="background-color:#1e1547; color:white;"/>'.'</a>'."</td>";
        echo '</tr>';
		}
		if (!empty($obj->static)){
		echo "<tr>";
		echo '<td align="center"`>'.'<input type="button" name="static.php?id='.$obj->id.'&shape='.$obj->shape.'&gender='.$obj->gender.'&static='.$obj->static.'" class="my-button" value="Static Try On" style ="background-color:#1e1547; color:white;"/>'."</td>";
		echo "</tr>";
		}
        }

    }else{
	echo '<br>';
	echo '<br>';
		echo '<h3>Your wishlist is empty!</h3><br><br>';
	}
	echo "</table>";
    ?>
</div>
</body>
            <div id="element_to_pop_up"><span span style="cursor:pointer" class="button b-close"><span>X</span></span>
<div class="content"></div></div>
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

 ;(function($) {

         // DOM Ready
        $(function() {

            // Binding a click event
            // From jQuery v.1.7.0 use .on() instead of .bind()
            $('.my-button').on('click', function(e) {
			var data = $(this).attr("name"); //Get your attribute

                // Prevents the default action to be triggered. 
                e.preventDefault();

                // Triggering bPopup when click event is fired
		$('#element_to_pop_up').bPopup({
            content:'iframe', //'ajax', 'iframe' or 'image'
            contentContainer:'.content',
            loadUrl:data //Uses jQuery.load()
        });
                
            });

        });

    })(jQuery);	
	

  $(function() {
        $('#search_input').fastLiveFilter('#search_list');
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
</html>
