<?php
// Initialize the session
session_start();
 
// Include config file
require_once "config.php";
 
// Prepare a select statement
$sql = "SELECT id, username, password FROM users";
$result = $link->query($sql);
echo "<b>Number Of Records:</b>".$result->num_rows;
echo "<br/>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<b>id:</b> " . $row["id"]. " - <b>UserName:</b> " . $row["username"]. "<br>";
    }
} else {
  echo "</b>0 results<b>";
}

?>