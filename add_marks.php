<?php
// Connect to the database

session_start(); 
echo $_SESSION['userid'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university3";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data
if (isset($_POST['course_id']) && isset($_POST['marks']) && isset($_POST['student_ids'])) {
    $course_id = $_POST['course_id'];
    $course_marks = $_POST['marks'];
    $student_ids = $_POST['student_ids'];

    echo $course_id;
    echo "Course marks";

    // Loop through the student IDs and update their marks
    foreach ($student_ids as $key => $student_id) {
        // Check if the marks array has a value for this student ID
        if (isset($course_marks[$key])) {
            $mark = $course_marks[$key];
            $sql = "SELECT * FROM students1 WHERE id = " . $student_id;
            $result = $conn->query($sql);

            $course_marks_col = "";
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row['course1'] == $course_id) {
                    $course_marks_col = 'course1_marks';
                } else if ($row['course2'] == $course_id) {
                    $course_marks_col = 'course2_marks';
                } else if ($row['course3'] == $course_id) {
                    $course_marks_col = 'course3_marks';
                } else if ($row['course4'] == $course_id) {
                    $course_marks_col = 'course4_marks';
                }
            }

            if ($course_marks_col != "") {
                $sql = "UPDATE students1 SET $course_marks_col = '$mark' WHERE id = $student_id";
                $result = $conn->query($sql);
                if (!$result) {
                    // If there was an error, redirect back to the previous page with an error message
                    echo 'Data has not been inserted here';
                    exit;
                } else {
                    echo "Data has been inserted";
                }
            } else {
                echo "No course found for student ID $student_id and course ID $course_id";
            }
        }
    }
}

// Close the database connection
$conn->close();
?>
