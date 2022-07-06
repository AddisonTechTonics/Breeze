<?php session_start();
	if ($_SESSION['user'] !== "ahh") {header('location: ../../../public/home.php');}
	else {
		include_once '../../employeeDB.php'; 
		include_once '../../functions.php';
	}
	//	$loggedinuser = $_SESSION["user"];
	//if (!$loggedinuser) {header("location: ../index.html?didntlogin");}
	//if ($loggedinuser !== "ahh") {header("location: home.php");}

	$newname = $_POST["newname"];
	$newuser = $_POST["newuser"];
	$prehash = $_POST["prehash"];
	$prehash2 = $_POST["prehash2"];
	// Error handling ------------------------------------
	if (emptyInputField($newname, $newuser, $prehash, $prehash2) !== false) {
		exit();	header("location: ../../../public/errors.php?error=emptyInputforEmployee");
	}
	if (invalidUsername($newuser) !== false) {
		exit();	header("location: ../../../public/errors.php?error=invalidUsername");
	}
	if (passMatch($prehash, $prehash2) !== false) {
		exit();	header("location: ../../../public/errors.php?error=noPassMatch");
	}
	if (userExists($conn1, $newuser) !== false) {
		exit();	header("location: ../../../public/errors.php?error=userAlreadyExists");
	}
	echo 'all handles passed'; // ---

	createUser($conn1,$newname,$newuser,$prehash);