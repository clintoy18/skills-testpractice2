<?php

require_once "classes/Task.php";

$task = new Task();

if($_SERVER["REQUEST_METHOD"] == "POST"){
     $task->addTask(
        $_POST['title'],  
        $_POST['description'],  
        $_POST['due_date'],  
        $_POST['is_completed']
     ); 
       header("location: index.php");
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>Document</title>
</head>
<body>
    <header><h1>Create Task</h1></header>
    <section id="form-container">
        <form method="POST">
            <label for="title">Enter Title</label>
            <input type="text" name="title"><br>

            <label for="description">Enter description</label>
            <input type="text" name="description"><br>

            <label for="due_date">Enter date</label>
            <input type="date" name="due_date"><br>

            <label for="is_completed">Enter status</label>
            <select name="is_completed" id="">
                <option value="0">Not Done</option>
                <option value="1"> Done</option>
            </select>   
             <button type="submit" id="edit-button">Add Task</button>    
             <button href="index.php" id="cancel-button">Cancel</button>          
        </form>
    </section>
</body>
</html>