<?php

/*
 * PDO Class
 * Connect to database
 * Create prepared statements
 * Bind values
 * Return row and results
 */

class Database {

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $name = DB_NAME;

    private $dbHandler;
    private $stmt;
    private $error;

    public function __construct()
    {
        //Set dsn
        $dsn = 'mysql:host=' . $this->host . ':dbname=' . $this->name;

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //Create PDO instance
        try{
            $this->dbHandler = new PDO($dsn ,$this->user, $this->pass, $options);

        } catch (PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }

    }

    public function query($sql){
        $this->stmt = $this->dbHandler->prepare($sql);
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch (true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;

            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    //Execute prepared stmt
    public function execute(){
        return $this->stmt->execute();
    }

    //Get result set as array of objects
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Get single result
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //Get row count
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}