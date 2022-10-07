<?php
    class DB{
        public $servername = "localhost";
        protected $username = "root";
        protected $password = "";
        protected $dbname = "ourfarm";
        private $error;
        private $dbh;
        private $stmt;
        function __construct(){
            $dbh='mysql:host='.$this->servername.';dbname='.$this->dbname;
            $option = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            try{
                $this->dbh = new PDO($dbh,$this->username,$this->password,$option);
            }
            catch(PDOException $e){
                $this->error=$e->getMessage();
                echo $this->error;
            }
        }
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }
        public function bind($param,$value,$type=null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type=PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type=PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type=PDO::PARAM_NULL;
                        break;
                    default:
                        $type=PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param,$value,$type);
        }
        public function execute(){
            return $this->stmt->execute();
        }
        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }
?>