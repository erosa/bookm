<?php
require("header.php");
if (!$_COOKIE['bm-id']) {
  header("Location: " . $config_basedir);
}
if ($_POST['submit']) {
  if ($_POST['password1'] != $_POST['password2']) {
    echo "<p class='alert'>You have a typo in one of the new passwords. <a href='register.php'>Go back</a> and fix it.</p>";
  }
  else {
    $checksql = "SELECT password FROM users WHERE id = " . $_COOKIE['bm-id']; 
    $checkres = mysql_query($checksql) or die(mysql_error()); 
    $checknum = mysql_num_rows($checkres); 
    if ($checknum == 0) {
      echo "<p class='alert'>You have a typo in your current password.</p>";
    }
    else {
      $sql = "UPDATE users SET password = '" . $_POST['password_new1'] . "' WHERE id = " . $_COOKIE['bm-id']; 
      mysql_query($sql) or die(mysql_query()); 
      echo "<p>Your password was changed successfully. View your <a href='bookmarks.php'>bookmarks</a>?";
    }
  }
}
else {
?>

<h1>exmeamente.ws/bm/password</h1>

<p>Don't forget it.</p>

<p><form action="password.php" method="post">
  <table>
    <tr>
      <td>Current password</td>
      <td><input type="password" name="password_now" />
    </tr>
    <tr>
      <td>New password</td>
      <td><input type="password" name="password_new1" />
    </tr>
    <tr>
      <td>...again</td>
      <td><input type="password" name="password_new1" />
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="Change" name="submit" /></td>
    </tr>
  </table>
</form></p>

<?php
}
require("footer.php");
?>
