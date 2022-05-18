<?php
class Database{
    // Database info
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $db_name = DB_NAME;

    private $pdo ;
    private $stmt;
    // construc function to connection with the database 
    public function __construct(){
        $dsn = 'mysql:host=' . $this->host . "; dbname=" . $this->db_name ;
        try{
            $this->pdo = new PDO($dsn , $this->user , $this->password);
            //echo "connected";

        }catch(PDOException $e){
            die("there is an issue ." . $e->getMessage());

        }
    }
   
    // Destruct function to close the connection 
    public function __destruct()
    {
        if($this->stmt !== null){
            $this->stmt = null;
        }

        if($this->pdo !== null){
            $this->pdo = null;
        }
    }
   
    // query function to prepare the query on PDO
    public function query($sql){
        $this->stmt = $this->pdo->prepare($sql);
    }
    
    // bind function to bind or join the value with the type
    public function bind($param , $value , $type = null){

        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = pdo::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = pdo::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = pdo::PARAM_NULL;
                    break;
                default:
                $type = pdo::PARAM_STR;

            }
        }

        $this->stmt->bindValue($param , $value , $type);
    }
   
    // execute function the exexute the query 
    public function execute(){
        $this->stmt->execute();
        return true;
    }

    //fetch  All row form the table
    public function fetchAll(){
        $this->stmt->execute();
        $results = $this->stmt->fetchAll();
        return $results;
    }

    //fetch one row
    public function fetch(){
        $this->stmt->execute();
        $result = $this->stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    // get the number of the rows
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}
