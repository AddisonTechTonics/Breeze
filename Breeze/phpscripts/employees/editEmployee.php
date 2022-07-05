<?php 
if (isset($_POST['submitupdate'])) {
	include_once '../../includes/employeeDB.php';
	include_once '../../includes/functions.php';

	$EmployeeID = $_POST["EmployeeID"];
	$EmployeeName = $_POST["EmployeeName"];
	$EmployeeUsername = $_POST["EmployeeUsername"];
	$EIDint = (int)$EmployeeID;

	//---------- Error Handling ----------//
	if (emptyUpdateField($EmployeeID, $EmployeeName, $EmployeeUsername) !== false) {
		header("location: ../errors.php?error=EmptyUpdateField");
	}
	if (checkEID($conn1, $EmployeeID) !== false) {
		header("location: ../errors.php?error=EmployeeIDNotFound");
	}
	// ---------- Update Employee Record ---------- //
	editEmployee($conn1,$EmployeeName,$EmployeeUsername, $EIDint);

} else {header('location: ../errors.php?error=attemptedHAX');}