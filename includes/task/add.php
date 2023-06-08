<?php

$database = connectToDB();

$item_name = $_POST['item_name'];

if (empty($item_name)){
    $error = "You better type something!";
} else {
    // 2. add $_POST['student_name'] to students array ( $_SESSION['students'] )
    $sql = 'INSERT INTO todos (`name`, `complete`) VALUES (:name, :complete)';
    
    $query = $database -> prepare( $sql );

    $query->execute([ 
        'name' => $item_name,
        'complete' => 0
    ]);

    // 3. redirect the user back to index.php
    header("Location: /");
    exit;
}

        // do error checking
        if ( isset( $error ) ) {
            // store the error message in session
            $_SESSION['error'] = $error;
            // redirect the user back to login.php
            header("Location: /");
            exit;
        }
