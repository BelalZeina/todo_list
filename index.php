 <!DOCTYPE html>
 <html>
 <head>
    <meta charset='utf-8'>
    <title>todo list</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='bootstrap.min.css'>    
 </head>
 <body>
 <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
            <div class="card-header">

            <center><h1>Todo List</h1></center>
            <div class="form">
            <form action="" method="post">
            <input class="form-control" type="text" name="description" placeholder="Add new task...">
            <br>
            <button type="submit" class="btn btn-primary w-100">Add</button>
            </form>
            
            </div> 
            </div>
    
        <div class="card-bady">
                <table class="table table-borderd tabel-striped">
                <thead>
                <tr>
                    <th>check</th>
                    <th>description</th>
                    <th>done</th>
                    <th>delete</th>
                </tr>
                </thead>
                <tbody>
        <?php 
        $host='localhost';
        $user="root";
        $pass="";
        $db="todo_list";
        $db=mysqli_connect($host,$user,$pass,$db);
        // Retrieve tasks from the database
        $query = "SELECT * FROM tasks";
        $result = mysqli_query($db, $query);
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $description=$_POST['description'];
            if (strlen($description)>1){
                $query = "INSERT INTO tasks (description) VALUES ('$description')";
                mysqli_query($db, $query);
                header('location:todo_list.php');
                exit();
            }
            if($description==''){
                echo "<div class='alert alert-danger'>
                <strong>enter your task.</strong>
                     </div>";
                
            }
        }
      

        // Display each task as a list item
        while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $description = $row['description'];
        $done = $row['done'];
        echo "<tr>";
        echo "<td><input type='checkbox' ".($done ? 'checked' : '')."></a></td>";
        if($done){
            echo "<td><del>$description</del></td>";
        }else{
            echo "<td>$description</td>";
        }
        echo "<td><a class='btn btn-primary ' href='done_task.php?id=$id'> Done </a></td>";
        echo "<td><a class='btn btn-danger ' href='delete_task.php?id=$id'> Delete </a></td>";
        echo "</tr>";
        }

        // Close the database connection
        mysqli_close($db);
        ?>
                </tbody>
            </table>
        </div>
     </div>
    </div>
    </div>
   
<?php

?>
<script src="bootstrap.bundle.min.js"></script>
 </body>
 </html>
