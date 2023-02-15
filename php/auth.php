<?php
// Makes script only accessable via login submit
require_once 'router.php';
$submitlog = $_POST['submitlog'];

if (!isset($submitlog)) {
  header($loginpage . '?error=mustproperlysubmit'); 
  die();
}

$loginEmail = $_POST['loginEmail'];
$loginPass = $_POST['loginPass'];
include_once 'db.php';
include_once 'functions.php';


if (emptylogin($loginEmail, $loginPass) !== false) {
  header($loginpage . '?error=emptySignupForm');
  exit();
}

loginUser($pdo, $loginEmail, $uname, $loginPass);





/* 

$stmt = $pdo->query('SELECT * FROM users');
while ($row = $stmt->fetch()) {
  echo $row['name'] . "\n";
  echo $row['email'] . "\n";
}

*/

?>