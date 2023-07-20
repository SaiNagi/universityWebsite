<!DOCTYPE html>
<html>
<head>
	<title>Course and Student Marks</title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}
		form {
			display: inline-block;
			margin-bottom: 20px;
		}
		label {
			display: block;
			margin-bottom: 5px;
		}
		select {
        background-color: #fff;
        color: #333;
        font-size: 16px;
        font-family: Arial, sans-serif;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        outline: none;
        }

        select:hover {
        border-color: #aaa;
        }

        select:focus {
        border-color: #4d90fe;
        box-shadow: 0 0 8px rgba(77, 144, 254, 0.6);
        }

        .container{
            text-align:center;
        }
		table {
			border-collapse: collapse;
			margin: 0 auto;
            border-radius:8px;
            
		}
        
       
		th, td {
            width:20vw;
			padding: 5px 10px;
			text-align: center;
			border: 1px solid black;
            
		}
		th {
			background-color:#ff7f50;
			color: white;
            
            border: 1px solid black

		}
		input[type="number"] {
			width: 50px;
		}
		input[type="submit"] {
			background-color:#ff7f50;
			color: white;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #e62e00;
		}
        header {
        height: 100px;
        display: flex;
        justify-content:space-between;
        align-items: center;
        background-color: #ff7f50;
      }

.logo1 {
        margin-left: 10px;
        width: 180px;
        height: 90px;
        border-radius: 4px;
      }
      p{
        margin-top:30px;
        margin-bottom:5px;
      }
      .save-button{
        margin-top:20px;
      }
      h1{
        text-align:center;
        padding-right:10px;
      }
	</style>
</head>
<body>
    <header>
    <img src="https://i.ibb.co/Yf3SLJ9/university-logo.jpg" class="logo1" />
    <h2>Add Marks</h2>
      <h1>Faculty S-Top</h1>
    </header>

<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university3";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the list of courses
$sql = "SELECT * FROM courses1";
$result = $conn->query($sql);

// Display the list of courses in a dropdown menu
echo "<div class='container'>";
echo "<form method='post'>";
echo "<p>Select a course:</p><br>";
echo "<select name='course_id'>";
while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['course_id'] . "'>" . $row['course_name'] . "</option>";
}
echo "</select><br><br>";
echo "<input type='submit' value='Submit'>";
echo "</form>";

// Retrieve the list of students who have the selected course id
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST["course_id"];

    echo "<h1>Course Id: " . $course_id . "</h1>";
    $sql = "SELECT * FROM students1 WHERE '$course_id' IN (course1, course2, course3, course4)";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Display the list of students
        echo "<form method='post' action='add_marks.php'>";
        echo "<input type='hidden' name='course_id' value='" . $course_id . "'>";
        echo "<table class='table'>";
        echo "<tr class='head-row'><th>Name</th><th>Email</th><th>Reg.No</th><th>Marks</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>";
            echo "<input type='hidden' name='student_ids[]' value='" . $row['id'] . "'>";

            // Check if the student already has marks for this course
            if ($row['course1'] == $course_id) {
                echo "<input type='number' name='marks[]' value='" . $row['course1_marks'] . "'>";
            } else if ($row['course2'] == $course_id) {
                echo "<input type='number' name='marks[]' value='" . $row['course2_marks'] . "'>";
            } else if ($row['course3'] == $course_id) {
                echo "<input type='number' name='marks[]' value='" . $row['course3_marks'] . "'>";
            } else if ($row['course4'] == $course_id) {
                echo "<input type='number' name='marks[]' value='" . $row['course4_marks'] . "'>";
            } else {
                // If the student doesn't have marks for this course, show an empty input field
                echo "<input type='number' name='marks[]' value=''>";
            }

            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<input type='submit' value='Save' class='save-button'>";
        echo "</form>";
        echo "</div>"; 
    } else {
        echo "No students found.";
    }
}

