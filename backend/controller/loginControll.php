<?php

session_start();

include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);

if (isset($_POST['login'])) {
    $info = $db->login($_POST["email"], $_POST["password"], "user");
    if ($info["status_number"] == 1) {
        $_SESSION["conn"] = $conn;
        if ($_SESSION["role"] == "admin") {
            $db->sendTo("../index.php");
        }
    } else {
        // echo "<script>alert('Invalid Deatils...!');</script>";
        // var_dump("Error");
        if (str_contains($_SERVER['HTTP_REFERER'], "?"))
            $db->sendBack($_SERVER, "&" . http_build_query($info));
        else
            $db->sendBack($_SERVER, "?" . http_build_query($info));
    }
}
