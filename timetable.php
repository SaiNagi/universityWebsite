<?php 
session_start(); 
$userid = $_SESSION['userid']; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Time Table</title>
    
    <style>
      .timetable {
  width: 100%;
  margin: 20px auto;
  font-size: 16px;
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  text-align: center;
}

.timetable th,
.timetable td {
  padding: 10px;
  border: 1px solid #ddd;
}

.timetable th {
  text-align: center;
  font-weight: bold;
}

.timetable td.time {
  font-weight: bold;
}

.timetable td.break {
  font-style: italic;
  text-align: center;
  background-color: #f1f1f1;
}

.timetable td.A1,
.timetable td.A2,
.timetable td.B1,
.timetable td.B2,
.timetable td.C1,
.timetable td.C2,
.timetable td.D1,
.timetable td.D2,
.timetable td.E1,
.timetable td.E2,
.timetable td.F1,
.timetable td.F2 {
  text-align: center;
  background-color: #e2e2e2;
}

.timetable td.A1,
.timetable td.A2 {
  background-color: #f9c7c7;
}

.timetable td.B1,
.timetable td.B2 {
  background-color: #fce8b2;
}

.timetable td.C1,
.timetable td.C2 {
  background-color: #e5f7b1;
}

.timetable td.D1,
.timetable td.D2 {
  background-color: #bbf7d0;
}

.timetable td.E1,
.timetable td.E2 {
  background-color: #b6e2f9;
}

.timetable td.F1,
.timetable td.F2 {
  background-color: #bcbcf9;
}

table {
  border-collapse: collapse;
  width: 100vw;
  font-size: 24px;
  margin-bottom: 100px;
}

th,
td {
  border: 1px solid black;
  padding: 8px;
}

h1,
h3 {
  text-align: center;
}
.image-button {
  display: inline-block;
  margin: 0 auto;
  padding: 10px 20px;
  background-color: #f2f2f2;
  border: none;
  border-radius: 5px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
  color: #333;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  transition: background-color 0.3s ease;
}
.image-button button {
  border: none;
}

.image-button:hover {
  background-color: #ddd;
}
.color{
    background-color:green; 
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

      </style>
    
  </head>
  <header>
      
      <img src="https://i.ibb.co/Yf3SLJ9/university-logo.jpg" class="logo1" />
      <h1>Student S-Top</h1>
    </header>
  <body>
    <h1>Course Time table</h1>
    <div class="timetable">
      <table>
        <thead>
          <tr>
            <th></th>
            <th>Monday</th>
            <th>Tuesay</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
          </tr>
        </thead>

        <tr>
          <td class="time">10:00 AM</td>
          <td class="A1">A1</td>
          <td class="B1">B1</td>
          <td class="C1">C1</td>
          <td class="D1">D1</td>
          <td class="E1">E1</td>
        </tr>

        <tr>
          <td class="time">11:00 AM</td>
          <td class="B1">B1</td>
          <td class="C1">C1</td>
          <td class="D1">D1</td>
          <td class="E1">E1</td>
          <td class="A1">A1</td>
        </tr>

        <tr>
          <td class="time">12:00 AM</td>
          <td class="C1">C1</td>
          <td class="D1">D1</td>
          <td class="E1">E1</td>
          <td class="A1">A1</td>
          <td class="B1">B1</td>
        </tr>

        <tr>
          <td class="time">12:00PM</td>
          <td colspan="6" class="break">Lunch Break</td>
        </tr>

        <tr>
          <td class="time">1:00 AM</td>
          <td class="C1">C1</td>
          <td class="D1">D1</td>
          <td class="E1">E1</td>
          <td class="A1">A1</td>
          <td class="B1">B1</td>
        </tr>

        <tr>
          <td class="time">2:00 AM</td>
          <td class="D1">D1</td>
          <td class="E1">E1</td>
          <td class="A1">A1</td>
          <td class="B1">B1</td>
          <td class="C1">C1</td>
        </tr>

        <tr>
          <td class="time">3:00 AM</td>
          <td class="E1">E1</td>
          <td class="A1">A1</td>
          <td class="B1">B1</td>
          <td class="C1">C1</td>
          <td class="D1">D1</td>
        </tr>
      </table>
      <div >
      <button onclick="downloadTimetable()" class="image-button">Download Timetable as Image </button>
  </div>
    </div>
    
  </body>



  <?php
  
   $conn = mysqli_connect("localhost","root","","university3"); 
   $query = "SELECT courses1.course_id, courses1.time_slot
   FROM courses1
   JOIN students1 ON (courses1.course_id = students1.course1 OR courses1.course_id= students1.course2 OR courses1.course_id = students1.course3 OR courses1.course_id = students1.course4)
   WHERE students1.id = '$userid';
   "; 
   $result = mysqli_query($conn,$query); 
   $courses = mysqli_fetch_all($result,MYSQLI_ASSOC); 

   echo "<table>";
   echo "<tr>"; 
   echo "<th>Couse Id</th> <th>Time slot</th>"; 
   foreach($courses as $course) {
       echo "<tr class= 'row'><td>" . $course['course_id'] . "</td><td>" . $course['time_slot'] . "</td></tr>";
   }
   echo "</table>";
   
 ?>
 
 <script>
  let Aslot = document.getElementsByClassName('A1'); 
  let Bslot = document.getElementsByClassName('B1'); 
  let Cslot = document.getElementsByClassName('C1'); 
  let Dslot = document.getElementsByClassName('D1'); 
  let Eslot = document.getElementsByClassName('E1'); 


  let row = document.getElementsByClassName('row');
  for(var i=0; i<row.length; i++){ 
  var slot = row[i].querySelector("td:nth-child(2)").textContent;
  if(Aslot[0].textContent == slot){
    for(var j=0;j<Aslot.length; j++){
        Aslot[j].style.backgroundColor="orange";

    }
  }
  if(Bslot[0].textContent == slot){
    for(var j=0;j<Bslot.length; j++){
        Bslot[j].style.backgroundColor="orange";

    }
}
    if(Cslot[0].textContent == slot){
    for(var j=0;j<Cslot.length; j++){
        Cslot[j].style.backgroundColor="orange";

    }
}
    if(Dslot[0].textContent == slot){
    for(var j=0;j<Dslot.length; j++){
        Dslot[j].style.backgroundColor="orange";

    }
}
    if(Eslot[0].textContent == slot){
    for(var j=0;j<Eslot.length; j++){
        Eslot[j].style.backgroundColor="orage";

    }
}
} 



  
</script>
  
