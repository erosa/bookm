<?php
require("config.php"); 
setcookie("bm-id", $row['id'], time()-60);
header("Location: " . $config_basedir);
?>
