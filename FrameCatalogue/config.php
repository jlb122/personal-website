<?php
$currency = '£'; //Currency sumbol or code
error_reporting(0);

$user = 'james';
$pass = '4DQfs9Q22LatGPvM';
$dbname = 'test';

$db = new mysqli('localhost', $user, $pass, $dbname) or die("Unable to connect");
?>