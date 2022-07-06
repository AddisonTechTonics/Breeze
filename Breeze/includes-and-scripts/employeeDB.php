<?php

$server = "localhost";
$dbuser = "dev";
$dbpass = "localdbpassword";
$db = "Branching_Out_dev";

$conn1 = new mysqli($server, $dbuser, $dbpass, $db);

if ($conn1->connect_error || !$conn1) {
  die("Connection failed:" . $conn1->connect_error);
}
// echo "Connected to DB successfully ";
// echo "</br>";