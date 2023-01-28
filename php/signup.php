<?php
include_once 'db.php';
include 'functions.php';
include 'router.php';

if (!isset($_POST['newuser'])) { 
header("location: index.html");
exit;
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];

if (ctype_digit($fname) != false) {
  header("location: error.php");
}
