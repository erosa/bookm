<?php
require("header.php");
if ($_POST['submit']) {
	if ($_POST['password1'] != $_POST['password2']) {
		echo "<p class='alert'>You have a typo in one of the passwords. <a href='register.php'>Go back</a> and fix it.</p>";
	}
	else {
		$checksql = "SELECT * FROM users WHERE username = '" . $_POST['username'] . "'";
		$checkres = mysql_query($checksql) or die(mysql_error()); 
		$checknum = mysql_num_rows($checkres); 
		if ($checknum > 0) {
			echo "<p class='alert'>Somebody's already using that username. <a href='register.php'>Go back</a> and change it.</p>";
		}
		else {
			$sql = "INSERT INTO users(username, password) VALUES('" . $_POST['username'] . "', '" . $_POST['password1'] . "')";
			mysql_query($sql) or die(mysql_error());
			echo "Now that you're registered, you can add <a href=\"javascript:location.href='http://exmeamente/bm/add.php?ref=out&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title)\">this</a> to your favorites/bookmark bar/whatever to add whatever site you're at when you click it. Return <a href='index.php'>index</a> and log in.";
		}
	}
}
else {
?>

<h1>exmeamente.ws/bm/register</h1>

<p>Please don't use anything important as your login details, our security sucks.</p>

<p><form action="register.php" method="post">
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password1" /></td>
		</tr>
		<tr>
			<td>...again</td>
			<td><input type="password" name="password2" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Register" /></td>
		</tr>
	</table>
</form></p>

<?php
}
require("footer.php");
?>
