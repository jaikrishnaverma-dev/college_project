<?php

include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);

// echo var_dump($_REQUEST);
$returnpath = $_SERVER["HTTP_REFERER"] . "?info=Data deleted";
if (isset($_REQUEST["id"])) {
    $info = $db->delete($_REQUEST["id"], $_REQUEST["table_name"]);
    if ($info[0] == 1) {
        $db->sendBack($_SERVER, "&delete=true");
 }
        // $db->sendBack($_SERVER);
    } else {
        echo $info[0];
        echo $info[1];
        echo $info[2];
    }

