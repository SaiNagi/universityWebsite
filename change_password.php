<?php

session_start();

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university3";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the user's current password from the database


// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $user_id = $_POST['user_id'];
$sql = "SELECT password FROM faculty WHERE id = '$user_id'";
$sql1 = "SELECT password FROM students1 WHERE id='$user_id' ";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc(); 
$row = $result->fetch_assoc();
$current_password = "";
$type = ""; 
if($row !== null){
$current_password = $row['password'];
$type = "Faculty";
}

if($current_password === ""){
  $current_password = $row1['password'];
  $type = "Student";
}
echo $current_password;
    // Retrieve the form data
    $current_password_input = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Verify the user's current password
    if ($current_password_input != $current_password) {
        $error_message = "Your current password is incorrect.";
        echo $current_password;
    } else {
        // Verify that the new password meets the requirements
        $password_regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
        if (!preg_match($password_regex, $new_password)) {
            $error_message = "Your new password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.";
        } else if ($new_password != $confirm_password) {
            $error_message = "Your new password and confirmation password do not match.";
        } else {
            // Update the user's password in the database
            if($type === "Faculty"){
            $sql = "UPDATE faculty SET password = '$new_password' WHERE id = '$user_id'";
            $result = $conn->query($sql);
            
            if (!$result) {
                $error_message = "An error occurred while updating your password.";
            } else {
                // Redirect the user to a success page
                header("Location: password_change_success.php");
                exit;
            }
          }
          else if($type==="Student"){
            $sql = "UPDATE students1 SET password = '$new_password' WHERE id = '$user_id'";
            $result = $conn->query($sql);
            
            if (!$result) {
                $error_message = "An error occurred while updating your password.";
            } else {
                // Redirect the user to a success page
                header("Location: password_change_success.php");
                exit;
            }
          }
          
        
    }
  }
}
    


// Close the database connection
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <style>
        body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  padding: 20px;
}

h1 {
  font-size: 32px;
  text-align: center;
}

form {
  text-align:center;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 2px 2px skyblue;
  padding: 20px;
  max-width: 300px;
  margin: 0 auto;
}

label {
  display: block;
  font-size: 14px;
  margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
  
  padding: 10px;
  font-size: 18px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color:#ff7f50;
  color: #fff;
  font-size: 18px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color:#dc653a;
  box-shadow:0 0 0 skyblue; 
}

p.error {
  color: red;
  font-size: 18px;
  margin-top: 20px;
}.logo1 {
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
<body>
<header>
      
      <img src="https://i.ibb.co/Yf3SLJ9/university-logo.jpg" class="logo1" />
      <h1>Student S-Top</h1>
    </header>
    <h1>Change Password</h1>
    <?php if (isset($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="post">
        <label for="user_id">User Id:</label>
        <input type="text" name="user_id" id="user_id" required><br><br>
        <label for="user_id">Current Password:</label>
        <input type="password" name="current_password" id="current_password" required><br><br>
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" id="new_password" required><br><br>
        <label for="confirm_password">Confirm New Password:</label>
        <input type="password" name="confirm_password" id="confirm_password" required><br><br>
        <input type="submit" value="Change Password">
    </form>
</body>
</html>
