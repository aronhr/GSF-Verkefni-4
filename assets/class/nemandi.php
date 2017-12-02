<?php
/**
 * Created by PhpStorm.
 * User: Aron
 * Date: 02-Dec-17
 * Time: 9:56 PM
 */

class nemandi
{

    private $conn;
    /**
     * userClass constructor.
     */
    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }
    /**
     * @param $sql
     * @return PDOStatement
     */
    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function nyrNemandi($kt, $name, $track, $semester){
        
    }
}