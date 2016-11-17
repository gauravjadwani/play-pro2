<!DOCTYPE html>
<?php
include '../controllers/connection.php';
include '../controllers/init_session.php';


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
      
      <li><a href="notifications.php"><span class="glyphicon glyphicon-user"></span><?php     echo $name; ?></a></li>
      
    <li><a href="../controllers/add_task.php"><span class="glyphicon glyphicon-log-in"></span> ADD_TASK</a></li>
   <li><a href="../controllers/add_task_project.php"><span class="glyphicon glyphicon-log-in"></span> ADD TASK PROJECT </a></li>
    <li><a href="view_as_date.php"><span class="glyphicon glyphicon-log-in"></span>VIEW TASK AS DATE</a></li>
        
    <li><a href="../controllers/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
    
    </ul>
      
    
  </div>    
</nav>
  
<div class="container">
    <div class="row">
         <form action="../controllers/add_project.php" method="POST">
        <div class="col-md-6">
            <div class='row'>
                 <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNAME OF THE PROJECT</h1>
                <div class="col-md-2"></div>
                 <div class="col-md-10"><hr>
                 </div>
                
                
                   
                
            
           <div class="col-md-2" style="font-size: 200%;color:purple">NAME</div>
           <div class="col-md-10">
               
                <div class="form-group">
    
    <input class="form-control input-lg" name="name_of_the_project" type="text" placeholder="name of the project">
                </div>
               
        </div>  
           </div>
            <div class='row'>
            <div class="form-group">
      <div class="col-md-2" style="font-size: 200%;color:purple">DESC</div>
      <div class="col-md-10">
      <textarea class="form-control" rows="3" name="desc" placeholder="Description for the project"></textarea>
    </div>
      </div>&nbsp</div>
            <div class='row'>
           <div class="form-group">
               <div class="col-md-2" style="font-size: 200%;color:purple">DATE</div>
               
                   
              
                <div class="col-md-10">
                    
           
           <input type="date" name="date" class="form-control">&nbsp&nbsp&nbsp
         
            </div>
               
            
               
           </div>
                </div>
      
      <div class='row'>
          
          
             <div class="form-group">
                 <div class='col-md-2'>
  <label for="sel1">Select Group:</label>
  </div>
                 
                 
              
                 
                 <div class='col-md-10'>
                       <select class="form-control" name="group_id">
      
      <option  selected value='default'> -- select a group -- </option>
       
                     <?php
                // echo "guarav";
                      
        $projects=$r->smembers('projects:'.$email);
       

 //echo "fdfd".var_dump($projects);   
foreach($projects as $p_id)
    {
    $projects_groupid=$r->hget('project:'.$p_id,'associated_group');
$emails=$r->zrangebyscore('group_permissions:'.$projects_groupid,'1','1');
foreach($emails as $c2)
{
if($c2==$email)
{   
                 
                 
  //echo var_dump($c2);         
            // */   
    
 ?>

       
      <option><?php echo "the group is is :".$projects_groupid;?></option>
  
      
      <?php
      
}
}
    }
       
       
      ?>
      
  
    
    </select>
        
          </div>
          
                 
                 
             
                 
                 
      </div>
            
                
            </div>
            </div>
            
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">
                
                </div>
                <div class="col-md-9">
                    <h1>GROUP DETAILS</h1>
                    <hr>
                    <div class="form-group">
                        <input class="form-control input-lg" name="name_of_group" type="text" placeholder="name of the group">
                        &nbsp
      <textarea class="form-control" rows="3" name="list_members_modify" placeholder="MODIFY-members accociated with the project seperate them with the ,"></textarea>
    </div>
                    <div class="form-group">
                        
      <textarea class="form-control" rows="3" name="list_members_readonly" placeholder="READ ONLY-members accociated with the project seperate them with the ,"></textarea>
    </div>
   
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
                 
</div>
        </div>
             </form>
    </div>
    </div>

</body>
</html>

