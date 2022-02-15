<?php
if($_POST['un'] == "Daniel" && $_POST['pw'] == "123456") {
 setcookie('un', 'Daniel', time() + (60)); // 86400 = 1 day
 setcookie('pw', '123456', time() + (60)); // 86400 = 1 day
 header("Location: week7.php");
} else {
 setcookie("un", "", time() - 3600, '/');
 setcookie("pw", "", time() - 3600, '/');
}

?>

<form method="post">
  <p> Enter username and password to proceed.</p>

  Username: <input type="text" name="un"><br>

  Password: <input type="text" name="pw"><br>

  <input type="submit" value="Submit">

</form>

