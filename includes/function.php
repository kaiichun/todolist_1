<?php

    function connectToDB() {
        $database = new PDO(
            'mysql:host=devkinsta_db;dbname=Todo_List', 
            'root', 
            'JlM9YL7mge6ghuLi'
        );
        return $database;
    }