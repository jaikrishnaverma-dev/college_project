<?php

// session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
if (isset($_REQUEST["sname"])) {
    // echo $_REQUEST["sname"];
    $query = "select * from services where state_id=" . $_REQUEST['sname'] . " ";
    $result = $conn->query($query);
    $data = array();
    $i = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $core[$row["name"]] = $row["name"];
        }

        $string = json_encode($core, JSON_UNESCAPED_SLASHES);
        // var_dump($core);
    } else {
        $core["-1"] = "NO_SERVICE_FOUND";
        $string = json_encode($core, JSON_UNESCAPED_SLASHES);
    }
    echo $string;
    die;
} else {
    echo "error";
}
