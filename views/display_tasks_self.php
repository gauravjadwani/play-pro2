
        
        
     


<?php




include_once '../controllers/connection.php';
include_once '../controllers/init_session.php';

$task_list=$r->zrange("tasks_associated_by_self:".$email,0,-1);
//echo var_dump($task_list);
foreach($task_list as $task)
{
   $check_task=$r->hget('tasks:'.$task,'status');
   
   if($check_task=='pending')
   {
       $task_name=$r->hget('tasks:'.$task,'name');
       //echo $task;
      PRINT   "<a href='view_task_details.php?task_id=$task'>
          <li class='list-group-item list-group-item-success'>".$task_name."</li>
              </a>";
  //echo var_dump($check_task);
    
}
}

?>
  