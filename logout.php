<?php 
include("include/config.php");
include("include/functions.php");

session_destroy();
header("location: $domain");
?>