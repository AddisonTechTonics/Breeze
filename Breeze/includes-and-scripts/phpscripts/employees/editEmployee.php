<?php session_start();
if ($_SESSION['user'] === "ahh") {
	include_once '../employeeDB.php';
	include_once '../functions.php';

	$EmployeeID = $_POST["EmployeeID"];
	$EmployeeName = $_POST["EmployeeName"];
	$EmployeeUsername = $_POST["EmployeeUsername"];
	$EIDint = (int)$EmployeeID;

	//---------- Error Handling ----------//
	if (emptyUpdateField($EmployeeID, $EmployeeName, $EmployeeUsername) !== false) {
		header("location: ../../../public/errors.php?error=EmptyUpdateField");
	}
	if (checkEID($conn1, $EmployeeID) !== false) {
		header("location: ../../../public/errors.php?error=EmployeeIDNotFound");
	}
	// ---------- Update Employee Record ---------- //
	editEmployee($conn1,$EmployeeName,$EmployeeUsername, $EIDint);

} else {header('location: ../../../public/errors.php?error=AccessDenied');}