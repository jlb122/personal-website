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
<title><?php $title = mysqli_query($db,"SELECT * FROM $dbname.glasses WHERE id = ".$_GET['product'].""); 
$title = mysqli_fetch_array($title); echo ucwords($title['glasses']);?></title>
</head>
<style>
.table {
    font-size: 16px;
	text-transform: uppercase;
	color: #2C3E50;
    margin-left:auto; 
    margin-right:auto;
	max-width: 100%;	
	border-spacing: 1em;
}

tbody {
    vertical-align: top;
}

img {
    max-width: 20em;  
    max-height: 15em;    
	

}
@media (max-width: 450px) {
hr{
    width: 100%;  
}
img {
    max-width: 100%;  
}
#msform fieldset {
padding:0px}

.table {
    font-size: 13px;
	text-transform: uppercase;
	color: #2C3E50;
    margin-left:auto; 
    margin-right:auto;
	max-width: 100%;	
	border-spacing: .75em;
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
<?php
if(isset($_GET["product"]))
{
$query = "SELECT * FROM $dbname.glasses WHERE id='".$_GET['product']."'";
}
$sql = mysqli_query($db, $query);
if($sql === FALSE) {
    die(mysqli_error()); // TODO: better error handling
}
	
echo "<table id ='search_list' class='table'>";
	while($row = mysqli_fetch_array($sql))
{
echo '<div class="product">'; 
    echo '<th align="center" style="font-size:20px;;">'. $row ['glasses']."</th>";
echo "<tbody style='display: inline-block;';>";
echo "<tr>";
echo '<td align="center">'." <section id='gallery' class='simplegallery'>
            <div class='content' style='min-height:185px;'><span class='zoom' id='ex1'><img src=".$row['image']." class='image_1' alt='' ></span><span class='zoom' id='ex2'><img src=".$row['imageside']." class='image_2' alt='' style='display:none'></span>
			<span class='zoom' id='ex3'><img src=".$row['imagefront']." class='image_3' alt='' style='display:none'></span></div>
            <div class='thumbnail'>
                <div class='thumb'>
                    <a href='#' rel='1'>
                        <img src=".$row['image']." style ='width:100px; height:47.5px;' id='thumb_1' alt='' />
                    </a>
                </div>
                <div class='thumb'>
                    <a href='#' rel='2'>
                        <img src=".$row['imageside']." style ='width:100px; height:47.5px;' id='thumb_2' alt='' />
                    </a>
                </div>
				 <div class='thumb'>
                    <a href='#' rel='3'>
                        <img src=".$row['imagefront']." style ='width:100px; height:47.5px;' id='thumb_3' alt='' />
                    </a>
                </div>
				</div>
        </section>
"."</td>";
echo "</tr>";
if (!empty($row['tmo'])){
	echo "<tr>";
	echo '<td align="center"`>'.'<a href="live.php?id='.$row['id'].'&shape='.$row['shape'].'&gender='.$row['gender'].'&static='.$row['static'].'"><input type="button" style ="background-color:#1e1547; color:white;" value="Live Try On"/>'."</a></td>";
	echo "</tr>";
}
if (!empty($row['static'])){
	echo "<tr>";
	echo '<td align="center"`>'.'<input type="button" style ="background-color:#1e1547; color:white;"name="static.php?id='.$row['id'].'&shape='.$row['shape'].'&gender='.$row['gender'].'&static='.$row['static'].'" class="my-button" value="Try On"/>'."</td>";
	echo "</tr>";
}	
echo "</tbody>";
echo "<tbody style='display: inline-block;';>";
echo "<tr>";
	echo '<td align="center">'."Frame Shape:</td>";
	echo '<td align="center">'.$row ['type']."</td>";

echo "</tr>";
echo "<tr>";
	echo '<td align="center"">'. "Gender:</td>";
	echo '<td align="center"">'.$row ['gender']."</td>";
echo "</tr>";
echo "<tr>";
	echo '<td align="center">'."Recommended Age/s:</td>";
if (strpos($row['age'], 'any')!== false){
	echo '<td align="center">Any</td>';}
else{
	echo '<td align="center">'.$row['age'].'</td>';}
echo "</tr>";
echo "<tr>";
	echo '<td align="center">'."Primary Colour:</td>";
	echo '<td align="center">'.$row ['colour']."</td>";
echo "</tr>";
echo "<tr>";
	echo '<td align="center">'."Material:</td>";
	if ($row ['material']=='both'){
	$material = $row ['material'].' metal and plastic';}
	else{
	$material = $row ['material'];}
	echo '<td align="center">'.$material."</td>";
echo "</tr>";
echo "<tr>";
	echo '<td>Specialties:</td>';
	if ($row['titanium'] && $row['rimless'] && $row['flexhinge'] && $row['large'] && $row['multicoloured'] == 'no'){
	echo '<td>None</td>';
	}
	else{
	echo '<td>'.(($row['titanium'] == 'yes')? 'Titanium<br>' : '').''.(($row['rimless'] == 'yes')? 'Rimless<br>' : '').''.(($row['flexhinge'] == 'yes')? 'Flexhinge<br>' : '').''.(($row['large'] == 'yes')? 'Larger Frame<br>' : '').''.(($row['multicoloured'] == 'yes')? 'Multicoloured<br>' : '').'</td>';
	}
	echo "</tr>";
echo "<tr>";
	echo '<td align="center" colspan="2">'."Goes well with a<br>".$row ['shape']." Face Shape</td>";
echo "</tr>";
echo "<tr>";
	echo '<td align="center" colspan="2" style="color:#ed145a;font-size:3em;font-weight:bold;">'."£". $row ['price']."</td>";
echo "</tr>";
echo "<tr>";
if(isset($_SESSION["products"])) //if we have the session
		{
		$found = false; //set found item to false
			foreach ($_SESSION["products"] as $cart_itm) //loop through session array
			{
				if($cart_itm["id"] == $row['id']){ //the item exist in array
					$found = true;
				}else{
					//item doesn't exist in the list, just retrive old info and prepare array for session var
				}
			}
			
			if($found == false) //we didn't find item in array
			{
				//add new user item in array
echo '<form method="post" action="cart_update.php">';
	echo '<td align="center" colspan="2">'.'<button class="add_to_cart" style="background-color:#ed145a; color:white;">Add To Wishlist</button>'."</td>";
	echo '<input type="hidden" name="id" value="'.$row['id'].'" />';
    echo '<input type="hidden" name="type" value="add" />';
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
    echo '</form>';
	}else{
				//found user item in array list, and increased the quantity
	echo '<td align="center" colspan="2">'.'<a href="cart_update.php?removep='.$row['id'].'&return_url='.$current_url.'"><button style="background-color:DarkRed; color:white;">Remove From Wishlist</button>'."</a></td>";
			}
			
		}
else{
echo '<form method="post" action="cart_update.php">';
	echo '<td align="center" colspan="2">'.'<button class="add_to_cart" style="background-color:#ed145a; color:white;">Add To Wishlist</button>'."</td>";
	echo '<input type="hidden" name="id" value="'.$row['id'].'" />';
    echo '<input type="hidden" name="type" value="add" />';
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
    echo '</form>';
	}
echo "</tr>";
	echo "</tbody>";
echo "</table>";
echo "<table class='table'>";
$like = "SELECT * FROM $dbname.glasses WHERE `type` LIKE '%".$row['type']."%' AND `colour` LIKE '%".$row['colour']."%' AND `id` <> '".$row['id']."' LIMIT 3";
$similar = mysqli_query($db, $like);
if (mysqli_num_rows($similar) != 0){
	echo "<td><h3>If You Like ".$row['glasses']." Then You'll Love:</h3><hr width='55%' style='margin-right:auto;margin-left:auto;'>";
}
	while($result = mysqli_fetch_assoc($similar))
	{

	echo "<tbody style='display: inline-block;';>";
	echo "<td><a href=frame.php?product=".$result['id'].">".$result['glasses']."<br><img src='".$result['image']."' style='max-width:200px;max-height:100px;margin-top:20px;'></a></td>";

		echo "</tbody>";
	}
	
echo "</table>";
	echo '</div>';
}
	echo '</div>';
	mysqli_close($db);
	?>
	

	            <div id="element_to_pop_up"><span span style="cursor:pointer" class="button b-close"><span>X</span></span>
<div class="static"></div></div>

</body>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="js/jquery.easing.min.js" type="text/javascript"></script>
<script src='js/jquery.bpopup.min.js'></script>
<script type="text/javascript" src="jquery.cookiebar.js"></script>
<script type="text/javascript" src="js/simplegallery.min.js"></script>
<script type="text/javascript" src="js/jquery.zoom.js"></script>
<script>
			$(document).ready(function(){
				$.cookieBar({
				});
			});

    $(document).ready(function(){

        $('#gallery').simplegallery({
            galltime : 400,
            gallcontent: '.content',
            gallthumbnail: '.thumbnail',
            gallthumb: '.thumb'
        });

    });

	
			$(document).ready(function(){
			$('#ex1').zoom({ magnify:'.35' });
		});
	
				$(document).ready(function(){
			$('#ex2').zoom({ magnify:'.35' });
		});
		
						$(document).ready(function(){
			$('#ex3').zoom({ magnify:'.35' });
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
            contentContainer:'.static',
            loadUrl:data //Uses jQuery.load()
        });
                
            });

        });

    })(jQuery);	
	
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
</fieldset>
</div>
</html>
