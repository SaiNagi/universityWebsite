<?php
// Connect to the database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the list of courses
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

// Display the list of courses in a dropdown menu
echo "<form method='post'>";
echo "Select a course:<br>";
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
    $sql = "SELECT * FROM students1 WHERE course1 = '$course_id' OR course2 = '$course_id' OR course3 = '$course_id' OR course4 = '$course_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Display the list of students
        echo "<form method='post' action='add_marks.php'>";
        echo "<input type='hidden' name='course_id' value='$course_id'>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Marks</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>";
            echo "<input type='hidden' name='student_ids[]' value='" . $row['id'] . "'>";
            
            // Check which course matches and set the correct input name for marks
            $course_marks = ""; 
            if ($row['course1'] == $course_id) {
                $course_marks = 'course1_marks';
            } else if ($row['course2'] == $course_id) {
                $course_marks = 'course2_marks';
            } else if ($row['course3'] == $course_id) {
                $course_marks = 'course3_marks';
            } else if ($row['course4'] == $course_id) {
                $course_marks = 'course4_marks';
            }

            echo "<input type='number' name='$course_marks' value='" . $row[$course_marks] . "'>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br><input type='submit' value='Save'>";
        echo "</form>";
    } else {
        echo "No students found.";
    }
}

// Close the database connection
$conn->close();
?>
