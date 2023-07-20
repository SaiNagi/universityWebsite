<!DOCTYPE html>
<html>
  <head>
    <title>Student Marks</title>
    <style>
    </style>
  </head>
  <body>
    <?php
      // connect to the database 
      $conn = mysqli_connect("localhost","root","","university3"); 
      
      if(!$conn){
        die("Connection failed : ".mysqli_connect_error()); 
      }

      // Retrive the list the courses
      $sql = "SELECT * FROM courses1"; 
      $result = mysqli_query($conn,$sql); 
      
      //Drop down 
      echo "<form method='post'>"; 
      echo "Select a course:<br>"; 
      echo "<select name='course_id'>"; 
      while($row = mysqli_fetch_assoc($result)){
          echo "<option value =' " .$row['course_id']. "'>" .$row['course_name']. "<option>"; 
      }

      echo "</select><br>"; 
      echo "<input type='submit' value='submit'>";
      echo "</form>";


      // we want to display the students to enter the marks 
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        $course_id = $_POST['course_id']; 

        echo "<h1> Course ID : " .$course_id. "</h1>"; 
        $sql = "SELECT * FROM students1 WHERE '$course_id' IN (course1,course2,course3,course4)";

        $result = mysqli_query($conn,$sql); 
        if(mysqli_num_rows($result)>0){
          echo "<form method='post' action='add_marks.php'>"; 
          echo "<input type='hidden' name='course_id' value=" .$course_id. ">"; 
          echo "<table>"; 
          echo "<tr><th>Name</th><th>Email</th><th>Reg.No</th><th>Marks</th></tr>"; 
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr>"; 
            echo "<td>" .$row['name']. "</td>"; 
            echo "<td>" .$row['email']. "</td>"; 
            echo "<td>" .$row['id']. "</td>"; 
            echo "<td>"; 
            echo "<input type='hidden' name='student_ids[]' value=' " .$row['id']. " '>"; 

            if($row['course1']==$course_id){
              echo "<input type='number' name='marks[]' value=' " .$row['course1_marks']. "'>"; 
             }
             else if($row['course2']==$course_id){
              echo "<input type='number' name='marks[]' value=' " .$row['course2_marks']. "'>"; 
             }
             else if($row['course3']==$course_id){
              echo "<input type='number' name='marks[]' value=' " .$row['course3_marks']. "'>"; 
             }
             else if($row['course4']==$course_id){
              echo "<input type='number' name='marks[]' value='".$row['course4_marks']. "'>"; 
             }
             else{
              echo "<input type='number' name='marks[]' value=''>";
             }
             echo "</td>"; 
             echo "</tr>"; 
            }
            echo "</table>"; 

            echo "<input type='submit' value='Save'>";
            echo "</form>";
        } else {
            echo "No students found.";
        }
    }
 
