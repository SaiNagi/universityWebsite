<!DOCTYPE html>
<html>
<head>
	<title>Student Marks Entry</title>
</head>
<body>
	<h1>Student List</h1>
	<table>
		<tr>
			<th>Student ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Marks</th>
		</tr>
		<?php
		// Database connection
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "university3";
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Query to get all students
		$sql = "SELECT * FROM students1";
		$result = $conn->query($sql);

		// Loop through all students and display them in a table
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["id"] . "</td>";
				echo "<td>" . $row["name"] . "</td>";
				echo "<td>" . $row["email"] . "</td>";
				
				echo "<td><form method='post' action=''>";
				echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
				echo "<input type='number' name='marks' min='0' max='100' required>";
				echo "<input type='submit' name='submit' value='Submit'>";
				echo "</form></td>";
				echo "</tr>";
			}
		} else {
			echo "0 results";
		}

		// Insert marks for a student if form is submitted
		if (isset($_POST['submit'])) {
			$id = $_POST['id'];
			$marks = $_POST['marks'];
			$sql = "UPDATE students1 SET marks=$marks WHERE id=$id";
			if ($conn->query($sql) === TRUE) {
			    echo "Marks updated successfully";
			} else {
			    echo "Error updating marks: " . $conn->error;
			}
		}

		$conn->close();
		?>
	</table>
</body>
</html>
