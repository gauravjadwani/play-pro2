<?php 
if(!empty($_POST['date']))

            {
include '../controllers/connection.php';
include_once '../controllers/init_session.php';
    



    $name_project=$_POST['name_of_the_project'];
    $name_group=$_POST['name_of_group'];
    $date=$_POST['date'];
    $decription=$_POST['desc'];
    $form_group_id=$_POST['group_id'];
    
    //$priority=$_POST['priority'];
   
    
    $r->setnx('group_id',1);
    $r->setnx('project_id',1);
    $group_id=$r->get('group_id');
    $project_id=$r->get('project_id');
    $current_date= date("Y/m/d");
    //$time=time();
    
    
   if($form_group_id=='default') 
   {
    $r->hMset('group:'.$group_id, array('name' => $name_group,'created_on'=>$date,'status'=>'live'));
   $r->zadd("group_permissions:".$group_id,'1',$email);
   $r->sadd("projects:".$email,$project_id);
    
   
    
    $r->hMset('project:'.$project_id, array('name' => $name_project,'created_on'=>$date,'description'=>$decription,'status'=>'pending','associated_group'=>$group_id));
    echo $group_id."<br>"; 
    $r->sadd("projects_group:".$group_id,$project_id);
    
    $list_modify=$_POST['list_members_modify'];
    $list_readonly=$_POST['list_members_readonly'];

    
    
  
       
      if(!empty($list_modify))
    {
$split_email= split(",",$list_modify); 
 
for($i=0;$i<sizeof($split_email);$i++)
{
     echo 'list_modify:'.$split_email[$i].'<br>';
     $r->sadd("projects:".$split_email[$i],$project_id);
     
     
         
        
   $r->zadd("group_permissions:".$group_id,'2',$split_email[$i]);
 
     
     
     
     //$r->sadd("projects:".$split_email[$i],$project_id); 
 
   //$r->zadd("permissions:".$group_id,'2',$iparr[$i]);
    
    
}
    }
    
     
     
    if(!empty($list_readonly))
    {
    
$split_email= split(",",$list_readonly); 
    
for($i=0;$i<sizeof($split_email);$i++)
{
   
$r->zadd("group_permissions:".$group_id,'3',$split_email[$i]);
echo 'list_modify:'.$split_email[$i].'<br>';
 $r->sadd("projects:".$split_email[$i],$project_id); 
 
    
}
    }
    
    
    
    $r->incr('group_id');
    $r->incr('project_id');
//$check=$r->rpush("list_of_dates".$email,$date);    
///if($check==1)
        //echo "inserted";

    }
   
    else 
        {
     
    //$r->hMset('group:'.$group_id, array('name' => $name_group,'created_on'=>$date,'status'=>'live'));
   //$r->zadd("group_permissions:".$group_id,'1',$email);
    
   
    
    $r->hMset('project:'.$project_id, array('name' => $name_project,'created_on'=>$date,'description'=>$decription,'status'=>'pending','associated_group'=>$form_group_id));
    echo 'from_group:'.$form_group_id.'<br>'; 
    $r->sadd("projects_group:".$form_group_id,$project_id);
    
    $list_modify=$_POST['list_members_modify'];
    $list_readonly=$_POST['list_members_readonly'];

    
    
  
       
      if(!empty($list_modify))
    {
$split_email= split(",",$list_modify); 
 
for($i=0;$i<sizeof($split_email);$i++)
{
     echo 'split_email:'.$split_email[$i].'<br>';
     $r->sadd("projects:".$split_email[$i],$project_id);
     
     
         
        
   //$r->zadd("group_permissions:".$group_id,'2',$split_email[$i]);
 
     
     
     
     //$r->sadd("projects:".$split_email[$i],$project_id); 
 
   //$r->zadd("permissions:".$group_id,'2',$iparr[$i]);
    
    
}
    }
    
     
     
    if(!empty($list_readonly))
    {
    
$split_email= split(",",$list_readonly); 
    
for($i=0;$i<sizeof($split_email);$i++)
{
   echo 'list_readonly:'.$split_email[$i].'<br>';
//$r->zadd("group_permissions:".$group_id,'3',$split_email[$i]);
 $r->sadd("projects:".$split_email[$i],$project_id); 
 
    
}
    }
    
    
    
    //heck=$r->rpush("list_of_dates".$email,$date);    
///if($check==1)
        //echo "inserted";

    }
}


        
        
        
        
        
        
        ?>