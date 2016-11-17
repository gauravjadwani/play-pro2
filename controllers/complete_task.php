<?php

include '../controllers/connection.php';
//include_once '../controllers/init_session.php';
    
$task_id=$_REQUEST['task_id'];

echo "gaur7a";
echo $task_id;
  $check_task=$r->hset('tasks:'.$task_id,'status','completed');
  echo $check_task;


?>
