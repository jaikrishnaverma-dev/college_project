<?php

// session_start();
// die;
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
$location = "../../FILES";
$tbname = $_POST["tbname"];
// $tbname = "vahan_tax";
unset($_POST["tbname"]);

$_POST['created_date'] = date("Y-m-d h:i:s", time());
$info = $db->insert($_POST, $tbname);
function transactionId()
{
  global $db, $tbname;
  $date = date_default_timezone_set('Asia/Kolkata');
  $date = date('d-m-y h:i:s A');
  $enroll_num = "transaction-" . rand(10, 99) . "" . $date;
  $existed = $db->select($tbname, "registration_no", array("registration_no" => $enroll_num));

  $count = $existed->num_rows;
  if ($count > 0) {
    transactionId();
  } else {
    return $enroll_num;
  }
}


if ($info[0] == 1) {
  if (count($_FILES) > 0) {
    $return = $db->fileUploadWithTable($_FILES, $tbname, $recentinsertedid, $location, "50m", "JPG,PNG,JFIF,jpg,png,jfif,pdf,PDF,docx,docm,doc");
    $return = array();
    $return["status"] = "success";
    $return["message"] = "Data and image saved";
    $return["recentinsertedid"] = $_SESSION["recentinsertedid"];
    $db->sendBack($_SERVER, "?" . http_build_query($return));
  } else {
    $se = "recentinsertedid=" . $_SESSION['recentinsertedid'];
    if ($tbname == 'members') {
      $info["message"] = "Data  saved";
      $info["recentinsertedid"] = $_SESSION["recentinsertedid"] or 0;
      // $db->sendBack($_SERVER, "?" . http_build_query($info));
      header("location: ../../index.php?page=payment&status=success&id=$se");
    }

    var_dump("Some Error In State selection");
    // $info = array();
    // $info["status"] = "success";
    // $info["message"] = "Data  saved";
    // $info["recentinsertedid"] = $_SESSION["recentinsertedid"] or 0;
    // $db->sendBack($_SERVER, "?" . http_build_query($info));
  }
} else if ($info[0] == 0) {
  $info["status"] = "failed";
  $info["message"] = "Data not saved";
  if ($tbname == 'members') {
    header("location: ../../index.php?page=payment&status=failed");
  }
  $db->sendBack($_SERVER, "?" . http_build_query($info));
}
