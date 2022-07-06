<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/base.css">
	<link rel="stylesheet" href="styles/clouds.css">
	<title>Welcome to Breeze</title>
</head>
<body>
	<!-- ----------  Cloud Divs ---------- -->
	<div id="background-wrap">
    <div class="x1">
        <div class="cloud"></div>
    </div>

    <div class="x2">
        <div class="cloud"></div>
    </div>

    <div class="x3">
        <div class="cloud"></div>
    </div>

    <div class="x4">
        <div class="cloud"></div>
    </div>

    <div class="x5">
        <div class="cloud"></div>
    </div>
	</div>
	<!-- ---------- End Clouds ---------- -->
	<div class="loginbox">
		<h1>Breeze</h1>				<!-- ----- Log In ----- -->
		<p>Enter Username</p>
		<form method="post" action="../includes-and-scripts/phpscripts/login.php">
			<input type="text" name="userinput" id="enterusername">
			<p>Enter Password</p>
			<input type="password" name="passinput" id="enterpassword"></br>
			<button type="submit" name="loginsubmit">Submit</button>
		</form>
	</div>
	
</body>
</html>  