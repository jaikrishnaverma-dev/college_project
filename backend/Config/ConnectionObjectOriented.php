<?php
include_once 'CONSTANTS.php';

date_default_timezone_set('Asia/Kolkata');

interface connection_declare {

    public function create_database($dbname, $conn, $operation);

    public function connect($host, $username = "root", $pass = "");
}
 
class connection implements connection_declare {

    public function build($db, $username = "root", $pass = "", $operation = "create") {
        $conn = $this->connect("localhost", $username, $pass);
        $info = $this->create_database($db, $conn, $operation);
        if ($info == "created" || $info == "exist") {
            $this->attach_db($conn, $db);
        } else {
            return $info;
        }

        return $conn;
    }

    public function connect($host = "localhost", $username = "root", $pass = "") {
        $conn = new mysqli($host, $username, $pass);
        if ($connect_error = $conn->connect_error) {
            die("not connected. Error - . $connect_error") ;
        }
        return $conn;
    }

    public function attach_db($conn, $dbname) {
        mysqli_select_db($conn, $dbname);
    }

    public function create_database($dbname, $conn , $operation = "") {
        $all = $conn->query("SELECT SCHEMA_NAME  FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'");
        if ($all->num_rows > 0) {
            if ($operation == "drop") {
                if ($conn->query("DROP DATABASE $dbname")) {
                    return "dropped";
                } else {
                    return $conn->error;
                }
            } else if ($operation == "create") {
                return "exist";
            } else {
                $this->attach_db($conn, $dbname);
                return "database attached";
            }
        } else {
            echo $conn->error;
            if ($operation == "create") {
                if ($conn->query("CREATE SCHEMA IF NOT EXISTS $dbname DEFAULT CHARACTER SET utf8")) {
                    return "created";
                } else {
                    return $conn->error;
                }
            } else if ($operation == "drop") {
                return "no database found";
            }
        }
    }

}
// $database = file(BASE_URL.'Config/database.php');

// // Getting dbname
// $dbname = $database[1];
// $dbname = explode("=",$dbname);

// // Getting user_name
// $user_name = $database[2];
// $user_name = explode("=",$user_name);

// // Getting password
// $password = $database[3];
// $password = explode("=",$password);

// $dbname = trim($dbname[1]);
// $username = trim($user_name[1]);
// $password = trim($password[1]) ? trim($dbname[1]) : "";

// $hostname="sql101.epizy.com";
// $dbname = "epiz_32515948_Gparivahan";
// $username = "epiz_32515948";
// $password = "srCAEfNaK9";

$hostname="localhost";
$dbname = "sanstha";
$username = "root";
$password = "";

$connection = new connection();
// $conn = $connection->connect($hostname, $username, $password);
$conn = $connection->connect("localhost", "root", "");
// var_dump($conn);
$connection->attach_db($conn, $dbname);

?>