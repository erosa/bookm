<?php
require("header.php");
require("functions.php");
//if (!$_COOKIE['bm-id']) {
//	header("Location: " . $config_basedir);
//}
?>

<h1>exmeamente.ws/bm/boomarks</h1>

<?php

if ($_GET['id']) {
	if ($_GET['id'] == $_COOKIE['bm-id']) { 
		header("Location: " . $config_basedir . "bookmarks.php"); 
	}
	display_bm($_GET['id']);
}
else {
	if (!$_COOKIE['bm-id']) {
		header("Location: " . $config_basedir . "index.php"); 
	}
	else {
		display_cp($_COOKIE['bm-id']); 
		display_bm($_COOKIE['bm-id']);
	}
}
?>

<p>Email? bm at exmeamente dot ws</p>

<?php
require("footer.php"); 
?>
