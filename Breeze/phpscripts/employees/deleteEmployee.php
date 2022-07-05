<?php session_start();
if ($_SESSION['user'] === "ahh") {
	include_once '../../includes/employeeDB.php';
	include_once '../../includes/functions.php';
	$EmployeeID = $_POST['EIDelete'];
	$EIDint = (int)$EmployeeID;

	deleteEmployee($conn1, $EIDint);
} else {header('location: ../errors.php?error=AccessDenied');}