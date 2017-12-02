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

    /**
     * @param $kt
     * @param $name
     * @param $track
     * @param $semester
     * @return PDOStatement
     */
    public function newStudent($kt, $name, $track, $semester){
        try
        {
            $stmt = $this->conn->prepare("CALL newStudent(:id, :name, :track, :semester);");
            $stmt->bindParam(":kt", $kt);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":track", $track);
            $stmt->bindParam(":semester", $semester);
            $stmt->execute();
            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * @param $kt
     * @return PDOStatement
     */
    public function deleteStudent($kt){
        try{
            $stmt = $this->conn->prepare("CALL deleteStudent(:kt);");
            $stmt->bindParam(":kt", $kt);
            $stmt->execute();
            return $stmt;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}