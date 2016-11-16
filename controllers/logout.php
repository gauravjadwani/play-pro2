<?php   
session_start(); 


session_unset(); 

session_destroy();
//$_SESSION['email']='guarav'; 
header("location: ../views/login.html"); 
// $email=$_SESSION['email'];
// session_destroy();
 
exit();
?>