<?php
session_start();
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
// $location = "../img";
$location = "../../FILES";

// if (isset($_REQUEST["api_key"])) {

$tbname = $_REQUEST["tbname"];

if ($tbname == "user") {
    $location = "../../FILES/images/";
} else if ($tbname == "services") {
    $location = "../img/services/";
} else if ($tbname == "service_category") {
    $location = "../img/service_category/";
} else if ($tbname == "service_content") {
    $location = "../img/service_content/";
} else if ($tbname == "product") {
    $location = "../img/product/";
} else if ($tbname == "product_category") {
    $location = "../img/product_category/";
} else if ($tbname == "portfolio") {
    $location = "../img/portfolio/";
} else if ($tbname == "portfolio_category") {
    $location = "../img/portfolio_category/";
} else if ($tbname == "profile") {
    $location = "../img/profile/";
}
if ($_REQUEST["id"]) {
    $id = $_REQUEST["id"];
    unset($_REQUEST["tbname"]);
    unset($_REQUEST["api_key"]);
    $info = $db->update($_REQUEST, $tbname, $id);
//    var_dump($info);
    $recentinsertedid = $_REQUEST["id"];

    if ($info[0] == 1) {
        if (count($_FILES) > 0) {
            $return = $db->fileUploadWithTable($_FILES, $tbname, $recentinsertedid, $location, "50m", "JPG,PNG,JFIF,jpg,png,jfif");
            $return = array();
            $return["status"] = "success";
            $return["message"] = "Data and image saved";
            $return["recentinsertedid"] = $recentinsertedid;
//        var_dump($return);
            $db->sendBack($_SERVER, "&" . http_build_query($return));
        } else {
            $info = array();
            $info["status"] = "success";
            $info["message"] = "Data  saved";
            $info["recentinsertedid"] = $recentinsertedid or 0;
//        var_dump($info);
            $db->sendBack($_SERVER, "&" . http_build_query($info));
        }
    } else if ($info[0] == 0) {

        $info["status"] = "failed";
        $info["message"] = "Data not saved";
//    var_dump($info);
        $db->sendBack($_SERVER, "&" . http_build_query($info));
    }
} 