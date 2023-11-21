<?php
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
if($_POST['tbname']=="user")
{
$info = $db->login($_POST["email"], $_POST["password"], $_POST["tbname"]);
if ($info["status_number"] == 1) {
    $_SESSION["conn"] = $conn;
    if ($info["role"] == "admin") {
         $db->sendTo("../index.php?page=login");
    }
} else {
    var_dump($info);
    die;
    // $db->sendBack($_SERVER, "?" . http_build_query($info));
}
}

