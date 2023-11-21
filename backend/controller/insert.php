<?php
session_start();
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);

$_POST['created_at'] = date("Y-m-d h:i:s");
$_POST['updated_at'] = date("Y-m-d h:i:s");

$_POST['role'] = $_POST['role'] ? $_POST['role'] : "user";

$auto = array();
$name = $_POST["name"];
$key = $db->apiKey($name);
$userid = $db->userId($name);
array_push($auto, $key);
array_push($auto, $userid);
$_POST["api_key"] = $key;
$_POST["userid"] = $userid;

$tbname = "user";
$useridExist = "yes";

while ($useridExist != "no") {
    $data = $db->select($tbname, "*", array("userid" => $_POST["userid"]));
    if ($data->num_rows > 0) {
        $useridExist = "yes";
        $_POST["userid"] = $db->userId($name);
    } else {
        $useridExist = "no";
    }
}

$name = $_POST['name'];
$email = $_POST['email'];

$password = $_POST['password'];

$info = array();
if ($useridExist == "no") { 
    if ($db->exist($tbname, array("email" => $_POST["email"])) == "no" && $db->exist($tbname, array("contact" => $_POST["contact"])) == "no") {
        $info = $db->insertQuery($_POST, $tbname);
//var_dump($info);

        if (isset($_SESSION["recentinsertedid"])) {
            $recentinsertedid = $_SESSION["recentinsertedid"];
        }
        if ($info[0] == 1) { 
            if (count($_FILES) > 0) {
                $return = $db->fileUploadWithTable($_FILES, $tbname, $recentinsertedid, $location, "50m", "JPG,PNG,JFIF,jpg,png,jfif");
                $return = array();
                $return["status"] = "success";
                $return["message"] = "Data and image saved";
                $return["recentinsertedid"] = $_SESSION["recentinsertedid"];
       // var_dump($return);
              
                $db->sendBack($_SERVER, "?" . http_build_query($return));
            } else {
                $info = array();
                $info["status"] = "success";
                $info["message"] = "Data  saved";
                $info["recentinsertedid"] = $_SESSION["recentinsertedid"] or 0;
                // echo $mail->sendMail($_POST["email"], $subject, $body);
       // var_dump($info);
                $db->sendBack($_SERVER, "?" . http_build_query($info));
            }
        } else if ($info[0] == 0) {

            $info["status"] = "failed";
            $info["message"] = "Data not saved";
   // var_dump($info);
            $db->sendBack($_SERVER, "?" . http_build_query($info));
        }
    } else {
        $info["0"] = "0";
        $info["status"] = "failed";
        $info["message"] = "This userid or contact is already exist";

        $db->sendBack($_SERVER, "?" . http_build_query($info));
    }
}
