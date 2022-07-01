<?php

class database
{
    public static function GetConnection()
    {
        $host = "ec2-44-195-162-77.compute-1.amazonaws.com";
        $database_name = "dfiqgej60joi79";
        $username = "jpepmlakyltjkv";
        $password = "272d082bdb3000d3d4326021bc97146ab3b5e8ff4428d922f65808966d2d835d";
        $conn = null;
        try {
            $conn = new PDO("pgsql:host=" . $host . ";dbname=" . $database_name, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $conn;
    }

    public static function EXCQuery($query, $params = [])
    {
        $statement = self::GetConnection()->prepare($query);
        $check = $statement->execute($params);
        if (explode(' ', $query)[0] == "SELECT") {
            return $statement->fetchAll();
        } else {
            return $check;
        }
    }
}
