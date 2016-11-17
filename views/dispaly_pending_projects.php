<?php



//include_once '../controllers/connection.php';
//include_once '../controllers/init_session.php';
 //echo $email;
$projects_list=$r->smembers("projects:".$email);
//echo var_dump($projects_list);
foreach($projects_list as $project)
{
   $check_project=$r->hget('project:'.$project,'status');
   
   if($check_project=='pending')
   {
       $project_name=$r->hget('project:'.$project,'name');
       //echo $task;
      PRINT   "<a href='view_task_details.php?project_id=$project'>
          <li class='list-group-item list-group-item-info'>".$project_name."</li>
              </a>";
  //echo var_dump($check_task);
    
}
}

?>
  