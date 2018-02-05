<?php
session_start();
include_once("config.php");
if (empty($_SESSION['username'])){
	echo "<script>; 
	location.href='login.php';</script>";
	}
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
<title>Add Frame</title>
</head>
<style>
.table {
    font-size: 20px;
	text-transform: uppercase;
    margin-left:auto; 
    margin-right:auto;
	width: 100%;	
	border-spacing: .5em;

}
tbody {
    vertical-align: middle;
}

td {
    font-size: 16px;
}


th {
    font-size:18px;
	color: #ed145a;
border-bottom: 1px solid #000;
padding-bottom: 6px;
border-top: 1px solid #000;
padding-top: 6px;
}

@media (max-width: 1000px) {
table,tbody,td, th{
display:block;
}
label{
display:block;
}
td:nth-child(2){
   margin-top: 25px;
}
th {
    font-size:18px;
border-bottom: 1px solid #000;
padding-bottom: 3px;
border-top: 1px solid #000;
padding-top: 3px;}
}

@media (max-width: 1000px){
#msform fieldset {
padding: 15px 2.5px 15px 2.5px;
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
			  <li class="hello"><?php  
			  $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			  if(isset($_SESSION["username"])){
			  $username = ucwords(strtolower($_SESSION["username"]));
			  }
			  else{$username = 'Guest';}
				$timezone = date_default_timezone_set("Europe/London");
				$time = date("H");
				/* Set the $timezone variable to become the current timezone */
				/* If the time is less than 1200 hours, show good morning */
				if ($time < "12") {
				echo "Good Morning, $username";
				} else
				/* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
				if ($time >= "12" && $time < "17") {
				echo "Good Afternoon, $username";
				} else
				/* Should the time be between or equal to 1700 and 1900 hours, show good evening */
				if ($time >= "17") {
				echo "Good Evening, $username";
				}
	?></li>
				<li><a href="add.php">Add New Frames</a></li>
				<li><a href="addsimilar.php">Add Similar Frames</a></li>
				<li><a href="updator.php">Update/Delete Frames</a></li>
				<li><a href="index.php">View Site As Guest</a></li>
				<li><a href="logout.php" style="color: #ed145a;">Logout</a></li>
            </ul>
        </div>
    </div>
 
 
 <div id="msform">
	<!-- progressbar -->


	<!-- fieldsets -->
		<fieldset>
		<h2 class="fs-title">Add New Frame</h2>
<?php 
$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo '<form class="update" method="POST" action="adding.php" id="form" enctype="multipart/form-data">';

echo "<table id ='search_list' class='table'>";
	
echo '<div class="product">'; 

echo '<tbody style="display: inline-block;margin-right:20px;margin-left:20px;">';
echo "<tr>";
	echo "<th>Frame Name *</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><h5 style='display:inline; color:#ed145a;'><input type='text' placeholder='Glasses Name' name='glasses' value='' ></h5></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>Frame Price *</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><h3 style='display:inline'>£ </h3><h5 style='display:inline; color:#ed145a;'><input  type='number' placeholder='Glasses Price' name='price' value=''></h5></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>Gender *<br><h6><input type='radio' name='gender'></h6></th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><input type='radio' name='gender' id='male' value='male' ><label for ='male'>Male</label><input type='radio' name='gender' id='female' value='female'><label for ='female'>Female</label><input type='radio' name='gender' id='unisex' value='unisex'><label for ='unisex'>Unisex</label></td>";
	echo "</tr>";
	echo "<tr>";
echo "<tr>";
	echo "<th>Primary Frame Colour *<br><h6><input type='radio' name='colour'></h6></th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><input  type='radio' value='green' name='colour' id='green'><label for='green'>Green</label><input type='radio' value='blue' name='colour' id='blue'><label for='blue'>Blue</label><input type='radio' value='black' name='colour' id='black'><label for='black'>Black</label><input type='radio' value='grey' name='colour' id='grey'><label for='grey'>Grey</label><input type='radio' value='brown' name='colour' id='brown'><label for='brown'>Brown</label><input type='radio' value='red' name='colour' id='red'><label for='red'>Red</label></td>";
	echo "</tr>";
echo "<tr>";
	echo "<th>Frame Shape *<br><h6><input type='radio' name='type'></h6></th>";
		echo "</tr>";
	echo "<tr>";
	echo "<td><input type='radio' value ='rectangle' id='rectangle' name='type'><label for='rectangle'>Rectangle</label><input type='radio' value ='oval' id='oval1' name='type'><label for='oval1'>Oval</label><input type='radio' value ='round' id='round1' name='type'><label for='round1'>Round</label><input type='radio' value ='square' id='square1' name='type'><label for='square1'>Square</label><input type='radio' value ='cateye' id='cateye' name='type'><label for='cateye'>Cateye</label><input type='radio' value ='wrap' id='wrap' name='type'><label for='wrap'>Wrap-Around</label></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>Frame Material *<br><h6><input type='radio' name='material'></h6></th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><input type='radio' id='metal' name='material' value='metal'><label for ='metal'>Metal</label><input type='radio' id='plastic' name='material' value='plastic'><label for ='plastic'>Plastic</label><input type='radio' id='both' name='material' value='both'><label for ='both'>Both</label></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>Specialties<h6>Select All That Apply<br></h6></th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>
	<input type='checkbox' id='yes1' name='sport' value='yes'><label for ='yes1'>Sportswear</label>
	<input type='checkbox' id='yes2' name='protective' value='yes'><label for ='yes2'>Protective</label>
	<input type='checkbox' id='yes3' name='titanium' value='yes'><label for ='yes3'>Titanium</label>
	<input type='checkbox' id='yes4' name='rimless' value='yes'><label for ='yes4'>Rimless</label>
	<input type='checkbox' id='yes8' name='semirimless' value='yes'><label for ='yes8'>Semi-Rimless</label>
	<input type='checkbox' id='yes9' name='clipon' value='yes'><label for ='yes9'>Clipon Arms</label>
	<input type='checkbox' id='yes5' name='flexhinge' value='yes'><label for ='yes5'>Flexhinge</label>
	<input type='checkbox' id='yes6' name='large' value='yes'><label for ='yes6'>Large</label>
	<input type='checkbox' id='yes7' name='multicoloured' value='yes'><label for ='yes7'>Multicoloured</label>
	</td>";
	echo "</tr>";
	echo "<th>Recommended Age *<br><h6>Select All That Apply<br><input type='radio' name='age[]' required></h6></th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><input type='checkbox' value ='>14' id='>14' name='age[]'><label for='>14'>>14</label><input type='checkbox' value ='15-25' id='15-25' name='age[]'><label for='15-25'>15-25</label><input type='checkbox' value ='26-40' id='26-40' name='age[]'><label for='26-40'>26-40</label><input type='checkbox' value ='41-64' id='41-64' name='age[]'><label for='41-64'>41-64</label><input type='checkbox' value ='65+' id='65+' name='age[]'><label for='65+'>65+</label><input type='checkbox' value ='any' id='any' name='age[]'><label for='any'>Any</label></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>Face Shape *<br><h6>Select All That Apply<br><input type='radio' name='shape[]'></h6></th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><input type='checkbox' value ='square' id='square' name='shape[]'><label for='square'>Square</label><input type='checkbox' value ='oval' id='oval' name='shape[]'><label for='oval'>Oval</label><input type='checkbox' value ='round' id='round' name='shape[]'><label for='round'>Round</label><input type='checkbox' value ='triangle' id='triangle' name='shape[]'><label for='triangle'>Triangle</label><input type='checkbox' value ='any' id='any1' name='shape[]'	><label for='any1'>Any</label></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>Frame Usage*<br><h6>Select All That Apply<br><input type='checkbox' name='usage[]' required></h6></th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><input type='checkbox' value ='rarely' id='rarely' name='usage[]'><label for='rarely'>Rarely</label><input type='checkbox' value ='sometimes' id='sometimes' name='usage[]'><label for='sometimes'>Sometimes</label><input type='checkbox' value ='often' id='often' name='usage[]'><label for='often'>Often</label><input type='checkbox' value ='allthetime' id='allthetime' name='usage[]'><label for='allthetime'>All The Time</label><input type='checkbox' value ='any' id='any3' name='usage[]'><label for='any3'>Any</label></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>Dress Type *<br><h6>Select All That Apply<br><input type='checkbox' name='lifestyle[]' required></h6></th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><input type='checkbox' value ='casual' id='casual' name='lifestyle[]'><label for='casual'>Casual</label><input type='checkbox' value ='businesscasual' id='businesscasual' name='lifestyle[]'><label for='businesscasual'>Business Casual</label><input type='checkbox' value ='smartcasual' id='smartcasual' name='lifestyle[]'><label for='smartcasual'>Smart Casual</label><input type='checkbox' value ='business' id='business' name='lifestyle[]'><label for='business'>Business Smart</label><input type='checkbox' value ='any' id='any4' name='lifestyle[]'><label for='any4'>Any</label></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<tr>";
	echo "<th>Main Image *</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><h5 style='display:inline; color:#ed145a;'><input type='file'  style='width:175px;color:black;' name='image' value=''></h5></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>Side Image *</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><h5 style='display:inline; color:#ed145a;'><input type='file'  style='width:175px;color:black;' name='imageside' value=''></h5></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>Front Image *</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><h5 style='display:inline; color:#ed145a;'><input type='file'  style='width:175px;color:black;' name='imagefront' value=''></h5></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>Try On Image <h6>Should Be A Front Facing Image. Note The Image Should Not Show The Arms Of The Frame. </h6></th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><h5 style='display:inline; color:#ed145a;'><input type='file' style='width:175px;color:black;' name='static' value=''></h5></td>";
	echo "</tr>";
	echo "</tbody>";

    echo '</div>';
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';

echo "</table>";
echo "<input type='submit' value='Add Frame' OnClick=\"return confirm('Are You Sure You Want To Add This Frame');\">";
echo '</form>';

?>
</body>
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
		  glasses: {
                required: true,
            },
            gender: {
                required: true,
            },
			colour: {
                required: true,
            },
			type: {
                required: true,
            },
			shape: {
                required: true,
            },
			material: {
                required: true,
            },
			age: {
                required: true,
            },
			usage: {
                required: true,
            },
			lifestyle: {
                required: true,
            },
			image: {
                required: true,
            },
			imageside: {
                required: true,
            },
			imagefront: {
                required: true,
            },
            price: {
                number: true,
				required: true,
            }
        },
    });

$(function(){
    $("#filter").hide();
	$('.tablefilter').click(function() {
		$('#filter').slideToggle('slow');
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
</fieldset>
</div>
</html>
