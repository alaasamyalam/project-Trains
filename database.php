<?php

class database {
  public $LastInsertId=0;

    function __construct() {
   	$this->pdo = new PDO("mysql:host=localhost" . ";dbname=train","root",
   	"root",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
     }
     public function Disconnect(){
            $this->pdo = null;
            $this->isConnected = false;
        }
      public function getRows($query, $params=array()){
      	        $stmt = $this->pdo->prepare($query);
                $stmt->execute($params);
                return $stmt->fetchAll();
            }
       public function myExec($query)
       	     {
             return $this->pdo->exec($query);
             }

        public function phpAlert($msg) {
                	echo '<script type="text/javascript">alert("' . $msg . '")</script>';
          	 }
}

$db = new database;
?>

