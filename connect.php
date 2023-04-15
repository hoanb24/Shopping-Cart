<?php   $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test_demo";
  // Create connection
  $mysqli = new mysqli($servername, $username, $password, $dbname);
  if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
  } 
  ?>