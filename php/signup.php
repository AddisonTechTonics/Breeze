<?php

require_once 'router.php';

$newUser = $_POST['newUser'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$signupEmail = $_POST['signupEmail'];
$uname = $_POST['uname'];
$newPass = $_POST['newPass'];
$checkPass = $_POST['checkPass'];

// makes sure user clicks submit    //
if (!isset($newUser)) { 
header($loginpage . '?error=mustproperlysubmit'); 
die();
}
//                                 //
require_once 'db.php';
require_once 'functions.php';

//   input validation functions    //
if (emptySignupForm($fname, $lname, $signupEmail, $uname, $newPass, $checkPass) !== false) {
  header($loginpage . '?error=emptySignupForm');
  exit(); //                                      //
}
if (invalidUsername($uname) !== false) {
  header($loginpage . '?error=invalidUsername');
  exit(); //                                      //
}
if (invalidEmail($signupEmail)  !== false)  {
  header($loginpage . '?error=invalidEmailAddress');
  exit(); //                                      //
}
if (no_passMatch($newPass, $checkPass) !== false)  {
  header($loginpage . '?error=passwordsDontMatch');
  exit(); //                                      //
}
if (usernameExists($pdo, $uname)  !== false)  {
  header($loginpage . '?error=usernameExists');
  exit(); //                                      //
}
if (emailInUse($pdo, $signupEmail) !== false) {
  header($loginpage . '?error=EmailInUse');
  exit(); //
}

//  This will execute if user passes validations  //
createUser($pdo, $fname, $lname, $signupEmail, $uname, $newPass);
header($welcomepage);
exit();
/*
echo 'Valid inputs';



$fname = $_POST['fname'];
$lname = $_POST['lname'];

if (ctype_digit($fname) != false) {
}
*/