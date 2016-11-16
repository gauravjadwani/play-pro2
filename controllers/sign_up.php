<?php
include '../controllers/connection.php';

    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $password=$_POST['passwd'];
    $hashed_password=password_hash($password,PASSWORD_DEFAULT);
    
   
    $check=$r->hMset($email, array('name' => $name, 'mobile' =>$mobile,'email'=>$email,'password_hash'=>$hashed_password,'date_list'=>'date'.$email)); 
   
   if($check==1)
    { 
    echo "e";
    header("location: ../views/login.html");
    }
    else 
        echo "non-comit";

?>
