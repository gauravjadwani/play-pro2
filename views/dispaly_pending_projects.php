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
              </a>&nbsp";
   }
}
  //echo var_dump($check_task);
    
       /*
       print "<form action='' method='POST'><button name='submit' onclick='submit()' class='list-group-item list-group-item-info'>".$project_name."</button></form>&nbsp";
}
}
if(isset($_POST["submit"])) 
{

$ch = curl_init("http://localhost/play-pro2/controllers/complete_task.php");

curl_setopt($ch,CURLOPT_POST, true);

curl_setopt($ch,CURLOPT_POSTFIELDS,"task_id=$task");
curl_setopt($ch,CURLOPT_HEADER,0);

curl_setopt($ch, CURLOPT_RETURNTRANSFER,false );
$resp = curl_exec($ch);
curl_close($ch);
header('Location: http://localhost/play-pro2/views/dashboard.php');

}

*/
?>
  