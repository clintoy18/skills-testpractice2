<?php

require_once "classes/Task.php";

$task = new Task();
$data = $task->getTaskById($_GET['id'])->fetch_assoc();
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
    <header><h1>Edit Task</h1></header>
    <section id="form-container">
        <form method="POST">
            <label for="title">Enter Title</label>
            <input type="text" name="title" value="<?= htmlspecialchars($data['title']) ?>"><br>

            <label for="description">Enter description</label>
            <input type="text" name="description" value="<?= htmlspecialchars($data['description']) ?>" ><br>

            <label for="due_date">Enter date</label>
            <input type="text" name="due_date" value="<?= htmlspecialchars($data['due_date']) ?>" readonly><br>
            

            <label for="due_date">Enter status</label>
            <select name="is_completed" id="">
                <option value="0" <?= $data['is_completed'] == 0 ? 'selected' : '' ?>>Not Done</option>
                <option value="1" <?= $data['is_completed'] == 1 ? 'selected' : '' ?>>Done</option>
            </select><br>
             <button type="submit" id="edit-button">Update Task</button>    
             <button href="index.php" id="cancel-button">Cancel</button>              
        </form>

       
    </section>
</body>
</html>