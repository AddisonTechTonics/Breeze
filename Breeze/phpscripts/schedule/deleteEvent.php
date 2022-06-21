<?php 

include_once '../../includes/employeeDB.php';
include_once '../../includes/functions.php';

$ApptID = $_POST['ApptIDstring'];
$apptInt = (int)$ApptID;

deleteEvent($conn1, $apptInt);