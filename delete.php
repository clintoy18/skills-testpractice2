<?php
require_once "classes/Task.php";

$task = new Task();
$task->delete($_GET['id']);
header("location: index.php");

?>