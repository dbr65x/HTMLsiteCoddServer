<?php
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


function InsertInfo($firstname) {

  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $insert = "INSERT INTO people SET firstname = '$firstname' ";

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
      $delurl = "[<a href='https://codd.cs.gsu.edu/~dbaldwin14/week5functions.php?cmd=delete&id={$row['id']}'>delete</a>]";
      echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Phone Number: " . $row["phonenumber"]. " $delurl<br>";
    }
  } else {
    echo "0 results";
  }

  mysqli_close($conn);
}

?>

<form method="get">
  People Info: <input type="text" name="info"><br>
  <input type="submit" value="Submit">
</form>

<?php
if($_GET['info'] != ''){
  InsertInfo($_GET['info']);
}

if($_GET['cmd'] == 'delete') {
  $id = $_GET['id'];
  DeletePersonEntry($id);
}
ShowPeople();
?>

