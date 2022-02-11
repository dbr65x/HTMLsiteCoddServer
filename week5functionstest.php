<form method="get">
  People Info: <input type="text" name="info"><br>
  <input type="submit" value="Submit">
</form>

<?php
$type = $_GET['info'];
print("GET Method TYPE: $type")
?>