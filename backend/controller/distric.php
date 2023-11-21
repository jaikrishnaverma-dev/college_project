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
    $query = "select * from district where state_id=" . $_REQUEST['sname'] . " ";
    $result = $conn->query($query);
    $data = array();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        // $sql = "select * from user_profile_cover where user_id=" . $row["id"] . " and " . " status=" . "1";
        // $datacover = $conn->query($sql);
        // while ($onecover = $datacover->fetch_assoc()) {
            $core[$row["id"]]=$row["district_title"];
            // $core["name"]=;
            // $data[$i] = $core;
            // $i++;
       
    }
  
    $string = json_encode($core, JSON_UNESCAPED_SLASHES);
    // var_dump($core);
    echo $string;
    die;
}
else{
echo "error";
}