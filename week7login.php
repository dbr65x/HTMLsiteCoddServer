<?php
define( 'DB_NAME', 'dbaldwin14' );
define( 'DB_USER', 'dbaldwin14' );
define( 'DB_PASSWORD', 'dbaldwin14');
define( 'DB_HOST', 'localhost' );

function CheckInfo($username, $password) {

  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "SELECT id FROM user WHERE username= '$username' AND password= '$password' ";

  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);

  $str= strval($row["id"]);

  if (mysqli_num_rows($result) > 0) {
    setcookie("userid", $str, time() + (60)); // 86400 = 1 day
    header("Location: week7.php");
  } else {
    setcookie("userid", "", time() - 3600, '/');
    print("Invalid login. Username and password incorrect.");
  }

  mysqli_close($conn);
}

?>

<form method="post">
  <p> Enter username and password to proceed.</p>

  Username: <input type="text" name="un"><br>

  Password: <input type="text" name="pw"><br>


  <input type="submit" value="Submit">

</form>

<?php
if($_POST['un'] != '' && $_POST['pw'] != ''){
  CheckInfo($_POST['un'], $_POST['pw']);
}

?>

