<?php
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);

// $location = "../mg/post";
$location = "../../FILES";
// if (isset($_POST["api_key"])) {
$tbname = $_POST["tbname"];
// if ($tbname == "user") {
//   $location = "../files/certificates/";
// } 


unset($_POST["tbname"]);
$recentinsertedid=$_POST["id"];
unset($_POST["id"]);

if (!isset($_POST["password"]) || $_POST["password"] == "" or $_POST["password"] == null || strlen($_POST["password"]) < 2) {
  unset($_POST["password"]);
}
$info = $db->update($_POST, $tbname, $recentinsertedid);
if ($info[0] == 1) {
  if (count($_FILES) > 0) {
    $return = $db->fileUploadWithTable($_FILES, $tbname, $recentinsertedid, $location, "50m", "JPG,PNG,JFIF,jpg,png,jfif,pdf,PDF,docx,docm,doc");
    $return["status"] = "success";
    $return["message"] = "Data and image saved";
    $return["recentinsertedid"] = $recentinsertedid;
    $db->sendBack($_SERVER, "&" . http_build_query($return));
  } else {
    $info = array();
    $info["status"] = "success";
    $info["message"] = "Data  saved";
    $info["recentinsertedid"] = $recentinsertedid;
    //  var_dump($info);
    $db->sendBack($_SERVER, "&" . http_build_query($info));
  }
} else if ($info[0] == 0) {

  $info["status"] = "failed";
  $info["message"] = "Data not saved";
   var_dump($info);
//   $db->sendBack($_SERVER, "?" . http_build_query($info));
}
    
    
//     }
//     else {
//         $info["status"] = "failed";
//         $info["message"] = "Not valid user (API NOT MATCHED)";
//     }
// } else {
//     $info["status"] = "failed";
//     $info["message"] = "Not valid user (API NOT MATCHED)";
// }
