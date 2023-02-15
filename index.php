<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Breeze</title>
</head>
<body>
  
  <h1>Log In</h1>
  <form action="php/auth.php" method="post">

    <label for="loginEmail">Username or Email Address:</label><br>
    <input type="loginEmail" name="loginEmail" id="loginEmail" maxlength="64">
    <br>
    <label for="loginPass">Password:</label><br>
    <input type="password" name="loginPass" id="loginPass" maxlength="32">
    <br>
    <input type="submit" name="submitlog" id="submitlog">

  </form>

  <h2>Sign Up</h2>
  <form action="php/signup.php" method="post">

    <label for="fname">First Name: </label><br>
    <input type="text" name="fname" id="fname" maxlength="15">
    <br>
    <label for="lname">Last Name: </label><br>
    <input type="text" name="lname" id="lname" maxlength="16">
    <br>
    <label for="signupEmail">Email Address: </label><br>
    <input type="text" name="signupEmail" id="signupEmail" maxlength="64">
    <br>
    <label for="uname">Desired Username: </label><br>
    <input type="text" name="uname" id="uname" maxlength="18">
    <br>
    <label for="newPass">Create A Password: </label><br>
    <input type="password" name="newPass" id="newPass" maxlength="36">
    <br>
    <label for="checkPass">Verify Password: </label><br>
    <input type="password" name="checkPass" id="checkPass" maxlength="36">
    <br>
    <input type="submit" name="newUser" id="newUser">

  </form>

  <!-- // Common Error Messages //-->

  <?php 
  
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptySignupForm") {
      echo "<p>Fields cannot be blank</p>";
    }
    else if ($_GET["error"] == "invalidUsername") {
      echo "<p>Invalid Username, must be alphanumeric.</p>";
    }
    else if ($_GET["error"] == "invalidEmailAddress") {
      echo "<p>Invalid Email Address</p>";
    }
    else if ($_GET["error"] == "passwordsDontMatch") {
      echo "<p>Passwords didn't match</p>";
    }
    else if ($_GET["error"] == "usernameExists") {
      echo "<p>Username already exists</p>";
    }
    else if ($_GET["error"] == "emailInUse") {
      echo "<p>That Email Address is already in use</p>";
    }
    else if ($_GET["error"] == "userDoesntExist") {
      echo "<p>Username or password incorrect or doesnt exist</p>";
    }
    else { echo "<p>Unknown error has occurred</p>"; }
  }
  ?>

</body>
</html>