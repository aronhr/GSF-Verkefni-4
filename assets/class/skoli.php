<?php
/**
 * Created by PhpStorm.
 * User: Aron
 * Date: 08-Dec-17
 * Time: 3:50 PM
 */

class skoli
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

    /**
     * @param $name
     * @return PDOStatement
     */
    public function newSchool($name){
        try
        {
            $stmt = $this->conn->prepare("CALL newSchool(:name);");
            $stmt->bindParam(":name", $name);
            $stmt->execute();
            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    public function viewSchool($name){
        try{
            $stmt = $this->conn->prepare("CALL viewSchool(:name);");
            $stmt->bindParam(":name", $name);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
            return $data;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }

}