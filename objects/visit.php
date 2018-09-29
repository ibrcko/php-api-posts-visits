<?php

class Visit
{
    private $conn;
    private $table_name = "visits";

    public $id;
    public $user_id;
    public $logged_in;
    public $logged_out;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {

        $query = "SELECT
                a.description AS action, v.id, v.user_id AS userId, v.logged_in AS loggedIn, v.logged_out AS loggedOut, u.username AS user
            FROM
                " . $this->table_name . " v
                LEFT JOIN
                    users u
                        ON v.user_id = u.id
                LEFT JOIN
                    actions_visits_pivot pivot
                        ON v.id = pivot.visit_id
                LEFT JOIN
                    actions a
                        ON pivot.action_id = a.id
                ";

        if ($_GET['user'] != null) {
            $query .= ' WHERE v.user_id = ' . $_GET['user'];

            if ($_GET['logged-in'] != null)
                $query .= ' AND v.logged_in LIKE "%' . $_GET['logged-in'] .'%"';
            if ($_GET['logged-out'] != null)
                $query .= ' AND v.logged_out LIKE "%' . $_GET['logged-out'] .'%"';
            if ($_GET['action'] != null)
                $query .= ' AND a.description LIKE "%' . $_GET['action'] . '%"';

        } elseif ($_GET['all'] == null)
            return;

        $statement = $this->conn->prepare($query);

        $statement->execute();

        return $statement;
    }
}