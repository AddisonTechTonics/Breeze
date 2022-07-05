<?php session_start();
	include_once '../includes/employeeDB.php'; include_once '../includes/functions.php'; 
	$loggedinuser = $_SESSION["user"];
	if (!$loggedinuser) {header("location: ../index.html?didntlogin");}
	if ($loggedinuser !== "ahh") {header("location: home.php");} //----- Restrict to Admin Access -----//
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../styles/mainstyle.css">
	<title>Scheduled Jobs</title>
</head>
<body>

	<div class="navbar">
		<ul class="navitems">
			<li class="active"><a class="active" href="events.php">Manage Jobs</a></li>
			<li><a href="home.php">Home</a></li>
			<li><a href="employees.php">Manage Employees</a></li>
		</ul>
	</div>

	<div class="spacer"></div>

	<div class="list">
		<h1>List View</h1>
		<div class="spacer"></div>
		<?php  //-------- Pull list of Active Appointments from DB -----------------
		$sql = "SELECT ApptID, Customer, ApptDate, ApptTime, ApptAddress FROM Appointments WHERE Active = 1;";
		$result = mysqli_query($conn1, $sql);
		if(mysqli_num_rows($result) > 0) { 
			echo '<table class="ApptList">'; //---------Create viewable HTML Table -----
				echo "<thead>";
				echo "<tr>";
					echo "<th>Appointment ID</th>";					
					echo "<th>Customer</th>";
					echo "<th>Appt Date</th>";
			  	echo "<th>Appt Time</th>";
			  	echo "<th>Appt Address</th>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			//------------------insert DB results into Table-------------\\
			while ($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
						echo "<td>" . $row['ApptID'] . "</td>";
						echo "<td>" . $row['Customer'] . "</td>";
						echo "<td>" . $row['ApptDate'] . "</td>";
					  echo "<td>" . $row['ApptTime'] . "</td>";
					  echo "<td>" . $row['ApptAddress'] . "</td>";
					echo "</tr>";
				}
				mysqli_close($conn1);} else {header("location: ../errors.php?error=wontshowappointments");}?>
			</tbody>
		</table>
	</div> <!-- ----------End Appointment View--------- -->
	
	<div class="spacer"></div>

	<div class="add"> <!-- ---------------Add new Event--------------- -->
		<h3>Add New Event</h3>
		<div class="spacer"></div>
		<form action="../phpscripts/schedule/addEvent.php" method="post">
			<input type="text" name="newEvent" placeholder="Customer Name...">
			<input type="date" name="newDate" placeholder="Scheduled Date...">
			<input type="time" name="newTime" placeholder="Scheduled Time...">
			<input type="text" name="newAddress" placeholder="Job Address...">
			<button type="submit" name="newSubmit">Submit</button>
		</form>
	</div>
	
	<div class="spacer"></div>

	<div class="edit"> <!-- ---------------Edit Existing Event--------------- -->
		<h3>Update Event</h3>
		<div class="spacer"></div>
		<form action="../phpscripts/schedule/editEvent.php" method="post">
			<input type="number" name="selectAppt" placeholder="Enter Appt ID...">
			<input type="text" name="editCustomer" placeholder="Edit Customer Name...">
			<input type="date" name="editDate" placeholder="Edit Date...">
			<input type="time" name="editTime" placeholder="Edit Time...">
			<input type="text" name="editAddress" placeholder="Edit Address...">
			<button type="submit" name="editSubmit">Submit</button>
		</form>
	</div>

	<div class="spacer"></div>

	<div class="hide"> <!-- ---------------Delete Existing Event--------------- -->
		<h3>Hide Event</h3>
		<div class="spacer"></div>
		<form action="../phpscripts/schedule/deleteEvent.php" method="post">
			<input type="number" name="ApptIDstring" placeholder="Enter Appt ID...">
			<!-- ---------------Are you Sure Prompt--------------- -->
			<button type="submit" name="deleteSubmit">Submit</button>
		</form>
	</div>

</body>
</html>