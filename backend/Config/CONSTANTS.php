<?php 
$project_name = "dbtool/";
$base_url = "";
if($_SERVER['SERVER_NAME'] == "localhost"){
    $base_url = "http://".$_SERVER['SERVER_NAME']."/".$project_name;
}else{
    $base_url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/";
}
define("BASE_URL", $base_url);

?>