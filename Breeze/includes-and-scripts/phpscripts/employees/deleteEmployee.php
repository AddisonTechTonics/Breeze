<?php session_start();
	if ($_SESSION['user'] !== "ahh") {header('location: ../../../public/errors.php?error=AccessDenied');}
	else {
		include_once '../employeeDB.php';
		include_once '../functions.php';
		$EmployeeID = $_POST['EIDelete'];
		$EIDint = (int)$EmployeeID;
	}
	deleteEmployee($conn1, $EIDint);
