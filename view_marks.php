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

// Retrieve the course marks for the logged-in student
$student_id = $_SESSION['userid'];
$sql = "SELECT * FROM students1 WHERE id = $student_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Retrieve the course names and marks for the student

    
    $course1_name = $row['course1'];

    $sql1 = "SELECT * FROM courses1 WHERE course_id = $course1_name";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc(); 
    $course1_marks = $row['course1_marks'];
    $course1_name1 = $row1['course_name'];
    $course1_grade = ($course1_marks > 90) ? 'S' : (($course1_marks > 80) ? 'A' : (($course1_marks > 70) ? 'B' : (($course1_marks > 60) ? 'C' : (($course1_marks > 50) ? 'D' : (($course1_marks > 40) ? 'E' : 'F')))));

    $course2_name = $row['course2'];

    $sql1 = "SELECT * FROM courses1 WHERE course_id = $course2_name";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc(); 
    $course2_marks = $row['course2_marks'];
    $course2_name1 = $row1['course_name'];
    $course2_grade = ($course2_marks > 90) ? 'S' : (($course2_marks > 80) ? 'A' : (($course2_marks > 70) ? 'B' : (($course2_marks > 60) ? 'C' : (($course2_marks > 50) ? 'D' : (($course2_marks > 40) ? 'E' : 'F')))));

    $course3_name = $row['course3'];
    $sql1 = "SELECT * FROM courses1 WHERE course_id = $course3_name";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc(); 
    $course3_marks = $row['course3_marks'];
    $course3_name1 = $row1['course_name'];
    $course3_grade = ($course3_marks > 90) ? 'S' : (($course3_marks > 80) ? 'A' : (($course3_marks > 70) ? 'B' : (($course3_marks > 60) ? 'C' : (($course3_marks > 50) ? 'D' : (($course3_marks > 40) ? 'E' : 'F')))));

    $course4_name = $row['course4'];
    $sql1 = "SELECT * FROM courses1 WHERE course_id = $course4_name";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc(); 
    $course4_marks = $row['course4_marks'];
    $course4_name1 = $row1['course_name'];
    $course4_grade = ($course4_marks > 90) ? 'S' : (($course4_marks > 80) ? 'A' : (($course4_marks > 70) ? 'B' : (($course4_marks > 60) ? 'C' : (($course4_marks > 50) ? 'D' : (($course4_marks > 40) ? 'E' : 'F')))));
    
    
?>
<head>
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
      
      header h1 {
        margin-left: 20%;
      }
      div{
        text-align:center;
      }
      div button{
        padding:10px 20px;
        background-color: #ff7f50; 
        margin-top:20px;
        font-size:18px; 
        font-weight:500; 
        border-radius:8px;
        border:none;  
      }
      button:hover{
        background-color: #e62e00; 
      }
      p{
        font-weight:500; 
        font-size:24px;
        font-family:Roboto;
      }
    </style>
</head>
<header>
      
      <img src="https://i.ibb.co/Yf3SLJ9/university-logo.jpg" class="logo1" />
      <h1>Student S-Top</h1>
    </header>

<h1>Course Marks</h1>

<table>
    <thead style="background-color: orange;">
        <tr>
            <th>Course Id</th>
            <th>Course Name</th>
            <th>Marks</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $course1_name; ?></td>
            <td><?php echo $course1_name1; ?></td>
            <td><?php echo $course1_marks; ?></td>
            <td class="grade"><?php echo $course1_grade; ?></td>
        </tr>
        <tr>
            <td><?php echo $course2_name; ?></td>
            <td><?php echo $course2_name1; ?></td>
            <td><?php echo $course2_marks; ?></td>
            <td class="grade"><?php echo $course2_grade; ?></td>
        </tr>
        <tr>
            <td><?php echo $course3_name; ?></td>
            <td><?php echo $course3_name1; ?></td>
            <td><?php echo $course3_marks; ?></td>
            <td class="grade"><?php echo $course3_grade; ?></td>
        </tr>
        <tr>
            <td><?php echo $course4_name; ?></td>
            <td><?php echo $course4_name1; ?></td>
            <td><?php echo $course4_marks; ?></td>
            <td class="grade"><?php echo $course4_grade; ?></td>
        </tr>

    </tbody>
</table>
<div id='gpa'>


<button onclick="showGpa()" >Show GPA </button>
</div>

    <script>
        function showGpa(){
            let sum = 0; 
            var grades = document.getElementsByClassName('grade');
            
            for(var i =0; i<grades.length; i++){
                
                if(grades[i].textContent == 'S'){
                    sum += 10; 
                }
                else if(grades[i].textContent == 'A'){
                    sum += 9 ; 
                }
                else if(grades[i].textContent == 'B'){
                    sum += 8 ; 
                }
                else if(grades[i].textContent == 'C'){
                    sum += 7; 
                }
                else if(grades[i].textContent == 'D'){
                    sum += 6 ; 
                }
                else if(grades[i].textContent == 'E'){
                    sum += 5 ; 
                }
                else{
                    sum += 0; 
                }
            }
            alert(sum);

            var cgpgrade = (sum/40)*10; 
            var div = document.getElementById('gpa'); 
            let p = document.createElement("p"); 
            p.textContent = "Your gpa is: "+cgpgrade; 
            div.appendChild(p); 
            

        }
        </script>



<?php
} else {
    echo "No course marks found for student ID $student_id";
}

// Close the database connection
$conn->close();
?>
