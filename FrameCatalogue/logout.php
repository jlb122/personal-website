<?php
//Used to end the session once the user has clicked logout
//Written by James Bridger

// Inialize session
session_start();

// Delete certain session
unset($_SESSION['username']);
// Delete all session variables
// session_destroy();

// Jump to login page
header('Location: login.php');//back to login page

?>