<?php session_start();
	include_once '../../includes-and-scripts/employeeDB.php'; 
	include_once '../../includes-and-scripts/functions.php'; 
	$loggedinuser = $_SESSION["user"];
	if (!$loggedinuser) {header("location: ../index.html?error=didntlogin");}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles/mainstyle.css">
	<title>Welcome </title>
</head>
<body>

	<div class="navbar">  		 <!-- ------------------Navbar------------------ -->
		<ul class="navitems">
			<li><a href="events.php">Manage Schedule</a></li>
			<li class="active"><a class="active" href="home.php">Home</a></li>
			<li><a href="employees.php">Manage Employees</a></li>
		</ul>
	</div>									 	<!-- ------------------Navbar------------------ -->

	<div class="list">
		<?php echo '<h1>Welcome, '.($loggedinuser).'</h1>' ?>
		<h1>List View</h1>
		<div class="spacer"></div>
		<?php  //------------------ Pull list of Active Appointments from DB ----------------------//
		$sql = "SELECT ApptID, Customer, ApptDate, ApptTime, ApptAddress FROM Appointments WHERE Active = 1;";
		$result = mysqli_query($conn1, $sql);
		if(mysqli_num_rows($result) > 0) { 
			echo '<table class="ApptList">'; //---------Create viewable HTML Table---------//
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
	</div>                      <!-- ----------End Appointment View--------- -->

										<!-- Logout Function -->
</body>
</html>