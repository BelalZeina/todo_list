<?php 
$host='localhost';
$user="root";
$pass="";
$db="todo_list";
$db=mysqli_connect($host,$user,$pass,$db);
$id=mysqli_real_escape_string($db,$_GET['id']);
$sqls= "DELETE FROM tasks WHERE id= $id ";
mysqli_query($db,$sqls);
mysqli_close($db);
header('location:todo_list.php');
exit();
?>