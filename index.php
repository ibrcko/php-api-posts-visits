<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if (!empty($_POST)) {

    include_once 'config/database.php';

    $database = new Database();
    $db = $database->getConnection();

    if ($_POST['type'] == 'user') {
        include_once 'objects/user.php';

        $target = new User($db);

    } elseif ($_POST['type'] == 'action') {
        include_once 'objects/action.php';

        $target = new Action($db);

    } else {
        echo json_encode(
            array(['error' => 'true', 'message' => 'This type can not be altered.', 'data' => null])
        );
    }

    $target->write($_POST);


    return;
}

if ($_GET['type'] == 'visit') {

    include_once 'sources/visits.php';

    $source = new Visits();
}
elseif ($_GET['type'] == 'post') {

    include_once 'sources/posts.php';

    $source = new Posts();
} else {
    echo json_encode(
        array(['error' => 'true', 'message' => 'Type parameter is missing', 'data' => null])
    );
    return;
}

$response = $source->fetchData();

if ($response != null)
    echo json_encode(
        ['error' => 'false', 'message' => '', 'data' => $response]
    );
else
    echo json_encode(
        ['error' => 'true', "message" => "No visits found, check the parameters.", 'data' => null]
    );
return;
