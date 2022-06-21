<?php 

	$userinput = $_POST['userinput'];
	$passinput = $_POST['passinput'];
	include_once '../includes/employeeDB.php';
	include_once '../includes/functions.php';

if (isset($_POST["submit"])) {
	if (emptyUserLogin($userinput, $passinput) !== false) 
	{header("location: ../errors.php?error=EmptyLogin"); exit();} 
	userLogin($conn1, $userinput, $passinput);
}	else {header("location: ../index.html?error=hacker"); exit();}