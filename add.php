<?php
require("header.php");
if (!$_COOKIE['bm-id']) {
  header("Location: " . $config_basedir);
}
if ($_GET['url']) {
  $sql = "INSERT INTO bookmarks(url, title, user_id) VALUES('" . addslashes($_GET['url']) . "', '" . addslashes($_GET['title']) . "', " . $_COOKIE['bm-id'] . ")";
  mysql_query($sql) or die(mysql_error());
  //echo $sql;
  if ($_GET['ref'] == "out") {
    header("Location: " . $_GET['url']); 
  }
  else {
    header("Location: " . $config_basedir . "bookmarks.php");
  }
}
?>

<h1>exmeamente.ws/bm/add</h1>

<p>Or put <a href="">this</a> into your browser's favorites/bookmark bar/whatever. </p>

<p><form action="add.php" method="get">
  <table>
    <tr>
      <td>URL</td>
      <td><input type="text" name="url" />
    </tr>
    <tr>
      <td>Title</td>
      <td><input type="text" name="title" />
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="Add" /></td>
    </tr>
  </table>
</form></p>

<?php
require("footer.php");
?>
