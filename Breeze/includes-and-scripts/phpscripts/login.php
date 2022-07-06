<?php session_abort();
	if (!isset($_POST['loginsubmit'])) {header("location: ../../public/loginpage.php?error=hacker"); exit();}
	else {
		//---------- Includes & Variables ----------\\
		$userinput = $_POST['userinput'];
		$passinput = $_POST['passinput'];
		include_once '../employeeDB.php';
		include_once '../functions.php';
		//--------------- Error Handling -------------\\
		if (emptyUserLogin($userinput, $passinput) !== false) {
			header("location: ../../public/errors.php?error=EmptyLogin"); exit();} 
		//------------------ Login --------------------\\
		userLogin($conn1, $userinput, $passinput);
	}