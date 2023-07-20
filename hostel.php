<?php
session_start(); 
$student_id = $_SESSION['userid']; 
 

$conn = mysqli_connect("localhost","root","","university3"); 

$sql = "UPDATE students1 SET hostelroom = 'registered' WHERE id= '$student_id'"; 
mysqli_query($conn,$sql); 



?>
<html>
  <head>
    <title>Student Hostel</title>
    <style>
      /* Add some styles for the page */
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }
      .header {
        background-color: #fb8960;
        color: #fff;
        padding: 10px;
        text-align: center;
      }
      .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 20px;
      }
      .room {
        background-color: #f2f2f2;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 5px #ccc;
        margin: 10px;
        padding: 10px;
        width: 300px;
      }
      .room:hover {
        box-shadow: 0 5px 10px #ccc;
        transform: translateY(-5px);
        transition: all 0.3s ease-in-out;
      }
      .room img {
        border-radius: 5px;
        width: 100%;
      }
      .room h3 {
        margin: 0 0 10px;
        text-align: center;
      }
      .room p {
        margin: 0;
      }
      .btn {
        background-color: rgb(237, 70, 32);
        border: none;
        border-radius: 3px;
        color: #fff;
        cursor: pointer;
        font-size: 14px;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
      }
      .btn:hover {
        background-color: rgb(237, 70, 32);
      }
      .btn.disabled {
        background-color: #ccc;
        cursor: not-allowed;
      }
    </style>
  </head>
  <body>
    <!-- Add a header with the page title -->
    <div class="header">
      <h1>Student Hostel</h1>
    </div>

    <!-- Add a container for the hostel rooms -->
    <div class="container">
      <!-- Add a room for each hostel room -->
      <div class="room">
        <img src="https://images.unsplash.com/photo-1555854877-bab0e564b8d5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG9zdGVsfGVufDB8fDB8fA%3D%3D&w=1000&q=80" alt="Room 1">
        <h3>Room 1</h3>
        <p>Located on the first floor, this room has a single bed, a desk, and a closet.</p>
        <button class="btn">Book Now</button>
      </div>

      <div class="room">
        <img src="https://thumbs.dreamstime.com/b/backpackers-hostel-modern-bunk-beds-dorm-room-twelve-people-inside-79935795.jpg" alt="Room 2">
        <h3>Room 2</h3>
        <p>Located on the second floor, this room has a double bed, a desk, and a closet.</p>
        <button class="btn disabled">Booked</button>
      </div>

      <div class="room">
        <img src="https://pix10.agoda.net/hotelImages/5410581/0/efe83e8f54e41ebfb4366f8649ba5813.jpg?ca=8&ce=1&s=1024x768" alt="Room 3">
        <h3>Room 3</h3>
        <p>Located on the third floor, this room has a single bed, a desk, and a closet.</p>
        <button class="btn">Book Now</button>
     
      </div>

      

      </body>
      </html>
   