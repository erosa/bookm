<?php 
require("header.php"); 
//if ($_POST['submit']) {
  //$sql = "SELECT id FROM users WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "'";
  //$res = mysql_query($sql) or die(mysql_error());
  //$num = mysql_num_rows($res); 
  //if ($num != 1) {
    //echo "<p class='alert'>Either you have a typo in your username or password, or you need to <a href='register.php'>register</a>."; 
  //}
  //else {
    //$row = mysql_fetch_assoc($res); 
    //setcookie("bm-id", $row['id'], time()+60*60*24*365);
    //header("Location: " . $config_basedir . "bookmarks.php");
  //}
//}
//elseif ($_COOKIE['bm-id']) {
  //header("Location: " . $config_basedir . "bookmarks.php");
//}
//else {
?>

<h1>exmeamente.ws/bm</h1>

<p>Dead simple online bookmarks<br />
(<a href="about.php">more, for the curious</a>)</p>

<p><form action="index.php" method="post">
  <table>
    <tr>
      <td>Username</td>
      <td><input type="text" name="username" />
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="password" />
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="Log in" name="submit" /> or <a href="register.php">make one</a></td>
  </table>
</form></p>

<?php
//}
//require("footer.php");
?>
