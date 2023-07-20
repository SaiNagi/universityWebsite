<!DOCTYPE html>
<html>
<head>
	<title>Faculty Search</title>
</head>
<body>
	<h1>Faculty Search</h1>
	<form method="post" action="">
		<label for="search">Search Faculty:</label>
		<input type="text" name="search" id="search">
		<input type="submit" name="submit" value="Search">
	</form>
	<br>
	<?php
	// check if form is submitted
	if (isset($_POST['submit'])) {
		// connect to database
		$db = mysqli_connect("localhost", "root", "", "university3");

		// escape special characters in the search term to prevent SQL injection
		$search = mysqli_real_escape_string($db, $_POST['search']);

		// query to search faculty
		$sql = "SELECT * FROM faculty WHERE name LIKE '%$search%'";

		// execute query and get results
		$result = mysqli_query($db, $sql);

		// check if any result is found
		if (mysqli_num_rows($result) > 0) {
			// display results in a table
			echo "<table>";
			echo "<tr><th>ID</th><th>Username</th><th>Name</th><th>Department</th></tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td><td>".$row['name']."</td><td>".$row['department']."</td></tr>";
			}
			echo "</table>";
		} else {
			echo "No result found.";
		}

		// close database connection
		mysqli_close($db);
	}
	?>
</body>
</html>
