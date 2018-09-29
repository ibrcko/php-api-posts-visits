<?php

class Visits {

    public function fetchData() {

        include_once 'config/database.php';
        include_once 'objects/visit.php';

        $database = new Database();
        $db = $database->getConnection();

        $visit = new Visit($db);

        $statement = $visit->read();
        if ($statement == null)
            return;
        $num = $statement->rowCount();

        if ($num > 0) {

            $visitsArray = array();

            while ($row = $statement->fetch(PDO::FETCH_ASSOC)){

                extract($row);

                $visit_item = array(
                    "id" => $id,
                    "user_id" => $userId,
                    "user" => $user,
                    "logged_in" => $loggedIn,
                    "logged_out" => $loggedOut,
                    "action" => $action,
                );

                array_push($visitsArray, $visit_item);
            }
             return $visitsArray;
        }

        return null;
    }
}
