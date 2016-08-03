<?php
require("header.php");
if (!$_COOKIE['bm-id']) {
  header("Location: " . $config_basedir);
}
if ($_POST['submit']) {
  if ($_POST['really'] == "really") {
    if ($_POST['type'] == "account") {
      if ($_POST['id'] == $_COOKIE['bm-id']) {
        $sql = "DELETE FROM users WHERE id = " . $_COOKIE['bm-id'] . " LIMIT 1";
        mysql_query($sql) or die(mysql_error());
        setcookie("bm-id", $row['id'], time()-60);
        echo "<p class='alert'>Bye. (Back to the <a href='index.php'>index</a>?</p>";
      }
      else {
        echo "<p class='alert'>Nice try, but you can't delete an account that's not yours.</p>";
      }
    }
    if ($_POST['type'] == "bookmark") {
      $check_sql = "SELECT user_id FROM bookmarks WHERE id = " . $_POST['id']; 
      $check_res = mysql_query($check_sql) or die(mysql_error()); 
      $check_row = mysql_fetch_assoc($check_res); 
      if ($check_row['user_id'] == $_COOKIE['bm-id']) {
        $sql = "DELETE FROM bookmarks WHERE id = " . $_POST['id'] . " LIMIT 1";
        mysql_query($sql) or die(mysql_error());
        header("Location: " . $config_basedir . "bookmarks.php");
      }
      else {
        echo "<p class='alert'>Nice try, but you can't delete a bookmark that's not yours.</p>";
      }
    }
  }
  else {
    echo "<p class='alert'>You didn't check the 'really' box...</p>";
  }
}
else {
?>

<h1>exmeamente.ws/bm/delete</h1>

<p>Anything you do can't be undone, so be careful.</p>

<p><form action="delete.php" method="post">
  <table>
    <tr>
      <td>Type</td>
      <td>
        <select name="type">
          <option value="bookmark">Bookmark</option>
          <option value="account">Account</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>ID</td>
      <td><input type="text" name="id" /></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="Delete" name="submit" /> Really<input type="checkbox" value="really" name="really" /></td>
    </tr>
  </table>
</form></p>

<?php
}
require("footer.php");
?>
