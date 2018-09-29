<?php

class User
{

    private $conn;
    private $table_name = "users";

    public $id;
    public $username;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function write($postRequest)
    {
        $id = $postRequest['user'];
        $username = $postRequest['username'];

        $query = "UPDATE $this->table_name SET username = '$username' WHERE id = $id";

        $statement = $this->conn->prepare($query);

        $statement->execute();
    }
}