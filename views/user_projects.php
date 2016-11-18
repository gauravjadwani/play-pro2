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
    </div>
      
      
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="dashboard.php"><span class="glyphicon glyphicon-user"></span><?php echo $name; ?></a></li>
      
    <li><a href="add_task.php"><span class="glyphicon glyphicon-log-in"></span> ADD_TASK</a></li>
    <li><a href="../views/add_project.php"><span class="glyphicon glyphicon-log-in"></span>ADD PROJECT</a></li>
    <li><a href="view_as_date.php"><span class="glyphicon glyphicon-log-in"></span>VIEW TASK AS DATE</a></li>
        
    <li><a href="../controllers/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
    
    </ul>
      
    
  </div>    
</nav>
  
<div class="container">
    <div class="row">
        
  
  <h2>VIEW YOUR PROJECTS </h2>
  
  <div class="table-responsive">
  <table class="table">
      
    <thead>
      <tr>
        <th>NAME</th>
        <th>CREATED ON</th>
        <th>DESCRIPTION</th>
        <th>DEADLINE</th>
        <th>STATUS</th>
        <th>ASSOCIATED GROUP</th>
        
        <th>ASSOCIATED GROUP STATUS</th>
        <th>ASSOCIATED TASK</th>
      </tr>
    </thead>
    <tbody>
        <?PHP
      $project_list=$r->sMembers('projects:'.$email);
      
      foreach($project_list as $pro)
      {
          
      $project_details=$r->hvals('project:'.$pro);
      $group_id=$project_details[5];
      $group_details=$r->hvals('group:'.$project_details[5]);
      
      ?>
      <tr>
        <td><?php echo $project_details[0];?></td>
        <td><?php echo $project_details[1];?></td>
        <td><?php echo $project_details[2];?></td>
        <td><?php echo $project_details[3];?></td>
        <td><?php echo $project_details[4];?></td>
        <td><?php echo $group_details[0];?></td>
        <td><?php echo $group_details[2];?></td>
        <td><?php
        
        $tasks=$r->zrange('tasks_associated_by_project:'.$pro,0,-1);
        
        foreach ($tasks as $t)
        {
            
        $task_details=$r->hvals('tasks:'.$t);
        
        //echo var_dump($task_details);
        ?>
        
            <a href="http://localhost/play-pro2/views/view_task_details.php?task_id=<?php echo $t.'">'; echo $task_details[0]." priority: ".$task_details[1]."<br>";?></a><br>
       
        
        <?php }?>
          </td></tr>
      
      <?php
      }?>
      
      
    </tbody>
  </table>
  </div>
</div>


    
    
    </div>
        </div>

</body>
</html>

