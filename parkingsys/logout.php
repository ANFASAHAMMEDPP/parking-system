<?php
session_start();
if(session_destroy()) // Destroying All Sessions {
header("Location: basics.php"); // Redirecting To Home Page

?>