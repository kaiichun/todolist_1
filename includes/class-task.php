<?php

class Task
{
    public function add()
    {
        $db = new DB();

        $add_task = $_POST['add_task'];

        if (empty($add_task)){
            // store the error message in session
            $_SESSION['error'] = "Please insert a task";
            header("Location: /");
            exit;
        }
        
        // recipe
         $sql = 'INSERT INTO todolist (`task`, `completed`) VALUES (:task,:completed)';
        // OOP method
        $db->insert( $sql, [
            'task' => $add_task,
            'completed' => 0
        ] );
        
        // 3. redirect the user back to /
        header("Location: /");
        exit;
    }

    public function update()
    {
        // init DB class
        $db = new DB();

        $update_completed = $_POST["update_complete"];
        $update_id = $_POST["update_id"];

        if($update_completed == 1){
            $update_completed = 0;
        } else if ($update_completed == 0){
            $update_completed = 1;
        }
    
        if (empty($update_id)){
            echo "error";
        } else {
            $sql = 'UPDATE todolist set completed = :completed WHERE id  = :id';
            
            $db->update(
                $sql,
                [ 
                'id' => $update_id,
                'completed' => $update_completed
            ]);
        
            // 3. redirect the user back to index.php
            header("Location: /");
            exit;
        }
    }

    public function delete()
    {
        // init DB class
        $db = new DB();

        $task_id = $_POST["delete_id"];

        if ( empty( $task_id ) ) {
            echo "Missing ID";
        } else {
            // recipe
            $sql = "DELETE FROM todolist WHERE id = :id";
            $db->delete( $sql,[
                'id' => $task_id
            ]);
    
        header("Location: /");
        exit;
    }
}
}