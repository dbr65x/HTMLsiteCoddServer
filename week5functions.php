<form method="get">
  People Info: <input type="text" name="info"><br>
  <input type="submit" value="Submit">
</form>

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

  $del = "DELETE FROM test WHERE id = '$id' ";

  $result = $conn->query($del);

  mysqli_close($conn);
}

if($_GET['cmd'] == 'delete') {
  $id = $_GET['id'];
  DeletePersonEntry($id);
}

function InsertInfo($firstname) {

  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $insert = "INSERT INTO test SET firstname = '$firstname' ";

  $result = $conn->query($insert);

  mysqli_close($conn);
}
if($_GET['info'] != ''){
  InsertInfo($_GET['info']);
}

function ShowNames(){
  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "SELECT id, firstname FROM test";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. "<br>";
    }
  } else {
    echo "0 results";
  }

  mysqli_close($conn);
}

ShowNames();
?>