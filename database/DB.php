<?php
class DataBase
{
    public $connect;
    function __construct($connect)
    {
        $this->connect = $connect;
    }

    function SELECT($query)
    {
        if ($this->connect && $query) {
            $stmt = $this->connect->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function INSERT($table, $rows, $values)
    {
        $connection = $this->connect;
        $query = "INSERT INTO `$table` ($rows) VALUES ($values);";
        $connection -> exec($query);
    }

    function QUERY($query)
    {
        if ($this->connect && $query) {
            $this->connect->exec($query);
        }
    }
    function UPDATE($query)
    {
        if ($this->connect && $query) {
            $this->connect->exec($query);
        }
    }

    function DELETE($query)
    {
        if ($this->connect && $query) {
            $this->connect->exec($query);
        }
    }

    function ID()
    {
        if ($this->connect) {
            return $this->connect->lastInsertId();
        }
    }

    function CLOSE()
    {
        if ($this->connect) {
            $this->connect = null;
        }
    }
}
$dsn = "mysql:host=localhost;dbname=powershoes";
$user = "root";
$password = "";

$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$connect = new PDO($dsn, $user, $password, $options);
$DATABASE = new DataBase($connect);