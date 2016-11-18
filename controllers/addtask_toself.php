<?php



        include '../controllers/connection.php';
        include_once '../controllers/init_session.php';



        
        
        if(!empty($_POST['date'])&&!empty($_POST['task'])&&!empty($_POST['priority']))

            {

//session_start();
    //$email=$_SESSION["email"];
    
    //$name=$r->hget($email,'name');
    
    $task=$_POST['task'];
    $date=$_POST['date'];
    //$project_id="";
    
    /*
    if(isset($_POST['project_id']))
    {
    $project_id=$_POST['project_id'];    
        
    }
    else
    {
        $project_id='SELF';
    }
     
     */
   
    $priority=$_POST['priority'];
   
    
    $r->setnx('task_id',1);
    //$r->setnx('self_id',1);
    $task_id=$r->get('task_id');
    //$self_id=$r->get('self_id');
    $current_date=time();
    //$time=time();
    
    
    $r->hMset('tasks:'.$task_id, array('name' => $task,'priority'=>$priority,'assinged_for'=>$date,'introduced_on'=>$current_date,'status'=>'pending','associated_project'=>"self".$email));
     
     
   //$r->zadd("permissions".$task_id,,$task);
     //$r->zadd("permissions:".$task_id,'1',$email);
        //$r->sadd("notifications:".$email,$task_id);
     //$r->sadd("tasks:".$email,$task_id);
     
     $r->zadd("tasks_associated_by_self:".$email,$priority,$task_id);
     
      //$r->zadd("permissions:".$task_id,'1',$email);
    if(false)
{
// 'connection.php';
$val =$_POST['permissionsM'];
$iparr=split(",",$val); 
   
   //   echo $iparr[1];




    for($i=0;$i<sizeof($iparr);$i++)
//echo $iparr[$i]."<br>";

    {
        $r->zadd("permissions:".$task_id,'2',$iparr[$i]);
        //$r->sadd("notifications:".$iparr[$i],$task_id);
         $r->sadd("tasks:".$iparr[$i],$task_id);
    
    }
}
   if(FALSE)
{
// 'connection.php';
$vall =$_POST['permissionsR'];
$ipar= split(",",$vall); 
   
   //   echo $iparr[1];




    for($i=0;$i<sizeof($ipar);$i++)
//echo $iparr[$i]."<br>";

    {
        $r->zadd("permissions:".$task_id,'3',$ipar[$i]);
        //$r->sadd("notifications:".$ipar[$i],$task_id);
    $r->sadd("tasks:".$ipar[$i],$task_id);
    }
}




//$r->rpush("dates".$email,$date." ".$task_id);
    $r->incr('task_id');
    $r->incr('self_id');
    
//$check=$r->rpush("list_of_dates".$email,$date);    
///if($check==1)
        //echo "inserted";

header('Location: ../views/add_task.php');

}


        
        
        
        
        
        
        ?>




