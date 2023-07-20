<?php
// Connect to the database
session_start(); 
$student_id = $_SESSION['userid'];
// $student_id = 9220; 
$servername = "localhost";

$username = "root";
$password = "";
$dbname = "university3";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT course1, course2, course3, course4 FROM students1 WHERE id = $student_id";
$result = $conn->query($sql);

// Get the exam dates based on the student's courses and slots
$exam_dates = array();
$course_names = array(); 
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // $courses = array_filter($row); // Remove empty values
    foreach ($row as $course) {
        $sql = "SELECT time_slot,course_name FROM courses1 WHERE course_id = $course";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $slot = $row["time_slot"];
            $course_names[] = $row['course_name'];
            switch ($slot) {
                case "A1":
                    $exam_dates[] = "13-05-2023";
                    break;
                case "B1":
                    $exam_dates[] = "14-05-2023";
                    break;
                case "C1":
                    $exam_dates[] = "15-05-2023";
                    break;
                case "D1":
                    $exam_dates[] = "15-04-2023";
                    break;
                case "E1":
                    $exam_dates[] = "16-04-2023";
                    break;
                default:
                    $exam_dates[] = "Unknown";
            }
        }
    }
}

// Close the database connection
$conn->close();
?>



<html>
  <head>
    <title>Examination Schedule</title>
    <style>
      
      /* Set the background color */
      body {
        background-color: #f2f2f2;
      }
      /* Style the table */
      table {
        border-collapse: collapse;
        width: 80%;
        margin: auto;
      }
      /* Style the table header */
      th {
        background-color:#ff7f50;
        color: white;
        font-weight: bold;
        text-align: left;
        padding: 15px;
      }
      /* Style the table rows */
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      tr:hover {
        background-color: #ddd;
      }
      /* Style the table cells */
      td {
        padding: 15px;
        border-bottom: 1px solid #ddd;
      }
      /* Add animation to the table */
      @keyframes fade-in {
        from {
          opacity: 0;
        }
        to {
          opacity: 1;
        }
      }
      table {
        animation: fade-in 1s;
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
      <h1>Student S-Top</h1>
    </header>
    <h1 style="text-align:center">Examination Schedule</h1>
    <table>
      <thead>
        <tr>
          <th>Subject</th>
          <th>Date</th>
          <th>Start Time</th>
          <th>End Time</th>
        </tr>
      </thead>
      <tbody>
      
      <tr>
        <td><?php echo $course_names[0] ?></td>
        <td><?php echo $exam_dates[0]; ?></td>
        <td>09:00</td>
        <td>11:00</td>
      </tr>
      <tr>
        <td><?php echo $course_names[1] ?></td>
        <td><?php echo $exam_dates[1]; ?></td>
        <td>10:00</td>
        <td>12:00</td>
      </tr>
      <tr>
        <td><?php echo $course_names[2] ?></td>
        <td><?php echo $exam_dates[2]; ?></td>
        <td>11:00</td>
        <td>13:00</td>
      </tr>
      <tr>
        <td><?php echo $course_names[3] ?></td>
        <td><?php echo $exam_dates[3]; ?></td>
        <td>11:00</td>
        <td>13:00</td>
      </tr>
    
      </tbody>
    </table>
  </body>
</html>