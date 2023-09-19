<?php
class Dbconnection{

    const DSN = "mysql:host=localhost; dbname=buka";

    const DB_USERNAME = "root";

    const DB_PASSWORD = "";

    private $conn;

    public function connect(){
       
        try{
            //PDO is a class that comes with the PHP bundle
            $this->conn = new PDO(self::DSN, self::DB_USERNAME, self::DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       //echo "<br> Data successfully added";
        }catch(PDOException $ex){
      
            error_log("Connection Unsuccessful". $ex->getMessage());
        
        }
        return $this->conn;
    }

}

$myConnection = new DbConnection();
//$myConnection->connect();


?>