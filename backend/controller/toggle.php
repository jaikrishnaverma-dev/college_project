<?php

include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
// echo var_dump($_REQUEST);
// die();

if (isset($_REQUEST["id"]) && isset($_REQUEST["tbname"])) {
    $status=$_REQUEST['status'];
    $id=$_REQUEST['id'];
    $tbname=$_REQUEST["tbname"];
    $sql="UPDATE $tbname SET status='$status' where id='$id'";
    $info=mysqli_query($conn,$sql);
        ?>
        <script>
        
            window.history.back();
        </script>
        <?php
        // $db->sendBack($_SERVER);
    
} else {
    echo "Id or table name is not set";
}
?>