<!DOCTYPE html>
    <?php
    include '../controllers/connection.php';
    include_once '../controllers/init_session.php';


    ?>





<html>
    
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
      
      <li><a href="../views/dashboard.php"><span class="glyphicon glyphicon-user"></span><?php echo $name; ?></a></li>
      
    <li><a href="addtask.php"><span class="glyphicon glyphicon-log-in"></span> ADD_TASK</a></li>
    <li><a href="../views/view_as_date.php"><span class="glyphicon glyphicon-log-in"></span>VIEW TASK BY DATE</a></li>
    
        
    <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
    
    </ul>
      
    
  </div>
</nav>

        
        
        
        
        
        
        
        <form action="../controllers/addtask_toproject.php" method="POST">
        
<div class="container">
    <div class="row">
        <div class="col-md-6">
             <div class="well">
            <div class="row">
       
       
                
       
           <div class="col-md-2"> <b>DATE</b></div><div class="col-md-10"><input type="date" name="date"></div>
         
           
               </div>
            
        
                
                
                
                
                </div>
            <div class="row">
                <hr>
            <div class='col-md-2'>
  <label for="sel1">Select Project:</label>
 
            </div>
            <div class='col-md-10'>
                
                <select class="form-control" name="project_id">
      
      <option  selected value='default'> -- select a project -- </option>
      
      
      <?php
                // echo "guarav";
                      
        $projects=$r->smembers('projects:'.$email);
       

 //echo "fdfd".var_dump($projects);   
foreach($projects as $p_id)
    {
    $projects_groupid=$r->hget('project:'.$p_id,'associated_group');
$emails=$r->zrangebyscore('group_permissions:'.$projects_groupid,'1','2');
foreach($emails as $c2)
{
if($c2==$email)
{   
                 
                 
  //echo var_dump($c2);         
            // */   
    
 ?>
 
       
      <option value="<?php echo $p_id;?>"><?php echo "the project is :".$p_id;?></option>
  
      
      <?php
      
}
}
    }
       
       
      ?>
      
      
      
      
      </select>
            </div>
                
                
                
                
                </div>
            </div>
        
        <div class="col-md-6">
            <div class="row">
            
            <div class = "form-group">
      <label for = "email" class = "col-sm-2 control-label" style="font-size: 20px">Task</label>
		
      <div class = "col-md-7">
       <input type = "text" class = "form-control" name = "task" placeholder ="Enter Task">
      </div>
      <div class="col-md-3">
          </div>
   </div>
                </div>&nbsp
            <div class="row">
                        <div class = "form-group">
      <label for = "email" class = "col-md-2 control-label" style="font-size: 20px">Priority</label>
		
      <div class = "col-md-7">
       <input type = "number" class = "form-control" name = "priority" placeholder ="Enter Priority" min="0">
      </div>
      <div class="col-sm-3">
          </div>
   
              </div>
            </div>&nbsp
            <hr>
                 <div class="row">
                        <div class = "form-group">
      <label for = "permissionsM" class = "col-md-2 control-label" style="font-size: 20px"> MOdify</label>
		
      <div class = "col-md-7">
       <input type = "text" class = "form-control" name = "permissionsM" placeholder ="Enter email by sepration of ,">
      </div>
      <div class="col-sm-3">
          </div>
   
              </div>
            </div>
            &nbsp
             <div class="row">
                        <div class = "form-group">
      <label for = "permissionsRs" class = "col-md-2 control-label" style="font-size: 20px">Read-only</label>
		
      <div class = "col-md-7">
       <input type = "text" class = "form-control" name = "permissionsR" placeholder ="Enter email by sepration of  ,">
      </div>
      <div class="col-sm-3">
          </div>
   
              </div>
            </div>
                <div class="row">
                    <div class="col-md-2">
                        
                    </div>
               
                <div class="row">
                    <div class="col-md-2">
                        
                    </div>
                    
                    <div class="col-md-7">
                        <br>
                    <button type = "submit" class = "btn btn-default">Submit</button>
                    </div>
            
            
            
            
        </div>
</div>
        </div>
    </div>
    </div>
            
            </form>
        </body>
        </html>
    