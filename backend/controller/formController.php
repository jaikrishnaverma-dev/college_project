<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../Config/ConnectionObjectOriented.php";
include "../Config/DB.php";
$db=new DB($conn);
$stateid=$_REQUEST['ib_state_input'];
$query="select * from state where id='$stateid'";
$sdata=mysqli_query($conn,$query);
$sdata=$sdata->fetch_assoc();
$_SESSION['state']= $sdata['state_title'];
$ur="Location: ../../public/payment/TaxCollectionMainOnline.php?state=".$_SESSION['state'];
header($ur);
die();
?>