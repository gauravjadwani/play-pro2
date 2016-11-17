<html>
    <body>
       <?php
include '../controllers/connection.php';
include_once '../controllers/init_session.php';

$task=$_REQUEST['task_id'];
$hash=$r->hvals('tasks:'.$task);
//foreach($hash as $i)
    //echo $i;
echo "name:".$hash[0]."<br>";
echo "priority:".$hash[1]."<br>";
echo "assinged_for:".$hash[2]."<br>";
echo "introduced_on:".$hash[3]."<br>";
echo "status:".$hash[4];
?>
        
        </body>
    </html>