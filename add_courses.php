<!DOCTYPE html>
<html>
<head>
	<title>Add Courses</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			
			margin: 0;
		}
		h1 {
			text-align: center;
			margin: 50px 0;
			color: #555;
			font-size: 36px;
			font-weight: bold;
			text-transform: uppercase;
			letter-spacing: 2px;
		}
		form {
			width: 50%;
			margin: 50px auto;
			background-color: #fff;
			padding: 40px;
			border-radius: 6px;
			box-shadow: 0px 0px 20px #ccc;
		}
    form:hover{
      box-shadow: 0px 0px 20px   #ff7f50 ;
    }
		label {
			display: block;
			font-weight: bold;
			margin-bottom: 10px;
			color: #666;
			font-size: 18px;
			text-transform: uppercase;
			letter-spacing: 1px;
		}
		input[type="text"], select {
			width: 100%;
			padding: 10px;
			border: none;
			border-radius: 5px;
			margin-bottom: 20px;
			font-size: 16px;
			box-sizing: border-box;
			border: 1px solid #ccc;
			background-color: #f9f9f9;
		}
		select {
			
			
			background-size: 10px 6px;
			
			padding-right: 40px;
		}
		input[type="submit"] {
			background-color: #ff7f50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
			float: right;
			transition: all 0.2s ease-in-out;
		}
		input[type="submit"]:hover {
			background-color: #e62e00 ;
		}
		.logo1 {
        margin-left: 10px;
        width: 180px;
        height: 90px;
        border-radius: 4px;
      }
      header {
        height: 100px;
        display: flex;
        align-items: center;
        background-color: #ff7f50;
      }
	</style>
</head>
<body>
<header>
      
      <img src="https://i.ibb.co/Yf3SLJ9/university-logo.jpg" class="logo1" />
      <h1 style="text-align:center">Faculty S-Top</h1>
    </header>
	<h1>Add Courses</h1>
	<form method='post'>
		<label for="course-name">Course Name</label>
		<input type="text" id="course-name" name="course-name" required>

		<label for="course-id">Course ID</label>
		<input type="text" id="course-id" name="course-id" required>

		<label for="slot">Slot</label>
		<select id="slot" name="slot" required>
			<option value="">Select Slot</option>
			<option value="A1">A1</option>
			<option value="B1">B1</option>
			<option value="C1">C1</option>
			<option value="D1">D1</option>
			<option value="E1">E1</option>
		</select>
    <label for="userid">Faculty Id</label>
    <input type="text" id="userid" name="userid" required>

		<input type="submit" value="Add Course">
	</form>

  <?php
	// check if the form has been submitted
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// retrieve the form data
		$course_name = $_POST['course-name'];
		$course_id = $_POST['course-id'];
		$slot = $_POST['slot'];
   $userid = $_POST['userid'];

    

		// connect to the database
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$dbname = 'university3';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

		// check if the connection was successful
		if (!$conn) {
			die('Could not connect: ' . mysqli_connect_error());
		}

		
		$sql = "INSERT INTO courses1 (course_id, course_name,course_instructor_id, time_slot) VALUES ('$course_id','$course_name', '$userid', '$slot')";

		// execute the SQL statement
		if (mysqli_query($conn, $sql)) {
			echo "Course added successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		// close the database connection
		mysqli_close($conn);
	}
	?>
  </body>
  </html>
