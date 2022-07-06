<?php 
if (isset($_POST['editSubmit'])) {
	include_once '../../includes/employeeDB.php'; 
	include_once '../../includes/functions.php';

	$address = $_POST['editAddress'];
	$customer = $_POST['editCustomer'];

	$date = $_POST['editDate'];
	$time = $_POST['editTime'];
	(int)$selectedAppt = $_POST['selectAppt'];

	$dateformat = date("Y-m-d", strtotime($date));
	$timeformat = date("H:i:s", strtotime($time));
	// $apptInt = (int)$selectedAppt;
	//-----------------------Error Handling----------------------------//

	if (emptyApptField($selectedAppt, $customer, $date, $time, $address) !== false) {
		header("location: ../../errors.php?error=emptyApptField");
	}
					// REMINDER: variables must be put in order they are used. 
					// editEvent() won't work if i put $selectedAppt before $conn1
	editEvent($conn1, $customer, $dateformat, $timeformat, $address, $selectedAppt);

} else {header("location: ../../errors.php?error=invalidaccessmethod");}
	// echo($apptInt." ".$dateformat ." ".$timeformat);
	/* (Confirms $apptInt is read as an integer)
	function square($apptInt) {$result = $apptInt * $apptInt; return $result;}
	square($apptInt);
	echo square($apptInt); */