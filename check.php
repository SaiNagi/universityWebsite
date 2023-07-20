<?php
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


   session_start(); 
    
   
    $userid = $_POST['username'];
    
    $password = $_POST['password'];

    $_SESSION['userid'] =$userid; 


   
    $conn = mysqli_connect("localhost","root","","university3");
    if(!$conn){
     die("Connection failed"); 
    }
    // creating the query 
    $query = "SELECT * FROM faculty WHERE id = '$userid' AND password = '$password'"; 
    // exceuting the carry 
    $result = mysqli_query($conn,$query); 


    // creating the query for student login 
    $query1 = "SELECT * FROM students1 WHERE id = '$userid' AND password = '$password'";
    $result1 = mysqli_query($conn,$query1); 




    if(mysqli_num_rows($result)>0){
      echo "Faculty";
       
    }
    else if(mysqli_num_rows($result1)>0){
      echo "Student";
    }
    
    else{
      echo "Invalid Login"; 
    }



    mysqli_close($conn); 
    
}
