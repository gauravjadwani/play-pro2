<?php
include '../controllers/connection.php';

//$name=$_POST['name'];
    //$mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $check_email=$r->exists($email);
    $password=$_POST['passwd'];
    if($check_email==1)
    {
        
        
        
    //$hashed_password=sha1($password);
     $check_hash=$r->hget($email,'password_hash');
    //echo var_dump($check_hash);
     if (password_verify($password,$check_hash)) 
                {
         session_start();
            $_SESSION["email"]=$email;
            $name=$r->hget($email,'name');
            $_SESSION["name"]=$name;
                    
            header("Location: ../views/dashboard.php");
} 
else {
    echo "wrong password";
   $alert="wrong password"; 
   include 'error.php';
        
}
     
     
       }
    ?>




    