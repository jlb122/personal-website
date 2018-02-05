<?php
session_start();
include_once("config.php");
error_reporting(0);

?>
<?php 
$id = $_POST['id'];
$glasses = strtolower($_POST['glasses']);
$gender = $_POST['gender'];
$age = implode(',' ,$_POST['age']);
$price = $_POST['price'];
$shape = implode(',' ,$_POST['shape']);
$type = $_POST['type'];
$usage = implode(',' ,$_POST['usage']);
$colour = $_POST['colour'];
$material = $_POST['material'];
$lifestyle = implode(',' ,$_POST['lifestyle']);
$sport = $_POST['sport'];
if ($sport == ''){
$sport = 'no';
}
$protective = $_POST['protective'];
if ($protective == ''){
$protective = 'no';
}
$titanium = $_POST['titanium'];
if ($titanium == ''){
$titanium = 'no';
}
$rimless = $_POST['rimless'];
if ($rimless == ''){
$rimless = 'no';
}
$flexhinge = $_POST['flexhinge'];
if ($flexhinge == ''){
$flexhinge = 'no';
}
$large = $_POST['large'];
if ($large == ''){
$large = 'no';
}
$multicoloured = $_POST['multicoloured'];
if ($multicoloured == ''){
$multicoloured = 'no';
}
$semirimless = $_POST['semirimless'];
if ($semirimless == ''){
$semirimless = 'no';
}
$clipon = $_POST['clipon'];
if ($clipon == ''){
$clipon = 'no';
}

$target = "pictures/";
$targetstatic = "pictures/static/";
$targetimage = $target . basename( $_FILES['image']['name']);
$targetimageside = $target . basename ( $_FILES['imageside']['name']);
$targetimagefront = $target . basename( $_FILES['imagefront']['name']);
$targetimagestatic = $targetstatic . basename( $_FILES['static']['name']);

if ($_FILES['image']['name']!=''){
$image=$targetimage;
move_uploaded_file($_FILES['image']['tmp_name'], $targetimage);
}
else{
$image=$_POST['imagenormal'];
}
if ($_FILES['imageside']['name']!=''){
$imageside = $targetimageside;
move_uploaded_file($_FILES['imageside']['tmp_name'], $targetimageside);
}
else{
$imageside=$_POST['imagesidenormal'];
}
if ($_FILES['imagefront']['name']!=''){
$imagefront = $targetimagefront;
move_uploaded_file($_FILES['imagefront']['tmp_name'], $targetimagefront);
}
else{
$imagefront=$_POST['imagefrontnormal'];
}
if ($_FILES['static']['name']!=''){
$imagestatic = $targetimagestatic;
move_uploaded_file($_FILES['static']['tmp_name'], $targetimagestatic);
}
else{
$imagestatic=$_POST['imagestaticnormal'];
}


$query = "UPDATE $dbname.glasses SET `glasses` = '$glasses', `image` = '$image', `gender` = '$gender', 
`shape` = '$shape', `type` = '$type', `colour` = '$colour',`lifestyle` = '$lifestyle', `usage` = '$usage' ,`material` = '$material', `price` = '$price',  
`age` = '$age', `imageside` = '$imageside', `imagefront` = '$imagefront', `static` = '$imagestatic', `offer` = '$offer', `sport` = '$sport', `protective` = '$protective' 
, `titanium` = '$titanium', `rimless` = '$rimless', `flexhinge` = '$flexhinge'
, `large` = '$large', `multicoloured` = '$multicoloured' , `semirimless` = '$semirimless', `clipon` = '$clipon'   WHERE `id` = '$id'";

$result = mysqli_query($db,$query);

	$return_url = base64_decode($_POST["return_url"]); //return url
	echo "<h2 align='center' style='margin-top:12.5%;'>".$_POST['glasses']." has been succesfully updated! You will be redirected back to the previous page shortly" . "<br><br><img style='width:10%;height:20%;' src='loading.gif'/>"."<br><br><a href='".$return_url."' style='text-decoration:none;color:#ff0099;'> Click this link if you are not redirected back to the original page within 5 seconds</h2></a>";
	header( "refresh:5;url=".$return_url."");

?>