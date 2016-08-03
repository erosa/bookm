<?php

function display_cp($id) {
  // display mini-"control panel"

  $user_sql = "SELECT * FROM users WHERE id = " . $id; 
  $user_res = mysql_query($user_sql) or die(mysql_error()); 
  $user_row = mysql_fetch_assoc($user_res);
  echo "<p>Logged in as " . $user_row['username'] . ", id " . $user_row['id'] . ". ";
  echo "<a href='logout.php'>Logout</a>, <a href='password.php'>change your password</a>, <a href='delete.php'>delete something</a> or <a href='add.php'>add a site</a>.</p>";
}

function display_bm($id) {
  if ($_GET['id']) {
    $user_sql = "SELECT username FROM users WHERE id = " . $_GET['id'];
    $user_res = mysql_query($user_sql) or die(mysql_query()); 
    $user_row = mysql_fetch_assoc($user_res); 
    echo "<h3>Bookmarks for " . $user_row['username'] . ":</h3>";
  }
  $sql = "SELECT * FROM bookmarks WHERE user_id = " . $id;
  $res = mysql_query($sql) or die(mysql_error()); 
  $num = mysql_num_rows($res); 
  if ($num == 0) {
    echo "<p class='alert'>No bookmarks here.</p>";
  }
  else {
    echo "<p><ol>"; 
    while ($row = mysql_fetch_assoc($res)) {
      echo "<li><a href='" . $row['url'] . "'>" . $row['title'] . "</a><br />";
      echo $row['url'] . " - id " . $row['id'] . "</li>"; 
    }
    echo "</ol></p>";
  }
}

?>
