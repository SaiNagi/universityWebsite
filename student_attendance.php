<header>
    <img src="https://i.ibb.co/Yf3SLJ9/university-logo.jpg" class="logo1" />
    <h2> Attendence</h2>
      <h1>Student S-Top</h1>
</header>
    
<?php
// Start the session
session_start();

echo $_SESSION['userid'];
$student_id = $_SESSION['userid'];

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

// Retrieve the courses registered by the student

$sql = "SELECT course1, course2, course3, course4 FROM students1 WHERE id = $student_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['course1'] = $row['course1'];
    $_SESSION['course2'] = $row['course2'];
    $_SESSION['course3'] = $row['course3'];
    $_SESSION['course4'] = $row['course4'];
}

// Retrieve the list of courses
$sql = "SELECT * FROM courses1";
$result = $conn->query($sql);

// Display the list of courses in a dropdown menu
echo "<div class='container'>";
echo "<form method='post'>";
echo "Select a course:<br>";
echo "<select name='course_id'>";
while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['course_id'] . "'>" . $row['course_name'] . "</option>";
}
echo "</select><br><br>";
echo "<input type='submit' value='Submit'>";
echo "</form>";

// Retrieve the attendance data for the selected course and logged-in student
if (isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];
    
    // Check if the selected course is registered by the student
    $course_column = "";
    if ($_SESSION['course1'] == $course_id) {
        $course_column = 'course1_attend';
    } else if ($_SESSION['course2'] == $course_id) {
        $course_column = 'course2_attend';
    } else if ($_SESSION['course3'] == $course_id) {
        $course_column = 'course3_attend';
    } else if ($_SESSION['course4'] == $course_id) {
        $course_column = 'course4_attend';
    }
    
    if($course_column != ""){
    $sql = "SELECT $course_column FROM students1 WHERE id = $student_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $attendance = $row[$course_column];
        $total_classes = 30; // Change this to the total number of classes for this course
        
        if ($attendance != null) {
            $attendance_percent = round(($attendance / $total_classes) * 100, 2);
            echo "<br>";
            echo "Your attendance in " . $_POST['course_id'] . " is " . $attendance_percent . "%.";
        } else {
            echo "<br>";
            echo "You have not attended any classes for this course yet.";
        }
    } else {
        echo "An error occurred while retrieving your attendance data.";
    }
}
echo "</div>";
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .pie-chart{
            /* margin:40px auto; */
            height:400px; 
            width:400px; 
            border-radius:50%;
            background-color:yellow; 
            background:repeating-conic-gradient(
                from 0deg,
                lightgreen 0deg calc(3.6deg*<?php 
                if (isset($attendance_percent)) {
                    echo $attendance_percent;
                } else {
                    echo 0;
                }
                ?> ),
                skyblue calc(3.6deg*<?php 
                if (isset($attendance_percent)) {
                    echo $attendance_percent;
                } else {
                    echo 0;
                }
                ?> ) calc(3.6deg*100)
            );
        }
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
        border-color: green;
        box-shadow: 0 0 8px green;
        }

        .container{
            text-align:center;
            padding-top:40px;
        }
		table {
			border-collapse: collapse;
			margin: 0 auto;
            border-radius:8px;
            margin-top:40px;
            
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
      form{
        width:30vw;
        margin-top:20px;
        
        
      }
      .present{
        color:green;
        font-size:20px; 
        font-weight:500; 

      }
      .absent{
        color:skyblue;
        font-size:20px; 
        font-weight:500; 

      }
      .text{
        text-align:center;
        display:flex; 
        flex-direction:column; 
        justify-content:center;
        padding-left:30px;

      }
      .flex{
        margin-top:60px;
        /* width:80vw;
        margin:20px auto; */
        text-align:center;
        display:flex;

        justify-content:center;
        
      }
        </style>
</head>
<body>

<div class='flex'>
<div class='pie-chart'></div>  
<div class='text'>
    <p class='present'> <?php 
                if (isset($attendance_percent)) {
                    echo "Attendence:" .$attendance_percent;
                } else {
                    echo  "You have not registered for this course" ;
                }
                ?></p>
    <p class='absent'> <?php 
                if (isset($attendance_percent)) {
                    echo "Absent: " .(100-$attendance_percent);
                } 
                ?></p>
</div>
    </div>

</body>
</html>
    