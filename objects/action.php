<?php

class Action
{

    private $conn;
    private $table_name = "actions";

    public $id;
    public $description;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function write($postRequest)
    {
        $description = $postRequest['description'];

        $query = "INSERT INTO $this->table_name (description)
                    VALUES ('$description')";

        $statement = $this->conn->prepare($query);

        $statement->execute();

        return $statement;
    }
}