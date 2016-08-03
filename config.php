<?php 
$config_basedir = "/bookm/";

$dbhost = "localhost"; 
$dbuser = "root"; 
$dbpassword = "password"; 
$dbdatabase = "bm"; 

mysql_connect($dbhost, $dbuser, $dbpassword) or die(mysql_error()); 
mysql_select_db($dbdatabase) or die(mysql_error()); 
?>
