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

        
        
        
        
        
        
        
        <form action="" method="POST">
        
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
            <?php
            require_once '../views/date.html';
            
            ?>
                
                
                
                
                </div>
            <div class="row">
                <hr>
                <?php require_once 'add_project_task.php';?>
                
                
                
                
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
            
            </form>
        </body>
        </html>
        <?php
        
        



        
        
        if(!empty($_POST['date'])&&!empty($_POST['task'])&&!empty($_POST['priority']))

            {
include '../views/connection.php';
//session_start();
    $email=$_SESSION["email"];
    
    $name=$r->hget($email,'name');
    
    $task=$_POST['task'];
    $date=$_POST['date'];
    
    if(isset($_POST['project_id']))
    {
    $project_id=$_POST['project_id'];    
        
    }
    else
    {
        $project_id='SELF';
    }
   
    $priority=$_POST['priority'];
   
    
    $r->setnx('task_id',1);
    $task_id=$r->get('task_id');
    $current_date= date("Y/m/d");
    //$time=time();
    
    
    $r->hMset('tasks:'.$task_id, array('name' => $task,'priority'=>$priority,'assinged_for'=>$date,'introduced_on'=>$current_date,'status'=>'pending','project_associated'=>$project_id));
     
     
   //$r->zadd("permissions".$task_id,$priority,$task);
     $r->zadd("permissions:".$task_id,'1',$email);
        $r->sadd("notifications:".$email,$task_id);    
    if(!empty($_POST['permissionsM']))
{
// 'connection.php';
$val =$_POST['permissionsM'];
$iparr= split(",",$val); 
   
   //   echo $iparr[1];




    for($i=0;$i<sizeof($iparr);$i++)
//echo $iparr[$i]."<br>";

    {
        $r->zadd("permissions:".$task_id,'2',$iparr[$i]);
        $r->sadd("notifications:".$iparr[$i],$task_id);
    
    }
}
   if(!empty($_POST['permissionsR']))
{
// 'connection.php';
$vall =$_POST['permissionsR'];
$ipar= split(",",$vall); 
   
   //   echo $iparr[1];




    for($i=0;$i<sizeof($ipar);$i++)
//echo $iparr[$i]."<br>";

    {
        $r->zadd("permissions:".$task_id,'3',$ipar[$i]);
        $r->sadd("notifications:".$ipar[$i],$task_id);
    
    }
}




//$r->rpush("dates".$email,$date." ".$task_id);
    $r->incr('task_id');
    
//$check=$r->rpush("list_of_dates".$email,$date);    
///if($check==1)
        //echo "inserted";



}


        
        
        
        
        
        
        ?>