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
<title>Update/Delete</title>
</head>
<style>
.table {
    font-size: 20px;
	text-transform: uppercase;
	color: #2C3E50;
    margin-left:auto; 
    margin-right:auto;
	width: 100%;	
	border-spacing: .25em;

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
		<h2 class="fs-title">Result/s</h2>
<input id="search_input" style="margin-bottom:5px;"placeholder="Type to filter results">
<button class="tablefilter">Filter By</button>
<a href="admin.php"><input type="button" class="clear" value="Clear All Filters"></a>
<div id="filter"><br>
<form class="sort" id="form" action="" method="get">
<table class="filter">
<tbody style='display: inline-block;'>
<th>Gender</th>
<tr>
<td><input type="checkbox" name="gender[male]" id="male" value="male" <?php if (isset($_GET['gender']['male'])) echo "checked='checked'"; ?>><label for="male">Male</label></td>
</tr>
<tr>
<td><input type="checkbox" name="gender[female]" id="female" value="female"  <?php if (isset($_GET['gender']['female'])) echo "checked='checked'"; ?>><label for="female">Female</label></td>
</tr>
<tr>
<td><input type="checkbox" name="gender[unisex]" id="unisex" value="unisex"  <?php if (isset($_GET['gender']['unisex'])) echo "checked='checked'"; ?>><label for="unisex">Unisex</label></td>
</tr>
</tbody>
<tbody style='display: inline-block;'>
<th>Brand</th>
<tr>
<td><input type="checkbox" name="brand[armani]" id="armani" value="armani" <?php if (isset($_GET['brand']['armani'])) echo "checked='checked'"; ?>><label for="armani">Armani</label></td>
</tr>
<tr>
<td><input type="checkbox" name="brand[guess]" id="guess" value="guess" <?php if (isset($_GET['brand']['guess'])) echo "checked='checked'"; ?>><label for="guess">Guess</label></td>
</tr>
<tr>
<td><input type="checkbox" name="brand[harleydavidson]" id="harleydavidson" value="harley davidson" <?php if (isset($_GET['brand']['harleydavidson'])) echo "checked='checked'"; ?>><label for="harleydavidson">Harley Davidson</label></td>
</tr>
<tr>
<td><input type="checkbox" name="brand[fatheadz]" id="fatheadz" value="fatheadz" <?php if (isset($_GET['brand']['fatheadz'])) echo "checked='checked'"; ?>><label for="fatheadz">Fatheadz</label></td>
</tr>
<tr>
<td><input type="checkbox" name="brand[oakley]" id="oakley" value="oakley" <?php if (isset($_GET['brand']['oakley'])) echo "checked='checked'"; ?>><label for="oakley">Oakley</label></td>
</tr>
<tr>
<td><input type="checkbox" name="brand[superdry]" id="superdry" value="superdry" <?php if (isset($_GET['brand']['superdry'])) echo "checked='checked'"; ?>><label for="superdry">Superdry</label></td>
</tr>
<tr>
<td><input type="checkbox" name="brand[gant]" id="gant" value="gant" <?php if (isset($_GET['brand']['gant'])) echo "checked='checked'"; ?>><label for="gant">Gant</label></td>
</tr>
<tr>
<td><input type="checkbox" name="brand[jklondon]" id="jklondon" value="jk london" <?php if (isset($_GET['brand']['jklondon'])) echo "checked='checked'"; ?>><label for="jklondon">JK London</label></td>
</tr>
<tr>
<td><input type="checkbox" name="brand[williammorris]" id="williammorris" value="william morris" <?php if (isset($_GET['brand']['williammorris'])) echo "checked='checked'"; ?>><label for="williammorris">William Morris</label></td>
</tr>
</tbody>
<tbody style='display: inline-block;'>
<th>Colour</th>
<tr>
<td><input type="checkbox" name="col[green]" id="green" value="green" <?php if (isset($_GET['col']['green'])) echo "checked='checked'"; ?>><label for="green">Green</label></td>
</tr>
<tr>
<td><input type="checkbox" name="col[blue]" id="blue" value="blue"  <?php if (isset($_GET['col']['blue'])) echo "checked='checked'"; ?>><label for="blue">Blue</label></td>
</tr>
<tr>
<td><input type="checkbox" name="col[black]" id="black" value="black" <?php if (isset($_GET['col']['black'])) echo "checked='checked'"; ?>><label for="black">Black</label></td>
</tr>
<tr>
<td><input type="checkbox" name="col[grey]" id="grey" value="grey"  <?php if (isset($_GET['col']['grey'])) echo "checked='checked'"; ?>><label for="grey">Grey</label></td>
</tr>
<tr>
<td><input type="checkbox" name="col[brown]" id="brown" value="brown"  <?php if (isset($_GET['col']['brown'])) echo "checked='checked'"; ?>><label for="brown">Brown</label></td>
</tr>
<tr>
<td><input type="checkbox" name="col[red]" id="red" value="red"  <?php if (isset($_GET['col']['red'])) echo "checked='checked'"; ?>><label for="red">Red</label></td>
</tr>
</tbody>
<tbody style='display: inline-block;'>
<th>Frame Material</th>
<tr>
<td><input type="checkbox" name="material[metal]" id="metal" value="metal" <?php if (isset($_GET['material']['metal'])) echo "checked='checked'"; ?>><label for="metal">Metal</label></td>
</tr>
<tr>
<td><input type="checkbox" name="material[plastic]" id="plastic" value="plastic" <?php if (isset($_GET['material']['plastic'])) echo "checked='checked'"; ?>><label for="plastic">Plastic</label></td>
</tr>
<tr>
<td><input type="checkbox" name="material[both]" id="both" value="both" <?php if (isset($_GET['material']['both'])) echo "checked='checked'"; ?>><label for="both">Metal & Plastic</label></td>
</tr>
</tbody>
<tbody style='display: inline-block;'>
<th>Frame Shape</th>
<tr>
<td><input type="checkbox" name="type[rectangle]" id="rectangle" value="rectangle" <?php if (isset($_GET['type']['rectangle'])) echo "checked='checked'"; ?>><label for="rectangle">Rectangle</label></td>
</tr>
<tr>
<td><input type="checkbox" name="type[oval]" id="oval" value="oval" <?php if (isset($_GET['type']['oval'])) echo "checked='checked'"; ?>><label for="oval">Oval</label></td>
</tr>
<tr>
<td><input type="checkbox" name="type[round]" id="round" value="round" <?php if (isset($_GET['type']['round'])) echo "checked='checked'"; ?>><label for="round">Round</label></td>
</td>
<tr>
<td><input type="checkbox" name="type[square]" id="square" value="square"  <?php if (isset($_GET['type']['square'])) echo "checked='checked'"; ?>><label for="square">Square</label></td>
</tr>
<tr>
<td><input type="checkbox" name="type[cateye]" id="cateye" value="cateye"  <?php if (isset($_GET['type']['cateye'])) echo "checked='checked'"; ?>><label for="cateye">Cateye</label></td>
</tr>
<tr>
<td><input type="checkbox" name="type[wrap]" id="wrap" value="wrap"  <?php if (isset($_GET['type']['wrap'])) echo "checked='checked'"; ?>><label for="wrap">Wrap-Around</label></td>
</tr>
</tbody>
<tbody style='display: inline-block;'>
<th>Specialties</th>
<tr>
<td><input type="checkbox" name="sport[]" id="sport" value="yes" <?php if (isset($_GET['sport'])) echo "checked='checked'"; ?>><label for="sport">Sport Eyewear</label></td>
</tr>
<tr>
<td><input type="checkbox" name="protective[]" id="protective" value="yes" <?php if (isset($_GET['protective'])) echo "checked='checked'"; ?>><label for="protective">Protective Eyewear</label></td>
</tr>
<tr>
<td><input type="checkbox" name="titanium[]" id="titanium" value="yes" <?php if (isset($_GET['titanium'])) echo "checked='checked'"; ?>><label for="titanium">Titanium Frame</label></td>
</tr>
<tr>
<td><input type="checkbox" name="rimless[]" id="rimless" value="yes" <?php if (isset($_GET['rimless'])) echo "checked='checked'"; ?>><label for="rimless">Fully Rimless Frame</label></td>
</tr>
<tr>
<td><input type="checkbox" name="semirimless[]" id="semirimless" value="yes" <?php if (isset($_GET['semirimless'])) echo "checked='checked'"; ?>><label for="semirimless">Semi-Rimless Frame</label></td>
</tr>
<tr>
<td><input type="checkbox" name="flexhinge[]" id="flexhinge" value="yes" <?php if (isset($_GET['flexhinge'])) echo "checked='checked'"; ?>><label for="flexhinge">Flexhinge</label></td>
</tr>
<tr>
<td><input type="checkbox" name="clipon[]" id="clipon" value="yes" <?php if (isset($_GET['clipon'])) echo "checked='checked'"; ?>><label for="clipon">Clipon Arms</label></td>
</tr>
<tr>
<td><input type="checkbox" name="large[]" id="large" value="yes" <?php if (isset($_GET['large'])) echo "checked='checked'"; ?>><label for="large">Larger Frame</label></td>
</tr>
<tr>
<td><input type="checkbox" name="multicoloured[]" id="multicoloured" value="yes" <?php if (isset($_GET['multicoloured'])) echo "checked='checked'"; ?>><label for="multicoloured">Multicoloured Frame</label></td>
</tr>
</tbody>
<tbody style='display: inline-block;'>
<th>Price</th>
<tr>
<td><label for="0">Min Price</label><input type="number" style="width:100px;" id="0" name="pricemin" value="<?php if (isset($_GET['pricemin'])){ echo $_GET['pricemin'];} else {echo '0';}?>"></td>
</tr>
<tr>
<td><label for="100">Max Price</label><input type="number" style="width:100px;" id="100" name="pricemax" value="<?php if (isset($_GET['pricemax'])) {echo $_GET['pricemax'];} else {echo '300';}?>"></td>
</tr>
</tbody>
<tbody style='display: inline-block;'>
<th>Sort By</th>
<tr>
<td><input type="radio" id="asc" name="sort" value="asc"  <?php if (isset($_GET['sort']) && $_GET['sort'] == 'asc') echo "checked='checked'";?>><label for="asc">Price: Low-High</label></td>
</tr>
<tr>
<td><input type="radio" id="desc" name="sort" value="desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'desc') echo "checked='checked'";?>><label for ="desc">Price: High-Low</label><br></td>
</tr>
</tbody>
</table>
<input type="submit"><br><br>

</form>

</div>
	

<?php
$query = "SELECT * FROM $dbname.glasses WHERE id != ''";
	
 if(isset($_GET["gender"])){

$query .= "AND `gender` IN ('" . implode("','",$_GET['gender']) . "')";
}

 if(isset($_GET["col"])){

$query .= "AND `colour` IN ('" . implode("','",$_GET['col']) . "')";
}

 if(isset($_GET["material"])){

$query .= "AND `material` IN ('" . implode("','",$_GET['material']) . "')";
}
 if(isset($_GET["type"])){

$query .= "AND `type` IN ('" . implode("','",$_GET['type']) . "')";
}

 if(isset($_GET["sport"])){

$query .= "AND `sport` IN ('" . implode("','",$_GET['sport']) . "')";
}

 if(isset($_GET["protective"])){

$query .= "AND `protective` IN ('" . implode("','",$_GET['protective']) . "')";
}

 if(isset($_GET["titanium"])){

$query .= "AND `titanium` IN ('" . implode("','",$_GET['titanium']) . "')";
}

 if(isset($_GET["rimless"])){

$query .= "AND `rimless` IN ('" . implode("','",$_GET['rimless']) . "')";
}

 if(isset($_GET["flexhinge"])){

$query .= "AND `flexhinge` IN ('" . implode("','",$_GET['flexhinge']) . "')";
}

 if(isset($_GET["large"])){

$query .= "AND `large` IN ('" . implode("','",$_GET['large']) . "')";
}

 if(isset($_GET["multicoloured"])){

$query .= "AND `multicoloured` IN ('" . implode("','",$_GET['multicoloured']) . "')";
}


 if(isset($_GET["semirimless"])){

$query .= "AND `semirimless` IN ('" . implode("','",$_GET['semirimless']) . "')";
}

 if(isset($_GET["clipon"])){

$query .= "AND `clipon` IN ('" . implode("','",$_GET['clipon']) . "')";
}

 if(isset($_GET["pricemin"]) && ($_GET["pricemax"]) ){

$query .= "AND `price` BETWEEN '".$_GET['pricemin']."' AND '".$_GET['pricemax']."'";
}

 if(isset($_GET["brand"])){

$query .= "AND `glasses` REGEXP  '".implode("|",$_GET['brand']) . "'";
}
 if(isset($_GET["sort"])){

$query .= "ORDER BY `price`".$_GET['sort']."";
}

$sql = mysqli_query($db, $query);

if($sql === FALSE) {
    die("Connection error: " . mysqli_error($db)); // TODO: better error handling
}

echo "<table id ='search_list' class='table'>";
	
	while($row = mysqli_fetch_array($sql))
{
echo '<div class="product">'; 

echo '<tbody style="display: inline-block;" name="deleteall">';
echo "<tr>";
echo '<form class="delete1" method="GET" action="deleting.php">';
    echo '<div class="product-content"><td align="center" style="padding:.5em;"><input type="checkbox" name="delete[]" id="'.$row['id'].'" value="'.$row['id'].'"/><label for="'.$row['id'].'"class="result-label">'."". $row ['glasses'].''."</label></td></div></label>";
	echo "</tr>";
	echo "<tr>";
	echo '<div class="product-thumb"><td align="center" style="height:110px;"><label for="'.$row['id'].'" >'.""."<div class='image'><img src=".$row['image']."></div>".'</label>'."</td></div>";
	echo "</tr>";
	echo "<tr>";
	echo '<td align="left" style="font-size:12px;"><label for="'.$row['id'].'">'."<div>".$row ['gender'].'</div></label>'."</td>";
	echo "</tr>";
	echo "<tr>";
    echo '<div class="product-info">';	
	echo '<td align="left" style="color:#ed145a;font-size:25px;vertical-align:center"><label for="'.$row['id'].'">'."<div>".$currency.$row ['price'].'</div></label>'."</td>";
	echo "</tr>";
    echo '<input type="hidden" name="type" value="add" />';
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	echo "<tr>";
    echo '<div class="product-content"><td align="center">'."<a href=\"update.php?id=".$row['id'].'&return_url='.$current_url."\"><input type='button' value='Update' style='background-color:#ed145a;color:white;'></a>"."</td></div>";
	echo "</tr>";
	echo "<tr>";
    echo '<div class="product-content"><td align="center">'."<a href=\"deleting.php?id=".$row['id'].'&return_url='.$current_url."\" OnClick=\"return confirm('Are You Sure You Want To Delete ".strtoupper($row['glasses'])."');\"><input type='button' value='Delete' style='background-color:darkred;color:white;'></a>"."</td></div>";
	echo "</tr>";
	echo "</tbody>";

    echo '</div>';

}
echo "<input type='submit' class='delete' value='Delete Selected Frames' OnClick=\"return confirm('Are You Sure You Want To Delete The Selected Rows?');\">";
echo '</form>';
echo "</table>";
 mysqli_close($db);

	?>
<!-- Button that triggers the popup -->
           <!-- Element to pop up -->
<div id="element_to_pop_up"><span span style="cursor:pointer" class="button b-close"><span>X</span></span>
<div class="content"></div></div>
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
