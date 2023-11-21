<!-- Dynamic table creator designed by me -->
<?php
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
$commandFirst = "CREATE TABLE " . $_POST['tbname'] . " (
    id int NOT NULL AUTO_INCREMENT,";
unset($_POST['tbname']);
unset($_POST['api_key']);
unset($_POST['login_id']);

$data = array_keys($_POST);
$commandMiddle = "";
foreach ($data as $key) {
  $commandMiddle = $commandMiddle . " '$key' varchar(225) NULL, ";
}
$commandMiddle = str_replace("'", "", $commandMiddle);
$commandLast = "  `created_date` TIMESTAMP NOT NULL DEFAULT CURRENT_DATE(), PRIMARY KEY (ID));";
$finalCommand = $commandFirst . "" . $commandMiddle . "" . $commandLast;
//   echo $finalCommand;
$status = mysqli_query($conn, $finalCommand);
if ($status) {
  echo "Table Created Successfully Mr. with the Name of '" . $tbname . "'";
} else {
  echo $status;
  echo "Something Wrong Dude";
}
?>