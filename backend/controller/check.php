<?php

// session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
if (isset($_REQUEST["dist"])) {
    // echo $_REQUEST["vehicle_class"];
    $query = "select * from checkpost where dist='" . $_REQUEST['dist'] . "' ";

    $result = $conn->query($query);
    $data = array();
    $i = 0;
   $row = $result->fetch_assoc();
   $option['status']="success";
            $option['data']= $row['options'];
           $string = json_encode($option, JSON_UNESCAPED_SLASHES);
            echo $string;
        // var_dump($core);
    } else {
       
        $option ="Error";
        echo $option;
    }
    // echo $option;
    die;

