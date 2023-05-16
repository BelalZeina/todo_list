<?php 
$host='localhost';
$user="root";
$pass="";
$db="todo_list";
$db=mysqli_connect($host,$user,$pass,$db);
$id=mysqli_real_escape_string($db,$_GET['id']);
$sqls= "UPDATE tasks SET done = 1 WHERE tasks.id = $id;";
mysqli_query($db,$sqls);
mysqli_close($db);
header('location:todo_list.php');
exit();
?>