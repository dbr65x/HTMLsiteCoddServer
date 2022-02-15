<?php

if(!isset($_COOKIE['userid'])) {
  header("Location: week7login.php");
} else{
    print("Welcome user: ".$_COOKIE['userid']);
}

define( 'DB_NAME', 'dbaldwin14' );
define( 'DB_USER', 'dbaldwin14' );
define( 'DB_PASSWORD', 'dbaldwin14');
define( 'DB_HOST', 'localhost' );

function DeletePersonEntry($id) {

  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $del = "DELETE FROM people WHERE id = '$id' ";

  $result = $conn->query($del);

  mysqli_close($conn);
}


function InsertInfo($firstname, $lastname, $phonenumber) {

  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $insert ="INSERT INTO people (firstname, lastname, phonenumber) VALUES('$firstname', '$lastname', '$phonenumber')";

  $result = $conn->query($insert);

  mysqli_close($conn);
}


function ShowPeople(){
  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "SELECT id, firstname, lastname, phonenumber FROM people";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $delurl = "[<a href='https://codd.cs.gsu.edu/~dbaldwin14/week7.php?cmd=delete&id={$row['id']}'>delete</a>]";
      echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Phone Number: " . $row["phonenumber"]. " $delurl<br>";
    }
  } else {
    echo "0 results";
  }

  mysqli_close($conn);
}

?>

<form method="get">

  First Name: <input type="text" name="fn"><br>

  Last Name: <input type="text" name="ln"><br>

  Phone Number: <input type="text" name="num"><br>

  <input type="submit" value="Submit">

</form>

<?php
if($_GET['fn'] != '' && $_GET['ln'] != '' && $_GET['num'] != ''){
  InsertInfo($_GET['fn'], $_GET['ln'], $_GET['num']);
}

if($_GET['cmd'] == 'delete') {
  $id = $_GET['id'];
  DeletePersonEntry($id);
}
ShowPeople();
?>

