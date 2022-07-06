<?php include_once '../../includes/employeeDB.php'; include_once '../../includes/functions.php';

$customer = $_POST['newEvent'];
$date = $_POST['newDate'];
$time = $_POST['newTime'];
$address = $_POST['newAddress'];

$dateformat = date("Y-m-d", strtotime($date));
$timeformat = date("H:i:s", strtotime($time));
//-----------------Error Handling-----------------------//
if (emptyInputField($customer, $date, $time, $address) !== false) {
	header("location: ../errors.php?error=emptyInputforAppointment");
	exit();
}

createEvent($conn1, $customer, $dateformat, $timeformat, $address);