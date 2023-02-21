<?php
  $hostname = "localhost";
  $username = "root";
  $password = " ";
  $dbname = "chatapp";

  $conn = mysqli_connect("localhost","root", "","chat" );
  if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
	
?>
