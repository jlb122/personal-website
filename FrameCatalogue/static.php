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
<title>Search Engine Test</title>
</head>
<style>
/*custom font*/
@import url(http://fonts.googleapis.com/css?family=Montserrat);

/*basic reset*/
* {margin: 0; padding: 0; }

html {
	height: 100%
}

body {
	font-family: montserrat, arial, verdana;
	overflow: hidden;

}
/*form styles*/
#msform {
	width: 85%;
	margin: 25px auto;
	text-align: center;
	position: relative;
}
#msform fieldset {
	background: white;
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	
	box-sizing: border-box;
	max-width:100%;
	
	/*stacking fieldsets above each other*/
	position: absolute;
}

/*inputs*/
#msform input, #msform textarea, #msform button {
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: .5px;
	max-width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 13px;
}


.table {
    font-size: 20px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-left:auto;
	margin-right:auto;
	max-width: 100%;	
	border-spacing: 1em;

}

img {
    max-width: 8em;    
}

a {
  color: inherit; /* blue colors for links too */
  text-decoration: inherit; /* no underline */
}



#surface1,
#container, canvas {
    top: 0;
    left: 0;
    position: absolute;
}

#videoElement {
    width: 200px;
    height: 200px;
    border-style: solid;
    border-color: red;
	}
	
</style>
 <body>
 

 
 <div id="msform">
	<!-- progressbar -->

	<!-- fieldsets -->
		<fieldset>
<table class="table">
<tbody>
<tr>
<td>Result</td>
<td>Webcam Feed</td>
</tr>
<tr>
<td style="position:relative;display;">

<canvas id="surface1" width="200" height="200"></canvas>
<div id="container" width="200" height="200"></div></td>
<td><video autoplay id="videoElement"> 
    </video></td>
</tr>
<tr>
<td><?php if (isset($_GET['gender'])&& $_GET['gender'] == 'unisex' && (strpos($_GET['shape'], 'square')!== false)){
echo '<img src="faceshape/squaremen.png" id="load" width="70px" style="cursor:pointer;" ><img src="faceshape/squarewoman.png" id="load1" width="70px" style="cursor:pointer;">
';}
 elseif (isset($_GET['gender'])&& $_GET['gender'] == 'unisex' && (strpos($_GET['shape'], 'round')!== false)){
echo '<img src="faceshape/roundmen.png" id="load" width="70px" style="cursor:pointer;" ><img src="faceshape/roundwoman.png" id="load1" width="70px" style="cursor:pointer;">
';}
 elseif (isset($_GET['gender'])&& $_GET['gender'] == 'unisex' && (strpos($_GET['shape'], 'triangle')!== false)){
echo '<img src="faceshape/trianglemen.png" id="load" width="70px" style="cursor:pointer;" ><img src="faceshape/trianglewoman.png" id="load1" width="70px" style="cursor:pointer;">
';}
 elseif (isset($_GET['gender'])&& $_GET['gender'] == 'unisex' && (strpos($_GET['shape'], 'oval')!== false)){
echo '<img src="faceshape/ovalmen.png" id="load" width="70px" style="cursor:pointer;" ><img src="faceshape/ovalwomen.png" id="load1" width="70px" style="cursor:pointer;">
';}
 elseif (isset($_GET['gender'])&& $_GET['gender'] == 'female' && (strpos($_GET['shape'], 'square')!== false)){
echo '<img src="faceshape/squarewoman.png" id="load" width="70px" style="cursor:pointer;"><input type="hidden" id="load1">
';}	
 elseif (isset($_GET['gender'])&& $_GET['gender'] == 'female' && (strpos($_GET['shape'], 'round')!== false)){
echo '<img src="faceshape/roundwoman.png" id="load" width="70px" style="cursor:pointer;" ><input type="hidden" id="load1">
';}
 elseif (isset($_GET['gender'])&& $_GET['gender'] == 'female' && (strpos($_GET['shape'], 'triangle')!== false)){
echo '<img src="faceshape/trianglewoman.png" id="load" width="70px" style="cursor:pointer;" ><input type="hidden" id="load1">
';}
 elseif (isset($_GET['gender'])&& $_GET['gender'] == 'female' && (strpos($_GET['shape'], 'oval')!== false)){
echo '<img src="faceshape/ovalwoman.png" id="load" width="70px" style="cursor:pointer;" ><input type="hidden" id="load1">
';}
 elseif (isset($_GET['gender'])&& $_GET['gender'] == 'male' && (strpos($_GET['shape'], 'square')!== false)){
echo '<img src="faceshape/squaremen.png" id="load" width="70px" style="cursor:pointer;" ><input type="hidden" id="load1">
';}	
 elseif (isset($_GET['gender'])&& $_GET['gender'] == 'male' && (strpos($_GET['shape'], 'round')!== false)){
echo '<img src="faceshape/roundmen.png" id="load" width="70px" style="cursor:pointer;" ><input type="hidden" id="load1">
';}
 elseif (isset($_GET['gender'])&& $_GET['gender'] == 'male' && (strpos($_GET['shape'], 'triangle')!== false)){
echo '<img src="faceshape/trianglemen.png" id="load" width="70px" style="cursor:pointer;" ><input type="hidden" id="load1">
';}
 elseif (isset($_GET['gender'])&& $_GET['gender'] == 'male' && (strpos($_GET['shape'], 'oval')!== false)){
echo '<img src="faceshape/ovalmen.png" id="load" width="70px" style="cursor:pointer;" ><input type="hidden" id="load1">
';}
else {
}?>
</td>
<td><button onclick="webcam()">Use Webcam</button></td>
</tr>
<tr>
<td>Upload Image<br><input type="file" id="imageLoader" name="imageLoader" style="width:200px;"/>
</td>
<td> <input type="button" value="Capture Image" id="save" />
</td>
</tr>
</tbody>
</table>



	<!-- Used to capture frame from webcam video feed -->

	

</body>
<script>
var id = <?php echo json_encode($_GET['id']); ?>;
var shape = <?php echo json_encode($_GET['shape']); ?>;
var gender = <?php echo json_encode($_GET['gender']); ?>;
var image = <?php echo json_encode($_GET['static']); ?>;

</script>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="js/jquery.easing.min.js" type="text/javascript"></script>
<script src='js/jquery.bpopup.min.js'></script>
<script type="text/javascript" src="jquery.cookiebar.js"></script>
    <script src="js/kinetic-v4.5.2.min.js"></script>
		<script src="face/ccv.js"></script>
		<script src="face/face.js"></script>
<script>
  $(function() {
        $('#search_input').fastLiveFilter('#search_list');
    });
	
 function el(id){return document.getElementById(id);}
 // Get elem by ID
var imageLoader = document.getElementById('imageLoader');
    imageLoader.addEventListener('change', handleImage, false);
var canvas = document.getElementById('surface1');
var ctx = canvas.getContext('2d');
var img = new Image;
img.onload = function(){
            canvas.width=200;
            canvas.height=200;
            ctx.drawImage(img,0,0,img.width,img.height,0,0,200,200);
        }
if (shape.indexOf("square") > -1 && gender == "male") {
img.src = "faceshape/squaremen.png";
}
else if (shape.indexOf("square") > -1 && gender == "female") {
img.src = "faceshape/squarewoman.png";
}
else if (shape.indexOf("square") > -1 && gender == "unisex") {
img.src = "faceshape/squaremen.png";
}

else if  (shape.indexOf("round") > -1 && gender == "male") {
img.src = "faceshape/roundmen.png";

}

else if  (shape.indexOf("round") > -1 && gender == "female") {
img.src = "faceshape/roundwoman.png";

}

else if  (shape.indexOf("round") > -1 && gender == "unisex") {
img.src = "faceshape/roundmen.png";

}

else if  (shape.indexOf("triangle") > -1 && gender == "male") {
img.src = "faceshape/trianglemen.png";

}
else if  (shape.indexOf("triangle") > -1 && gender == "female") {
img.src = "faceshape/trianglewoman.png";

}

else if  (shape.indexOf("triangle") > -1 && gender == "unisex") {
img.src = "faceshape/trianglemen.png";

}

else if  (shape.indexOf("oval") > -1 && gender == "male") {
img.src = "faceshape/ovalmen.png";

}
else if  (shape.indexOf("oval") > -1 && gender == "female") {
img.src = "faceshape/ovalwoman.png";

}

else if  (shape.indexOf("oval") > -1 && gender == "unisex") {
img.src = "faceshape/ovalmen.png";

}

function handleImage(e){
    var reader = new FileReader();
    reader.onload = function(event){
        var img = new Image();
        img.onload = function(){    
		document.getElementById("imageLoader").value = "";
            ctx.drawImage(img,0,0,img.width,img.height,0,0,200,200);
        }
        img.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);   
	
}

document.getElementById("load").addEventListener('click',function(e){
         ctx.drawImage(img,0,0,img.width,img.height,0,0,200,200);
            img.src = document.getElementById("load").src;;

});

document.getElementById("load1").addEventListener('click',function(e){
         ctx.drawImage(img,0,0,img.width,img.height,0,0,200,200);
            img.src = document.getElementById("load1").src;;

});



function update(group, activeHandle) {
        var topLeft = group.get(".topLeft")[0],
            topRight = group.get(".topRight")[0],
            bottomRight = group.get(".bottomRight")[0],
            bottomLeft = group.get(".bottomLeft")[0],
            image = group.get(".image")[0],
            activeHandleName = activeHandle.getName(),
            newWidth,
            newHeight,
            minWidth = 20,
            minHeight = 20,
            oldX,
            oldY,
            imageX,
            imageY;

        // Update the positions of handles during drag.
        // This needs to happen so the dimension calculation can use the
        // handle positions to determine the new width/height.
        switch (activeHandleName) {
            case "topLeft":
                oldY = topRight.getY();
                oldX = bottomLeft.getX();
                topRight.setY(activeHandle.getY());
                bottomLeft.setX(activeHandle.getX());
                break;
            case "topRight":
                oldY = topLeft.getY();
                oldX = bottomRight.getX();
                topLeft.setY(activeHandle.getY());
                bottomRight.setX(activeHandle.getX());
                break;
            case "bottomRight":
                oldY = bottomLeft.getY();
                oldX = topRight.getX();
                bottomLeft.setY(activeHandle.getY());
                topRight.setX(activeHandle.getX());
                break;
            case "bottomLeft":
                oldY = bottomRight.getY();
                oldX = topLeft.getX();
                bottomRight.setY(activeHandle.getY());
                topLeft.setX(activeHandle.getX());
                break;
        }



        // Calculate new dimensions. Height is simply the dy of the handles.
        // Width is increased/decreased by a factor of how much the height changed.
        newHeight = bottomLeft.getY() - topLeft.getY();
        newWidth = image.getWidth() * newHeight / image.getHeight();

        // It's too small: move the active handle back to the old position
        if( newWidth < minWidth || newHeight < minHeight ){
          activeHandle.setY(oldY);
          activeHandle.setX(oldX);
          switch (activeHandleName) {
            case "topLeft":
                topRight.setY(oldY);
                bottomLeft.setX(oldX);
                break;
            case "topRight":
                topLeft.setY(oldY);
                bottomRight.setX(oldX);
                break;
            case "bottomRight":
                bottomLeft.setY(oldY);
                topRight.setX(oldX);
                break;
            case "bottomLeft":
                bottomRight.setY(oldY);
                topLeft.setX(oldX);
                break;
          }
        }


        newHeight = bottomLeft.getY() - topLeft.getY();
        //comment the below line and uncomment the line below tha line to allow free resize of the images because the below line preserves the scale and aspect ratio
        newWidth = image.getWidth() * newHeight / image.getHeight();//for restricted resizing
        //newWidth = topRight.getX() - topLeft.getX();//for free resizing

        // Move the image to adjust for the new dimensions.
        // The position calculation changes depending on where it is anchored.
        // ie. When dragging on the right, it is anchored to the top left,
        //     when dragging on the left, it is anchored to the top right.
        if(activeHandleName === "topRight" || activeHandleName === "bottomRight") {
            image.setPosition(topLeft.getX(), topLeft.getY());
        } else if(activeHandleName === "topLeft" || activeHandleName === "bottomLeft") {
            image.setPosition(topRight.getX() - newWidth, topRight.getY());
        }

        imageX = image.getX();
        imageY = image.getY();

        // Update handle positions to reflect new image dimensions
        topLeft.setPosition(imageX, imageY);
        topRight.setPosition(imageX + newWidth, imageY);
        bottomRight.setPosition(imageX + newWidth, imageY + newHeight);
        bottomLeft.setPosition(imageX, imageY + newHeight);

        // Set the image's size to the newly calculated dimensions
        if(newWidth && newHeight) {
            image.setSize(newWidth, newHeight);
        }
      }
      function addAnchor(group, x, y, name) {
        var stage = group.getStage();
        var layer = group.getLayer();

        var anchor = new Kinetic.Circle({
          x: x,
          y: y,
          stroke: "#666",
          fill: "#ddd",
          strokeWidth: 2,
          radius: 7,
          name: name,
          draggable: true
        });

        anchor.on("dragmove", function() {
          update(group, this);
          layer.draw();
        });
        anchor.on("mousedown touchstart", function() {
          group.setDraggable(false);
          this.moveToTop();
        });
        anchor.on("dragend", function() {
          group.setDraggable(true);
          layer.draw();
        });
        // add hover styling
        anchor.on("mouseover", function() {
          var layer = this.getLayer();
          document.body.style.cursor = "pointer";
          this.setStrokeWidth(4);
          layer.draw();
        });
        anchor.on("mouseout", function() {
          var layer = this.getLayer();
          document.body.style.cursor = "default";
          this.setStrokeWidth(2);
          layer.draw();
        });

        group.add(anchor);
      }
      function loadImages(sources, callback) {
        var images = {};
        var loadedImages = 0;
        var numImages = 0;
        for(var src in sources) {
          numImages++;
        }
        for(var src in sources) {
          images[src] = new Image();
          images[src].onload = function() {
            if(++loadedImages >= numImages) {
              callback(images);
            }
          };
          images[src].src = sources[src];
        }
      }
      function initStage(images) {
        var stage = new Kinetic.Stage({
          container: "container",
          width: 200,
          height: 200
        });
        var frameGroup = new Kinetic.Group({
          x: 64,
          y: 64,
          draggable: true
        });
        var layer = new Kinetic.Layer();

        /*
         * go ahead and add the groups
         * to the layer and the layer to the
         * stage so that the groups have knowledge
         * of its layer and stage
         */
        layer.add(frameGroup);
        stage.add(layer);


        // frame
        var frameImg = new Kinetic.Image({
          x: 0,
          y: 0,
          image: images.frame,
          width: 87,
          height: 33,
          name: "image"
        });

        frameGroup.add(frameImg);
        addAnchor(frameGroup, 0, 0, "topLeft");
        addAnchor(frameGroup, 87, 0, "topRight");
        addAnchor(frameGroup, 87, 33, "bottomRight");
        addAnchor(frameGroup, 0, 33, "bottomLeft");

        frameGroup.on("dragstart", function() {
          this.moveToTop();
        });

        stage.draw();
      }

      var sources = {
        frame: image
      };
      loadImages(sources, initStage);

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
function webcam(){
var video = document.querySelector("#videoElement");

// check for getUserMedia support
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
 
if (navigator.getUserMedia) {       
    // get webcam feed if available
    navigator.getUserMedia({video: true}, handleVideo, videoError);
}
 
function handleVideo(stream) {
    // if found attach feed to video element
    video.src = window.URL.createObjectURL(stream);
}
 
function videoError(e) {
    // no webcam found - do something
}}
var v,canvas,context,w,h;
var imgtag = document.getElementById('imgtag'); // get reference to img tag
var sel = document.getElementById('fileselect'); // get reference to file select input element

document.addEventListener('DOMContentLoaded', function(){
    // when DOM loaded, get canvas 2D context and store width and height of element
    v = document.getElementById('videoElement');
    canvas = document.getElementById('surface1');
    context = canvas.getContext('2d');
    w = canvas.width;
    h = canvas.height;

},false);

function draw(v,c,w,h) {

    if(v.paused || v.ended) return false; // if no video, exit here

    context.drawImage(v,0,0,200,200); // draw video feed to canvas
   
   var uri = canvas.toDataURL("image/png"); // convert canvas to data URI
   
   // console.log(uri); // uncomment line to log URI for testing
   
   imgtag.src = uri; // add URI to IMG tag src
}

document.getElementById('save').addEventListener('click',function(e){
    draw(v,context,200,200); // when save button is clicked, draw video feed to canvas
    
});

// for iOS 

// create file reader
var fr;

sel.addEventListener('change',function(e){
    var f = sel.files[0]; // get selected file (camera capture)
    
    fr = new FileReader();
    fr.onload = receivedData; // add onload event

    fr.readAsDataURL(f); // get captured image as data URI
})

function receivedData() {           
    // readAsDataURL is finished - add URI to IMG tag src
    imgtag.src = fr.result;
}

</script>
</fieldset>
</div>
</html>
