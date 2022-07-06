<?php session_start();
	if ($_SESSION['user'] !=="ahh") {header("location: ../../../");}
	include_once '../../employeeDB.php';
	include_once '../../functions.php';

	$ApptID = $_POST['ApptIDstring'];
	$apptInt = (int)$ApptID;

	deleteEvent($conn1, $apptInt);