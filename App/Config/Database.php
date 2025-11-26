<?php

class Database
{

    private $conn;

    public function connect()
    {
        try
        {
            $dbconfig = require_once __DIR__ . 'Config/Database.php';
            $db = $dbconfig['db'];
            $dsn = "mysql:host={$db['hostname']};dbname={$conn['dbname']};charset=utf8";

            try
            {
                $this->conn = new PDO($dsn, $this->conn['useraname'], $this->conn['password']);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->conn; 
            }
            catch(PDOException $exception)
            {
                echo "Hubo un error en la conexión " . $exception->getMessage();
                return false;
            }

        }
        catch(PDOException $exception)
        {
            echo "Hubo un error en la conexión " . $exception->getMessage();
            return false;
        }
    }
}