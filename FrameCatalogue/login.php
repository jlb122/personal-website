<!DOCTYPE html>
<html>

<head>
<link rel="shortcut icon" href="icon.ico">
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta charset="UTF-8">

  <title>Staff Log-in</title>

  <link rel='stylesheet' href='css/jquery-ui.css'>

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <div class="login-card">
    <img src="4eyes.png" style="max-width:100%;max-height:100%;">
    <h1>Staff Log-in</h1>
  <form id='form' method='POST' action='loggingin.php'>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" name="login" class="login login-submit" value="Login">
<?php 				$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
?>
  </form>

  <div class="login-help">
<a href="mailto:jamesbridger@live.com?subject=Forgotten Username/Password &amp;body=Please supply the Admin with your 
%0D%0A
%0D%0A 1. Full Name: 
%0D%0A 2. E-Mail: 
%0D%0A
%0D%0A
Regards
%0D%0A
James Bridger"> Forgot Password?</a><br><br>
<a href="index.php"> Sign In As Guest</a>
  </div>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='js/jquery-ui.js'></script>

</body>

</html>