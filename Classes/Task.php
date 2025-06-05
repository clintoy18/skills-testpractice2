<?php

require_once "classes/Database.php";

class Task{

    private $connection;


    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connect();
    }

    //CRUD


    public function getAllTask(){
        return $this->connection->query("SELECT * FROM tasks");
    }

    public function getTaskById($id){
        return $this->connection->query("SELECT * FROM tasks WHERE id = $id");
    }

    public function addTask($title,$description,$due_date,$is_completed){
        $stmt = $this->connection->prepare("INSERT INTO tasks(title,description,due_date,is_completed) VALUES(?,?,?,?)");
        $stmt->bind_param("sssi",$title,$description,$due_date,$is_completed);
        return $stmt->execute();
    }
     public function update($id,$title,$description,$due_date,$is_completed){
        $stmt = $this->connection->prepare("UPDATE tasks SET title = ?, description = ?, due_date = ? , is_completed = ? WHERE id = $id");
        $stmt->bind_param("sssi",$title,$description,$due_date,$is_completed);
        return $stmt->execute();
    }

    public function delete($id){
        return $this->connection->query("DELETE FROM tasks WHERE id = $id");
    }




}


?>