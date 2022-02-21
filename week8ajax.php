<?php

define( 'DB_NAME', 'dbaldwin14' );
define( 'DB_USER', 'dbaldwin14' );
define( 'DB_PASSWORD', 'dbaldwin14');
define( 'DB_HOST', 'localhost' );

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

function DeletePersonEntry($id) {
  global $conn;

  $del = "DELETE FROM people WHERE id = '$id' ";
  $result = $conn->query($del);

}

function InsertInfo($firstname, $lastname, $phonenumber) {
  global $conn;

  $insert ="INSERT INTO people (firstname, lastname, phonenumber) VALUES('$firstname', '$lastname', '$phonenumber')";
  $result = $conn->query($insert);

}

function ShowPeople(){
  global $conn;

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

}

$cmd = $_GET['cmd'];

if($cmd == 'create'){
  InsertInfo($_GET['fn'], $_GET['ln'], $_GET['num']);
}

else if($cmd == 'delete') {
  $id = $_GET['id'];
  DeletePersonEntry($id);
}

ShowPeople();

mysqli_close($conn);

?>



