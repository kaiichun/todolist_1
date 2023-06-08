<?php

class DB
{
    // attributes (optional)
    public $host = 'devkinsta_db';
    public $dbname = 'ToDoList';
    public $dbuser = 'root';
    public $dbpassword = 'JlM9YL7mge6ghuLi';
    public $db;

    // methods (functions / actions)
    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host=$this->host;dbname=$this->dbname", 
            $this->dbuser, 
            $this->dbpassword 
        );
    }

    public function fetchAll( $sql, $data = [] )
    {
        // prepare SQL query (prepare your materials)
        $query = $this->db->prepare($sql);
        // execute SQL squery (to cook)
        $query->execute($data);
        // fetch all results (eat)
        return $query->fetchAll();
    }

    public function fetch( $sql, $data = [] )
    {
        // prepare
        $query = $this->db->prepare( $sql );
        // execute
        $query->execute($data);
        // fetch (eat)
        return $query->fetch(); // fetch() will only return one row of data
    }

    public function insert( $sql, $data = [] )
    {
        // prepare
        $query = $this->db->prepare( $sql );
        $query->execute( $data );
    }

    public function update( $sql, $data = [] )
    {
        // prepare
        $query = $this->db->prepare( $sql );
        // execute
        $query->execute( $data );
    }

    public function delete( $sql, $data = [] )
    {
        // prepare
        $query = $this->db->prepare( $sql );
        // execute
        $query->execute( $data );
    }
}