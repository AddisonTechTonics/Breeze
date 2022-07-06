<?php session_start(); // Start session , add includes and redirect if access denied to user \\
	if ($_SESSION['user'] !== "ahh") {header("location: user-profile.php");} 
	else {
		include_once '../../includes-and-scripts/employeeDB.php'; 
		include_once '../../includes-and-scripts/functions.php';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../styles/mainstyle.css">
	<title>Manage Employees</title>
</head>
<body>

	<div class="navbar">  <!-- ---------- Navbar ----------- -->
		<ul class="navitems">
			<li><a href="events.php">Manage Jobs</a></li>
			<li><a href="home.php">Home</a></li>
			<li class="active"><a class="active" href="employees.php">Manage Employees</a></li>
		</ul>
	</div>

	<div class="spacer"></div>

	<div class="list"> <!--Pull Employee Table from Database-->
	<h1>List View</h1>
	<div class="spacer"></div>
		<?php
			$sql = "SELECT * FROM Employees;";
			$result = mysqli_query($conn1, $sql);
			if(mysqli_num_rows($result) > 0){
			//---- Create Viewable HTML Table ------------------\\
				echo '<table class="EmployeeList">';
					echo "<thead>";
						echo "<tr>";
							echo "<th>Employee ID</th>";					
							echo "<th>Name</th>";
							echo "<th>Username</th>";
					//	echo "<th>Active</th>";
					//	echo "<th>Access</th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
				//------------------insert DB results into Table-------------\\
				while($row = mysqli_fetch_array($result))
					{
						echo "<tr>";
							echo "<td>" . $row['EmployeeID'] . "</td>";
							echo "<td>" . $row['EmployeeName'] . "</td>";
							echo "<td>" . $row['EmployeeUsername'] . "</td>";
						//echo "<td>" . $row[''] . "</td>";
						//echo "<td>";
						echo "</tr>";
					} 
				mysqli_close($conn1);} else {header("location: ../errors.php?error=wontshowemployees");}?>
			</tbody>
		</table>
	</div> <!------------------Employee View Div--------------------------->

	<div class="spacer"></div>

	<div class="add">
		<h3>Add New Employee</h3>
		<div class="spacer"></div>
		<form action="../../includes-and-scripts/phpscripts/employees/addemployee.php" method="post">
			<input type="text" name="newname" id="newEmpName" placeholder="Enter Employee Name...">
			<input type="text" name="newuser" id="newUsername" placeholder="Enter Employee Username...">
			<input type="password" name="prehash" id="newPassword" placeholder="Enter Employee Password...">
			<input type="password" name="prehash2" id="verifyPassword" placeholder="Enter Password Again...">
			<button type="submit" name="submitadd">Submit</button>
		</form>
	</div>

	<div class="spacer"></div>

	<div class="edit">
		<h3>Update Existing Entry</h3>
		<div class="spacer"></div>
		<form action="../../includes-and-scripts/phpscripts/employees/editEmployee.php" method="post">
			<input type="number" name="EmployeeID" min="0" step="1" placeholder="Enter EID...">
			<input type="text" name="EmployeeName" id="empname" placeholder="Enter Employee Name...">
			<input type="text" name="EmployeeUsername" placeholder="Enter Desired Username">
			<button type="submit" name="submitupdate">Submit</button>
		</form>
	</div>

	<div class="spacer"></div>
	
	<div class="hide">
		<h3>Delete Employee From Database</h3>
		<div class="spacer"></div>
		<form action="../../includes-and-scripts/phpscripts/employees/deleteEmployee.php" method="post">
			<input type="number" name="EIDelete" placeholder="Select ...">
			<!-- ---------- Are you sure prompt ---------- -->
			<button type="submit" name="submitdelete">Submit</button>
		</form>
	</div>

  <!--
	<div class="spacer"></div>
  <div>
	 	<h6><a href="../errors.php?error=fxckyocouch">Reset Password</a></h6> 
	</div> 
	-->
</body>
</html>