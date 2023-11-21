<?php

session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
$location = "../../FILES";
// var_dump($_POST);die;

if (isset($_SESSION["loginid"])) {
    if (isset($_POST["api_key"]) && isset($_SESSION["loginid"])) {
        $user_api_key = $_POST["api_key"];
        $loginid = $_SESSION["loginid"];
        $users = $db->select("user", "*", array("id" => $loginid));
        $user = $users->fetch_assoc();
        $db_user_api_key = $user["api_key"];
        if ($db_user_api_key == $user_api_key) {
            
        } else {
            die("<h2>API key is invalid</h2>");
        }
    } else {
        die("<h2>Login first</h2>");
    }
    unset($_POST["api_key"]);
    $tbname = $_POST["tbname"];
    

    function get_enr(){
      global $db,$tbname;
      $enroll_num="USER".date("Ymd").rand ( 100 , 999 );
      $existed=$db->select($tbname,"userid",array("userid"=>$enroll_num));
      $count=$existed->num_rows;
      if($count>0)
      {
        get_enr();
      }else
      {
        return $enroll_num;
      }
  
    }
    
      
  $_POST['userid']=get_enr();
    if ($tbname == "user") {
        $location = "../files/";
      } else if ($tbname == "products") {
        $location = "../images/products/";
      } else if ($tbname == "images") {
        $location = "../images/images/";
      }else if ($tbname == "categories") {
        $location = "../images/categories/";
      }
      else if ($tbname == "coin_request") {
        $location = "../images/coin_request/";
      }
      else 
      {}
    unset($_POST["tbname"]);
    
    $getwallet=$db->select("wallet","*",array("user_id"=>$_REQUEST['user_id']));$getwallet=$getwallet->fetch_assoc();
    $cAmount=$getwallet['current_amount'];
    $tamount=$cAmount+$_REQUEST['amount'];
    $info = $db->update(array("current_amount"=>$tamount), "wallet",$getwallet['id']);
   
// var_dump($info);die;
// if ($db->apichecker($_POST["api_key"], $_POST["user_id"], "user")) {
    if (isset($_SESSION["recentinsertedid"])) {
        $recentinsertedid = $_SESSION["recentinsertedid"];
    }
    if ($info[0] == 1) {
        if (count($_FILES) > 0) {
            $return = $db->fileUploadWithTable($_FILES, $tbname, $recentinsertedid, $location, "50m", "JPG,PNG,JFIF,jpg,png,jfif,pdf,PDF,docx,docm,doc");
            $return = array();
            $return["status"] = "success";
            $return["message"] = "Data and image saved";
            $return["recentinsertedid"] = $_SESSION["recentinsertedid"];
           
//        var_dump($return);
            $db->sendBack($_SERVER, "&" . http_build_query($return));
            
        } else {
            $info = array();
            $info["status"] = "success";
            $info["message"] = "Data  saved";
            $info["recentinsertedid"] = $_SESSION["recentinsertedid"] or 0;
//        var_dump($info);
            $db->sendBack($_SERVER, "&" . http_build_query($info));
        }
    } else if ($info[0] == 0) {

        $info["status"] = "failed";
        $info["message"] = "Data not saved";
//    var_dump($info);
        $db->sendBack($_SERVER, "&" . http_build_query($info));
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
} else {
    echo 'Log in first';
}    