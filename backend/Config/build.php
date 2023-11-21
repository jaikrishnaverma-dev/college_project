<?php

session_start();
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
include '../Config/Configuration.php';
$db = new DB($conn);
//$connection = new connection();
//$conn = $connection->build($db->userIdWithRange($_POST["name"], 0, 10000), "root", "", "create");
$configure = new Configuration($conn);
$type = isset($_GET["type"]) ? $_GET["type"] : "creation";
$info2 = $configure->configure($type, isset($_GET["operation"]) ? $_GET["operation"] : "create");

$info = $info2[0];
for ($i = 0; $i < count($info); $i++) {
  if ($info[$i] == "0")
    echo '<div style="color:red;">';
  else if ($info[$i] == "1")
    echo '<div style="color:black;">';
  echo $i . " : " . $info[$i] . "<br>";
}
