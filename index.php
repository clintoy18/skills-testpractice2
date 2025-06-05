<?php
require_once "classes/Task.php";

$task = new Task();
$tasks = $task->getAllTask();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Task Management</title>
</head>
<body>
<header> <h1>Task Management</h1></header>

<section id="main">
    <a href="add.php" id="add-button">Create Task</a>
    <table border="1" id="my-table">
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>DESCRIPTION</th>
            <th>DUE DATE</th>
            <th>STATUS</th> 
            <th>ACTIONS</th> 
        </tr>
        <?php while($row = $tasks->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
            <td><?= htmlspecialchars($row['due_date']) ?></td>
            <td><?= htmlspecialchars($row['is_completed']  ? 'Done' : 'Not Done') ?></td>
            <td>
                <a href="edit.php?id=<?= urlencode($row['id']) ?>" id="edit-button">Edit</a>
                <a href="delete.php?id=<?= urlencode($row['id']) ?>" id="delete-button">Delete</a>
            </td>
        </tr>

       <?php endwhile ?>
    </table>
</section>
    
</body>
</html>