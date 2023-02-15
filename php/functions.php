<?php // all custom functions for signup and login reside here

function emptySignupForm($fname, $lname, $signupEmail, $uname, $newPass, $checkpass) {
  $result;
  if (empty($fname) || empty($lname) || empty($signupEmail) || empty($uname) || empty($newPass) || empty($checkpass)) {
    $result = true; }
  else { $result = false; }
  return $result; }

function invalidUsername($uname) {
  $result;
  if (!preg_match('/[a-zA-Z0-9]/', $uname)) { $result = true; } 
  else { $result = false; } return $result; }
  

function invalidEmail($signupEmail) {
  $result;
  if (!filter_var($signupEmail, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  } else { $result = false; }
  return $result;
}

function no_passMatch($newPass, $checkPass) {
  $result; 
  if ($newPass !== $checkPass) {
    $result = true;
  } else { $result = false; }
  return $result;
} 

function usernameExists($pdo, $uname) {
  $result;
  $stmt = $pdo->prepare("SELECT * FROM users WHERE uname = ?;");
  $stmt->execute([$uname]);
  $rowcount = $stmt->rowCount();
  if ($rowcount > 0) {
    $result = true;
  } else { $result = false; }
  return $result; exit();
}

function emailInUse($pdo, $signupEmail) {
  $result;
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?;");
  $stmt->execute([$signupEmail]);
  $rowcount = $stmt->rowCount();
  if ($rowcount > 0) {
    $result = true;
  } else { $result = false; }
  return $result; exit();
}

function emptylogin1($loginEmail, $loginPass) {
  $result;
  if (empty($loginEmail) || empty($loginPass)) {
    $result = true;
  } 
  else {$result = false;}
  return $result; exit();
}
// End of Error functions, beginning utility functions //
//                                                     //
function createUser($pdo, $fname, $lname, $signupEmail, $uname, $newPass) {
  $hashedPass = password_hash($newPass, PASSWORD_BCRYPT);
  $stmt = $pdo->prepare("INSERT INTO users (fname, lname, email, uname, password) VALUES (?,?,?,?,?);");
  $stmt->execute([$fname, $lname, $signupEmail, $uname, $hashedPass]);
}

function loginUser($pdo, $loginEmail, $uname, $loginPass) {
  $sql = "SELECT * FROM users WHERE uname = ? OR email = ?;";
  $stmt = prepare($sql);
  $stmt->execute([$loginEmail, $uname]);
  $hashedPass = $stmt->fetchColumn(5);
  $rowcount = $stmt->rowCount();
  //Mini Error handler
    if ($rowcount < 1) {
       header($loginpage . '?error=loginfailed');
       exit();
    } else {
      $passcheck = password_verify($loginPass, $hashedPass);
      if ($passcheck = true) {
        session_start();
        header($welcomepage);
      }
      else {
        header($loginpage . '?error=loginfailed');
        exit();
      }
  }
}

?>