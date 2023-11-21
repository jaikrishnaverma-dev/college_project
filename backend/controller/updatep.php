<?php
session_start();
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
// echo var_dump($_REQUEST);
// die();
// echo "hello";
$id=$_SESSION['loginid'];
if(isset($_POST['change']))
{
//   $data1=$_POST;
//   var_dump($data1);
  // echo "hello";
  // die;
//   unset($_POST['email']);
  
 $updatepass = $db->update($_POST, "user", $id);
 if($updatepass)
 {
 ?><script>
       alert("Password Changed Successfully.")
        
       window.history.back();
    </script>
    <?php
 }
 else
 { echo "<h1>Some problem occured!</h1>";}

}


?>