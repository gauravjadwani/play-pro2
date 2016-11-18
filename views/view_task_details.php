<html>
    <body>
       <?php
include '../controllers/connection.php';
//include_once '../controllers/init_session.php';

if(isset($_REQUEST['task_id']))
{
    //echo $_REQUEST['task_id'];
$task=$_REQUEST['task_id'];
$hash=$r->hvals('tasks:'.$task);
//foreach($hash as $i)
    //echo $i;
echo "name:".$hash[0]."<br>";
echo "priority:".$hash[1]."<br>";
echo "assinged_for:".$hash[2]."<br>";
echo "introduced_on:".$hash[3]."<br>";
echo "status:".$hash[4];

//print '<form action="../controllers/complete_task.php" method="POST"><input type="hidden" value=".$task_id." name="hide"><input type="submit" value="submit"></form>';

print '<form action="" method="POST"><input type="submit"  name="submit"></form>';

//session_start();
//$_SESSION['name']='gaurav';
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





}
else if(isset($_REQUEST['project_id']))
{
    $project=$_REQUEST['project_id'];
    $hash=$r->hvals('project:'.$project);
    echo "name:".$hash[0]."<br>";
    echo "created on:".$hash[1]."<br>";
    echo "description:".$hash[2]."<br>";
    echo "deadline:".$hash[3]."<br>";
    echo "status:".$hash[4]."<br>";
    //echo $hash[4];
    $group_id=$hash[5];
    
    $list_members=$r->zrange('group_permissions:'.$group_id,0,-1);
   
    print "<h1>list of group associates</h1>";

            foreach ($list_members as $email)
            {
            
    echo $email."<br>";
            }
} 
?>
</body>
</html>