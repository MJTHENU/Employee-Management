<?php 
session_start();
include('vendor/inc/connection.php');

if (!isset($_SESSION['a_id'])) {
    header("Location: a-login.php");
    exit();
}

$sql = "SELECT * from `employee` , `rank` WHERE employee.emp_id = rank.emp_id";

//echo "$sql";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
<link rel = "stylesheet" href = "vendor/css/view-emp.css">
    <?php include('vendor/inc/head.php'); ?>
</head>
<body>
<?php include('vendor/inc/nav.php'); ?>
<h2 class="h2">Employee Details</h2>
<button class="add-emp"><a href="add-employee.php">Add Employee</a></button>
<div class="contain">
<table>
			<tr>

				<th align = "center">Emp. ID</th>
				<th align = "center">Picture</th>
				<th align = "center">Name</th>
				<th align = "center">Email</th>
				<th align = "center">Date Of Birth</th>
				<th align = "center">Gender</th>
				<th align = "center">Contact</th>
				<th align = "center">Address</th>
				<th align = "center">Department</th>
				<th align = "center">Degree</th>
				<th align = "center">Status</th>
				
				
				<th align = "center">Options</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['emp_id']."</td>";
                    echo "<td><img src='vendor/images/".$employee['img']."' height='60px' width='60px'></td>";
					echo "<td>".$employee['first_name']." ".$employee['last_name']."</td>";					
					echo "<td>".$employee['email']."</td>";
					echo "<td>".$employee['date_of_birth']."</td>";
					echo "<td>".$employee['gender']."</td>";
					echo "<td>".$employee['contact']."</td>";
					echo "<td>".$employee['address']."</td>";
					echo "<td>".$employee['dept']."</td>";
					echo "<td>".$employee['degree']."</td>";
					echo "<td>".$employee['status']."</td>";

					echo "<td><a class ='edit' href=\"edit.php?emp_id=$employee[emp_id]\">Edit</a> <br> <br>
					 <a class = 'delete' href=\"delete.php?emp_id=$employee[emp_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";

				}


			?>

		</table>
		
</div>

</body>
</html>