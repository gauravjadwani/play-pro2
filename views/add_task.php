<!DOCTYPE html>
<?php
include '../controllers/connection.php';
include_once '../controllers/init_session.php';

?>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<script src="https://use.fontawesome.com/9d774c759d.js"></script>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">play-BETA</a>
    </div   >
      
      
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="../views/dashboard.php"><span class="glyphicon glyphicon-user"></span><?php     echo $name; ?></a></li>
      
    <li><a href="../views/add_task.php"><span class="glyphicon glyphicon-log-in"></span> ADD_TASK</a></li>
    <li><a href="../views/user_projects.php"><span class="glyphicon glyphicon-log-in"></span>VIEW PROJECTS</a></li>
   <li><a href="../views/add_project.php"><span class="glyphicon glyphicon-log-in"></span> ADD PROJECT</a></li>
    <li><a href=""><span class="glyphicon glyphicon-log-in"></span>VIEW TASK AS DATE</a></li>
        
    <li><a href="../controllers/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
    
    </ul>
      
    
  </div>    
</nav>
    <div class="container">
        <div class="row">
            
            <div class="col-md-6">
                <a href="addtask_toself.php"><button type="button" class="btn btn-primary btn-block">task for self</button></a>
                
                </div>
            <div class="col-md-6">
                 <a href="addtask_toproject.php"><button type="button" class="btn btn-primary btn-block">task for project</button> </a>
                </div>
            </div>
        </div>
      
      