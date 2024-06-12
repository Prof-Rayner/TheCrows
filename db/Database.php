<?php

namespace db;

use PDO;
use PDOException;

class Database
{
    private $host = 'localhost';
    private $db_name = 'thecrows';
    private $username = 'root';
    private $password = '';
    private $conn;


    public function __construct($host = 'localhost', $dbname = 'thecrows', $username = 'root', $password = '')
    {
        $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function closeConnection()
    {
        $this->conn = null;
    }
}
