<?php include_once '../../includes/employeeDB.php'; include_once '../../includes/functions.php';

$selectedAppt = $_POST['selectAppt'];
$customer = $_POST['editCustomer'];
$date = $_POST['editDate'];
$time = $_POST['editTime'];
$address = $_POST['editAddress'];

$dateformat = date("Y-m-d", strtotime($date));
$timeformat = date("H:i:s", strtotime($time));
$apptInt = (int)$selectedAppt;
//-----------------------Error Handling----------------------------//

if (emptyApptField($selectedAppt, $customer, $date, $time, $address) !== false) {
	header("location: ../../errors.php?error=emptyApptField");
}

//-----------------------------------------------------------------//

editEvent($conn1, $apptInt, $customer, $dateformat, $timeformat, $address);
