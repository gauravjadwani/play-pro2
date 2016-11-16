 
   

<?php


include '../controllers/connection.php';
include_once '../controllers/init_session';


$check=$r->sMembers('notifications:'.$email);
//echo $check;

foreach($check as $c)
    {

echo "<br>";

 

    $task_id=$c;
    $permission=$r->zscore('permissions:'.$task_id,$email);
    $task_name=$r->hget('tasks:'.$task_id,'name');
    $assinged_for=$r->hget('tasks:'.$task_id,'assinged_for');
    $introduced_on=$r->hget('tasks:'.$task_id,'introduced_on');
    $zrange_by_score=$r->zrangebyscore('permissions:'.$task_id,'1','4');
    $introducer_name=$zrange_by_score[0];
    
    
   
   
  
   
    
    if($permission==1)
        echo "<li class='list-group-item list-group-item-danger'>you have added the task_".$task_name."_added on date_".$introduced_on."_for the date_".$assinged_for."</li>";

    elseif($permission==2)
        echo "<li class='list-group-item list-group-item-danger'>you are added as a modifier in the task_".$task_name."_added by_".$introducer_name."_on date_".$introduced_on."_for the date_".$assinged_for."</li>";
  elseif($permission==3)
     echo "<li class='ist-group-item list-group-item-danger'>you are added as a read-only by in the task_".$task_name ."_added by_".$introducer_name."_on date_".$introduced_on."_for the date_".$assinged_for."</li>";
  
 

    }
   

   


    
?>
      