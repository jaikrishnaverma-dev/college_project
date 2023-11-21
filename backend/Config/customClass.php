
<?php

interface customClassDeclare {

    function addViews($table, $col, $id, $increaseby = 1);
}

class customClass implements customClassDeclare {

    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addViews($table, $col, $id, $increseby = 1) {
        $sql = "select $col from $table where id=$id";
        $rows = $this->conn->query($sql);
        $row = $rows->fetch_assoc();
        $num = $row[$col];
        $num = $num + $increseby;
        $sql2 = "update $table set $col='$num' where id=$id";
        $this->conn->query($sql2);
        return $num;
    }

}
