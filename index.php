<?php
session_start();
        $errors = "";
        // connect to database
        $db = mysqli_connect("localhost", "root", "V@msi020705", "todo");

        // insert a quote if submit button is clicked
        if (isset($_POST['submit'])) {
                if (empty($_POST['task'])) {
                        $errors = "You must fill in the task";
                }else{
                        
                        $task = $_POST['task'];
                        $email=$_SESSION['Email_Id'];
                        $sql = "INSERT INTO tasks (task,Email_Id) VALUES ('$task','$email')";
                        mysqli_query($db, $sql);
                }
        }      
        $email=$_SESSION['Email_Id'];
        $tasks = mysqli_query($db, "SELECT * FROM tasks WHERE Email_Id = '$email'");
        if (isset($_GET['del_task'])) {
                $id = $_GET['del_task'];
                mysqli_query($db, "DELETE FROM tasks WHERE task='$id' and Email_Id='$email'");
        }
                // Update task in database upon form submission
        if (isset($_POST['update_task'])) {
                    $new_task = $_POST['new_task'];
                    $task=$_POST['task'];
                    echo "$task";
                    $result = mysqli_query($db, "SELECT * FROM tasks WHERE task='$task'");
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    mysqli_query($db, "UPDATE tasks SET task='$new_task' WHERE id=$id");
                    header('Location: index.php'); // Redirect after update
                }
            
        
        
        
?>
<!DOCTYPE html>
<html>
<head>
        <title>ToDo List Application PHP and MySQL</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
        <div class="heading">
                <h2 style="font-style: 'Hervetica';">My TODO List</h2>
        </div>
        <form method="post" action="index.php" class="input_form">
        <?php if (isset($errors)) { ?>
                <p><?php echo $errors; ?></p>
        <?php } ?>
                <input type="text" name="task" class="task_input">
                <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
        </form>
        <table>
        <thead>
                <tr>
                        <th>N</th>
                        <th>Tasks</th>
                        <th style="width: 60px;">Actions</th>
                </tr>
        </thead>

        <tbody>
                <?php 
                // select all tasks if page is visited or refreshed
              //  $tasks = mysqli_query($db, "SELECT * FROM tasks");

                $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
                        <tr>
                                <td> <?php echo $i; ?> </td>
                                <td class="task"> <?php echo $row['task']; ?> </td>
                                <td class="update"> 
                                        <a href="index.php?update=<?php echo $row['task'] ?>">update</a> 
                                </td>
                                <td class="delete"> 
                                        <a href="index.php?del_task=<?php echo $row['task'] ?>">Delete</a> 
                                </td>
                        </tr>
                <?php $i++; } ?>  
        </tbody>
</table>
<?php 
    // Display update form if update button is clicked
    if (isset($_GET['update'])) {
        $task = $_GET['update'];
        $result = mysqli_query($db, "SELECT * FROM tasks WHERE task='$task'");
        $row = mysqli_fetch_assoc($result);
    ?>
        <form method="post" action="index.php" class="update_form">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            Old Task:<br>
            <input type="text" name="task" value="<?php echo $row['task']; ?>" class="task_input"><br>
            New Task:<br>
            <input type="text" name="new_task" class="task_input">
            <button type="submit" name="update_task" class="update_btn">Update Task</button>
        </form>
    <?php } ?>

</body>
</html>