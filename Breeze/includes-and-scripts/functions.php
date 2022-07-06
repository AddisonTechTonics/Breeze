<?php 
// error handle -- Check if Fields are empty
function emptyUserLogin($userinput, $passinput) {
	$result;
	if (empty($userinput) || empty($passinput)) {
		$result = true;
	}
	else {$result = false;} return $result;
} 
//check if user exists with prepared statement
function userExists($conn1, $userinput) {
	$sql = "SELECT * FROM Employees WHERE EmployeeUsername = ?;";
	$stmt = mysqli_stmt_init($conn1);
 //handle prepare error
	if (!mysqli_stmt_prepare($stmt, $sql)) {header("location: ../errors.php?error=stmtfail");exit();}	
 // bind, execute and store in $resultData
	mysqli_stmt_bind_param($stmt, "s", $userinput);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
 // create $row as an assoc array of $resultData aka statement result
	if ($row = mysqli_fetch_assoc($resultData)) {return $row;}
	else {$result = false;return $result;}
 // close
	mysqli_stmt_close($stmt);
} 

// ----------take function userExists() to grab username and assoc data  */
function userLogin($conn1,$userinput,$passinput) {
	$userExists = userExists($conn1, $userinput); //error handle (change below error for production)
	if ($userExists === false) {header("location: ../errors.php?error=invalidusername"); exit();}
//call hashed DB password and verify against user entered password
	$savedhash = $userExists["EmployeePassword"];
	$checkpass = password_verify($passinput, $savedhash);
// error handle
	if ($checkpass === false) {header("location: ../errors.php?error=WrongCredentials"); exit();}
	else if ($checkpass === true) { // if true, start session with two session variables
		session_start();
		$_SESSION["userid"] = $userExists["EmployeeID"];
		$_SESSION["user"] = $userExists["EmployeeUsername"];
		header("location: ../loggedin/home.php"); // redirect to logged in home page
	}
}
// -------- Add Employee Error Handles ------- // fn called in phpscripts/addemployee.php
function emptyInputField($newname, $newuser, $prehash, $prehash2) {
	$result; 
	if (empty($newname) || empty($newuser) || empty($prehash) || empty($prehash2)) {
		$result = true;
	} else {$result = false;} return $result;
}
function invalidUsername($newuser) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $newuser)) {
		$result = true;
	} else {$result = false;} return $result;
}
function passMatch($prehash, $prehash2) {
	$result;
	if ($prehash !== $prehash2) {$result = true;}
	else {$result = false;} return $result;
} // ----- Add employee to DB --------- //  ######################################################

function createUser($conn1, $newname, $newuser, $prehash) {
	$sql = "INSERT INTO Employees (EmployeeName, EmployeeUsername, EmployeePassword) VALUES (?,?,?);";
	$stmt = mysqli_stmt_init($conn1);
//------error handle for stmt-------//
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		header("location: ../../errors.php?error=CreateUserStmtFailed");
		exit();
	} // hash the password  for db storage
	$hashpass = password_hash($prehash, PASSWORD_DEFAULT);
	// bind, execute, close $stmt as well as relocate back to homepage
	mysqli_stmt_bind_param($stmt, "sss", $newname, $newuser, $hashpass);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../../loggedin/employees.php?status=UpdatedSuccessfully");
}	//--- Update Existing Entry  ---\\    //
// ------------//|\\---------------\\ // check for empty inputs
function emptyUpdateField($EmployeeID, $EmployeeName, $EmployeeUsername) {
	$result;
	if (empty($EmployeeID) || empty($EmployeeName) || empty($EmployeeUsername)) {
		$result === false; 
	} else {$result === true;} return $result;
}

function checkEID($conn1, $EmployeeID) {
	//------------------------------ init 
	$sql = "SELECT * FROM Employees WHERE EmployeeID = ?;";
	$stmt = mysqli_stmt_init($conn1);
	//------------------------------ prepare
	if (!mysqli_stmt_prepare($stmt, $sql)) {header("location: ../../errors.php?error=checkEIDstmtfail");exit();}
	//------------------------------ bind/execute	
	mysqli_stmt_bind_param($stmt, "i", $EmployeeID);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {return $row;}
	else {$result = false;return $result;}
	//----------------------- close
	mysqli_stmt_close($stmt);
}

function editEmployee($conn1, $EmployeeName, $EmployeeUsername, $EIDint) {

	$sql = "UPDATE Employees SET EmployeeName = ?, EmployeeUsername = ? WHERE EmployeeID = ?;";
	$stmt = mysqli_stmt_init($conn1); 

	if (!mysqli_stmt_prepare($stmt, $sql)) {header("location: ../errors.php?error=updatestmtfail");exit();}
	
	mysqli_stmt_bind_param($stmt, "ssi", $EmployeeName, $EmployeeUsername, $EIDint);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../../loggedin/employees.php");
}

function deleteEmployee($conn1, $EIDint) {

	$sql = "DELETE FROM Employees WHERE EmployeeID = ?;";
	$stmt = mysqli_stmt_init($conn1);

	if (!mysqli_stmt_prepare($stmt, $sql)) {header("location: ../errors.php?error=deletestmtfail");exit();}

	mysqli_stmt_bind_param($stmt, "i", $EIDint);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../../loggedin/employees.php");
}

//--------------------------------------------------------------------------------------------//
//                            Schedule/Appointment Functions                                  //
//--------------------------------------------------------------------------------------------//

function createEvent($conn1, $customer, $dateformat, $timeformat, $address) {
	$sql = "INSERT INTO Appointments (Customer, ApptDate, ApptTime, ApptAddress) VALUES (?,?,?,?);";
	$stmt = mysqli_stmt_init($conn1);
	if (!mysqli_stmt_prepare($stmt,$sql)) {header("location: ../../errors.php?error=CreateEventStmtFail");exit();}
	mysqli_stmt_bind_param($stmt,"ssss", $customer, $dateformat, $timeformat, $address);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../../loggedin/events.php");
}

function editEvent($conn1, $customer, $dateformat, $timeformat, $address, $selectedAppt) {
	$sql = "UPDATE Appointments SET Customer = ?, ApptDate = ?, ApptTime = ?, ApptAddress = ? WHERE ApptID = ?;";
	$stmt = mysqli_stmt_init($conn1);

	if (!mysqli_stmt_prepare($stmt, $sql)) {header("location: ../../errors.php?error=editEventStmtFail");}

	mysqli_stmt_bind_param($stmt, "ssssi", $customer, $dateformat, $timeformat, $address, $selectedAppt);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../../loggedin/events.php");
}

function deleteEvent($conn1,$apptInt) {
	$sql = "UPDATE Appointments SET Active = 0 WHERE ApptID = ?;";
	$stmt = mysqli_stmt_init($conn1);
	if (!mysqli_stmt_prepare($stmt, $sql)) {header("location: ../errors.php?error=hideEventSTMTFail");exit();}
	mysqli_stmt_bind_param($stmt, "i", $apptInt);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../../loggedin/events.php");

}

//------------------------Appt Error Handlers--------------------------//
function emptyApptField($selectedAppt, $customer, $date, $time, $address) {
	$result;
	if(empty($selectedAppt) || empty($customer) || empty($date) || empty($time) || empty($address) == true) {
		$result == true;
	} else {$result = false;} return $result;
}

//-------------------------------------------------------//
/*------ Early Dev Test Function 
function testlogin($conn1,$userinput,$passinput) {
	$userExists = userExists($conn1, $userinput);
	if ($userExists === false) {header("location: ../errors.php?error=InvalidTest");}
//missing hash process. DEVELOPMENT USE ONLY!
	$savedpass = $userExists["EmployeePassword"];
	if ($savedpass === $passinput) {
		session_start(); // start session and assign 2 session variables
		$_SESSION["userid"] = $userExists["EmployeeID"];
		$_SESSION["user"] = $userExists["Username"];
		header("location: ../loggedin/home.html"); // redirect to logged in home page
	} else {header("location: ../errors.php?error=nopassmatch");}
} */