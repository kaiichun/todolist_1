<?php

    $database = connectToDB();

    $task_id = $_POST["student_id"];

    if ( empty( $task_id ) ) {
        echo "Missing student ID";
    } else {
        // recipe
        $sql = "DELETE FROM todos WHERE id = :id";

        // prepare
        $query = $database->prepare($sql);

        // execute (cook)
        $query->execute([
            'id' => $task_id
        ]);

        header("Location: /");
        exit;

    }