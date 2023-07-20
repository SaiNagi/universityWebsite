<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['course_id']) && isset($_POST['attendance']) && isset($_POST['student_ids'])) {
    $course_id = $_POST['course_id'];
    $attendance = $_POST['attendance'];
    $student_ids = $_POST['student_ids'];

    echo $course_id;
    echo "Attendance";
    foreach ($student_ids as $key => $student_id) {

        if (isset($attendance[$key])) {
            $attended = $attendance[$key];
            $sql = "SELECT * FROM students1 WHERE id = " . $student_id;
            $result = $conn->query($sql);

            $course_attend_col = "";
            $course_total = "";
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row['course1'] == $course_id) {
                    $course_attend_col = 'course1_attend';
                    $course_total = 'course1_tdays'; 
                } else if ($row['course2'] == $course_id) {
                    $course_attend_col = 'course2_attend';
                    $course_total = 'course2_tdays'; 
                } else if ($row['course3'] == $course_id) {
                    $course_attend_col = 'course3_attend';
                    $course_total = 'course3_tdays'; 
                } else if ($row['course4'] == $course_id) {
                    $course_attend_col = 'course4_attend';
                    $course_total = 'course4_tdays'; 
                }
            }

            $sql1 = "UPDATE students1 SET $course_total = $course_total+1"; 
            $result1 = $conn->query($sql1);
            if(!$result1){
                echo "Total Attendence has not been updated";
            }
            else{
                echo "Total Attendence has updated";
            }


            if ($course_attend_col != "") {
                $sql = "UPDATE students1 SET $course_attend_col = $course_attend_col + $attended WHERE id = $student_id";
                $result = $conn->query($sql);
                if (!$result) {
                   
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

$conn->close();
?>
