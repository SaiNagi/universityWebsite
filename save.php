<?php
session_start();
$_SESSION['userid']= $_POST['username']; 
 echo $_SESSION['user_id'];
?>