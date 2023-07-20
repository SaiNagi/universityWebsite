




<!DOCTYPE html>
<html>
<head>
	<title>Delete Course</title>
	<style>
		body {
			font-family: Arial, sans-serif;

		margin: 0;
	}
	h1 {
		text-align: center;
		margin: 50px 0;
		color: #555;
		font-size: 36px;
		font-weight: bold;
		text-transform: uppercase;
		letter-spacing: 2px;
	}
	form {
		width: 50%;
		margin: 50px auto;
		background-color: #fff;
		padding: 40px;
		border-radius: 6px;
		box-shadow: 0px 0px 20px #ccc;
	}
form:hover{
  box-shadow: 0px 0px 20px  green ;
}
	label {
		display: block;
		font-weight: bold;
		margin-bottom: 10px;
		color: #666;
		font-size: 18px;
		text-transform: uppercase;
		letter-spacing: 1px;
	}
	input[type="text"], select {
		width: 100%;
		padding: 10px;
		border: none;
		border-radius: 5px;
		margin-bottom: 20px;
		font-size: 16px;
		box-sizing: border-box;
		border: 1px solid #ccc;
		background-color: #f9f9f9;
	}
	select {
		
		
		background-size: 10px 6px;
		
		padding-right: 40px;
	}
	input[type="submit"] {
		background-color: #ff7f50;
		color: #fff;
		padding: 10px 20px;
		border: none;
		border-radius: 5px;
		cursor: pointer;
		font-size: 16px;
		float: right;
		transition: all 0.2s ease-in-out;
	}
	input[type="submit"]:hover {
		background-color: #e62e00 ;
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
      <h1 style="text-align:center">Faculty S-Top</h1>
    </header>
	<h1>Delete Course</h1>
	<form method='post'>
		<label for="course-id">Course ID</label>
		<input type="text" id="course-id" name="course-id" required>

	<label for="userid">User ID</label>
	<input type="text" id="userid" name="userid" required>

	<input type="submit" value="Delete Course">
</form>

<?php
// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// retrieve the form data
	$course_id = $_POST['course-id'];
	$userid = $_POST['userid'];

	// connect to the database
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'university3';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// check if the connection was successful
	if (!$conn) {
		die('Could not connect: ' . mysqli_connect_error());
	}

	// delete the course from the database
	$sql = "DELETE FROM courses1 WHERE course_id='$course_id' AND course_instructor_id='$userid'";
	if (mysqli_query($conn, $sql)) {
		echo "Course deleted successfully";
  }
  else{
    echo "Either course is not exist or you are not the instructor for this course";
  }
   
}