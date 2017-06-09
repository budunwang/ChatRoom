<?php
    class SqlHelper {
        
        public $conn;
        public $servername = "localhost";
        public $username = "root";
        public $password = "root";
        public $dbname = "chatroom";
        
        
        public function __construct() {
            $this->conn=new mysqli($this->servername,$this->username,$this->password,$this->dbname);
            if($this->conn->connect_error) {
                die("Connection fail:".$this->conn->connect_error);
            }
        }
        
        //dql,return $result
        public function execute_dql($sql) {
            $result=$this->conn->query($sql);
            if(!isset($result)) {
                  die($sql);
            }
        }
        
        //dql,return assoc array
        public function execute_dql_assoc($sql) {
            
            $arr=array();
            $result=$this->conn->query($sql);
            if(!isset($result)) {
                die($sql);
            }
            
            if ($result->num_rows>0) {
                while($row = $result->fetch_assoc()) {
                    $arr[]=$row;
                }
            } else {
                $arr=null;
            }
            return $arr;
            $result->free_result();        
        }
        
        //dml
        public function execute_dml($sql) {
            if($this->conn->query($sql)) {
                return true;
            } else {
                return false;
            }
        }
        
        //close MySQL connect
        public function close_conn() {
            if(isset($this->conn)) {
                $this->conn->close();
            }
        }
    }
?>