<?php

include_once '../includes/employeeDB.php';
include_once '../includes/functions.php';
$newname = $_POST["newname"];
$newuser = $_POST["newuser"];
$prehash = $_POST["prehash"];
$prehash2 = $_POST["prehash2"];
// Error handling
if (emptyInputField($newname, $newuser, $prehash, $prehash2) !== false) {
	header("location: ../errors.php?error=emptyInputforEmployee");
	exit();
}
if (invalidUsername($newuser) !== false) {
	header("location: ../errors.php?error=invalidUsername");
	exit();
}
if (passMatch($prehash, $prehash2) !== false) {
	header("location: ../errors.php?error=noPassMatch");
	exit();
}
if (userExists($conn1, $newuser) !== false) {
	header("location: ../errors.php?error=userAlreadyExists");
	exit();
}
echo 'all handles passed'; // ---

createUser($conn1,$newname,$newuser,$prehash);