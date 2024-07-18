<?php 
namespace App\Core;

use PDO;
use PDOException;

class Database{
    // database required information
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $databaseName = DB_NAME;

    // database handler & statement
    private $databaseHandler;
    private $statement;

    // connect to database
    public function __construct()
    {
        // data sourcec name
        $dataSourceName = "mysql:host={$this->host};dbname={$this->databaseName}";

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        // try connection to database using PDO
        try{
            $this->databaseHandler = new PDO($dataSourceName, $this->user, $this->pass, $option);
        } catch(PDOException $e){
            die($e->getMessage());
        }        
    }

    // binding method
    public function bind($param, $value, $type = null)
    {
        if( is_null($type)){
            switch (true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->statement->bindValue($param, $value, $type);
    }

    public function query($query)
    {
        $this->statement = $this->databaseHandler->prepare($query);
    }

    public function execute()
    {
        $this->statement->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->statement->rowCount();
    }
}

?>